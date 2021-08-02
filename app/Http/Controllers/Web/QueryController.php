<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class QueryController extends BaseController
{

  public function displayQueryTableView(Request $request)
  {
    $token = session()->get('token');

    $view_data = [
      'table_data' => $this->manageResourceData($token, 'GET', 'query', [])
    ];

    $data = [
      'page_title' => 'Query',
      'main_menu' => 'data',
      'sub_menu' => 'query',
      'content_view' => View::make('query.listing', $view_data),
    ];

    return view('template.main', $data);
  }

  public function displayNewQueryView(Request $request)
  {
    $token = session()->get('token');

    $view_data = [
      'querycategories' => $this->manageResourceData($token, 'GET', 'querycategory', [])
    ];

    $data = [
      'page_title' => 'Add Query',
      'main_menu' => 'data',
      'sub_menu' => 'query',
      'content_view' => View::make('query.new', $view_data)
    ];

    return view('template.main', $data);
  }

  public function saveQuery(Request $request)
  {
    $token = session()->get('token');

    $query_data = [
      'name' => $request->name,
      'description' => $request->description,
      'query_category_id' => $request->query_category_id,
    ];
    $query_response = $this->manageResourceData($token, "POST", "query", $query_data);

    if (isset($query_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> Query was not added successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Query was created successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/query');
  }

  public function displayQueryView(Request $request)
  {
    $query_id = $request->id;
    $token = session()->get('token');

    $view_data = [
      'edit' => $this->manageResourceData($token, 'GET', 'query/' . $query_id, []),
      'querycategories' => $this->manageResourceData($token, 'GET', 'querycategory', [])
    ];

    $data = [
      'page_title' => 'View Query',
      'main_menu' => 'data',
      'sub_menu' => 'query',
      'content_view' => View::make('query.view', $view_data)
    ];

    return view('template.main', $data);
  }

  public function updateQuery(Request $request)
  {
    $query_id = $request->id;

    $token = session()->get('token');

    $query_data = [
      'name' => $request->name,
      'description' => $request->description,
      'query_category_id' => $request->query_category_id,
    ];
    $query_response = $this->manageResourceData($token, "PUT", "query/" . $query_id, $query_data);

    if (isset($query_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> Query was not updated successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Query have been updated successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/query/view/' . $query_id);
  }

  public function deleteQuery(Request $request)
  {
    $query_id = $request->id;

    $token = session()->get('token');

    $query_response = $this->manageResourceData($token, "DELETE", "query/" . $query_id, []);

    if (isset($query_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> Query was not deleted successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Query was deleted successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/query');
  }

  public function displayQueryExecutorView(Request $request)
  {
    $token = session()->get('token');

    $view_data = [
      'querycategories' => $this->manageResourceData($token, 'GET', 'querycategory', [])
    ];

    $data = [
      'page_title' => 'Query Executor',
      'main_menu' => 'data',
      'sub_menu' => 'queryexecutor',
      'content_view' => View::make('query.executor', $view_data),
    ];

    return view('template.main', $data);
  }

  public function runQuery(Request $request)
  {
    $response = [];
    try {
      $query = $request->query_description;
      $results = DB::connection('mysql_read')->select($query);

      // Get columns
      $keys = $this->getKeysFromObjectArray($results);
      $response['columns'] =  array_map(function ($a) {
        return ['title' => $a];
      }, $keys);

      // Get data values
      $response['data'] = $this->getValuesFromObjectArray($results);

      // Additional options
      $response['destroy'] = true;
      $response['dom'] = "Bfrtip";
      $response['buttons'] = ["copy", "csv", "excel", "pdf", "print"];
      $response['lengthMenu'] = [
        [10, 25, 50, -1],
        [10, 25, 50, "All"],
      ];
      $response["pagingType"] = "full_numbers";
      $response["scrollX"] = true;
    } catch (\Illuminate\Database\QueryException $ex) {
      dd($ex->getMessage());
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
  }

  private function getKeysFromObjectArray($obj)
  {
    $keys = [];
    $arr = (array) $obj;
    $arr_size = sizeof($arr);
    if ($arr_size > 0) {
      $keys = array_keys((array) $arr[0]);
    }
    return $keys;
  }

  private function getValuesFromObjectArray($obj)
  {
    $values = [];
    $arr = (array) $obj;
    $arr_size = sizeof($arr);
    if ($arr_size > 0) {
      foreach ($arr as $row_arr) {
        $values[] = array_values((array) $row_arr);
      }
    }
    return $values;
  }
}
