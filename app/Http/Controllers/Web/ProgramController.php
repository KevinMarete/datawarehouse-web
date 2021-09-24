<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProgramController extends BaseController
{
  public function displayProgramDataUploadView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [];

    $data = [
      'page_title' => 'Program Data Upload',
      'main_menu' => 'program',
      'sub_menu' => 'data-upload',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('program.upload', $view_data)
    ];

    return view('template.main', $data);
  }

  public function getUploadTemplate(Request $request)
  {
    return response()->download(public_path('/assets/csv/program-data-upload-template.csv'));
  }

  public function saveProgramData(Request $request)
  {
    $token = session()->get('token');

    $upload_file = $request->file('datafile');
    $flash_id = 'pharmacy_msg';
    $redirect_url = '/program/upload';
    $max_file_size = 2097152; #2MB
    $accepted_file_extensions = 'csv';
    $errors = 0;

    if (!$request->has('datafile')) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> No file selected for upload');
      $request->session()->flash($flash_id, $flash_msg);
      return redirect($redirect_url);
    }

    $file_details = $this->getFileDetails($upload_file);
    if (!$this->isValidExtension($file_details['extension'], explode(',', $accepted_file_extensions))) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> Invalid File Extension');
      $request->session()->flash($flash_id, $flash_msg);
      return redirect($redirect_url);
    }

    if (!$this->isAllowedSize($file_details['size'], $max_file_size)) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> File too large. File must be less than 2MB');
      $request->session()->flash($flash_id, $flash_msg);
      return redirect($redirect_url);
    }

    $import_data_arr = $this->getCsvData($file_details['path']);

    foreach ($import_data_arr as $import_data) {
      try {
        //Check if all required array values are present
        if (!isset($import_data[1]) && !isset($import_data[2]) && !isset($import_data[3])) {
          $errors++;
          continue;
        }

        $program_data = [
          'ref' => $import_data[0],
          'activity_date' => \DateTime::createFromFormat('d/m/Y', $import_data[1])->format('Y-m-d'),
          'activity' => $import_data[2],
          'sub_activity' => $import_data[3],
          'no_of_pax' => intval($import_data[4]),
          'sub_county' => $import_data[5],
          'facility' => $import_data[6],
          'received_by' => $import_data[7],
          'cost_kes' => floatval($import_data[8]),
          'cost_usd' => floatval($import_data[9]),
          'program_area' => $import_data[10],
          'funding_stream' => $import_data[11],
          'expenditure_analysis' => $import_data[12],
        ];

        $this->manageResourceData($token, "POST", "program", $program_data);
      } catch (\Exception $e) {
        $e->getMessage();
        $errors++;
        continue;
      }
    }

    if ($errors > 0) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> ' . $errors . ' program data rows(s) not uploaded successfully.');
    } else if (empty($import_data_arr)) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> No program data was uploaded successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Program data was uploaded successfully.');
    }
    $request->session()->flash($flash_id, $flash_msg);

    return redirect($redirect_url);
  }

  public function getFileDetails($file)
  {
    return [
      'name' => $file->getClientOriginalName(),
      'extension' => $file->getClientOriginalExtension(),
      'path' => $file->getRealPath(),
      'size' => $file->getSize(),
    ];
  }

  public function isValidExtension($extension, $valid_extension)
  {
    return in_array(strtolower($extension), $valid_extension);
  }

  public function isAllowedSize($fileSize, $maxFileSize)
  {
    return ($fileSize <= $maxFileSize);
  }

  public function getCsvData($filepath, $limit = 1000, $header = false)
  {
    $csv_data = [];
    $file = fopen($filepath, "r");
    $i = 0;

    while (($filedata = fgetcsv($file, $limit, ",")) !== FALSE) {
      $num = count($filedata);
      // Skip first row (header)
      if ($i == 0 && !$header) {
        $i++;
        continue;
      }
      for ($c = 0; $c < $num; $c++) {
        $csv_data[$i][] = $filedata[$c];
      }
      $i++;
    }

    fclose($file);

    return $csv_data;
  }
}
