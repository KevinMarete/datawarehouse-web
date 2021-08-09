<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SubCountyController extends BaseController
{
  public function displaySubCountyTableView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'table_data' => $this->manageResourceData($token, 'GET', 'subcounty', [])
    ];
    $data = [
      'page_title' => 'SubCounty',
      'main_menu' => 'settings',
      'sub_menu' => 'subcounty',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('subcounty.listing', $view_data),
    ];

    return view('template.main', $data);
  }

  public function displayNewSubCountyView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'counties' => $this->manageResourceData($token, 'GET', 'county')
    ];

    $data = [
      'page_title' => 'Add SubCounty',
      'main_menu' => 'settings',
      'sub_menu' => 'subcounty',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('subcounty.new', $view_data)
    ];

    return view('template.main', $data);
  }

  public function saveSubCounty(Request $request)
  {
    $token = session()->get('token');

    $subcounty_data = [
      'name' => $request->name,
      'county_id' => $request->county_id
    ];
    $subcounty_response = $this->manageResourceData($token, "POST", "subcounty", $subcounty_data);

    if (isset($subcounty_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> SubCounty was not added successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> SubCounty was created successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/subcounty');
  }

  public function displaySubCountyView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'edit' => $this->manageResourceData($token, 'GET', 'subcounty/' . $request->id, []),
      'counties' => $this->manageResourceData($token, 'GET', 'county')
    ];

    $data = [
      'page_title' => 'View SubCounty',
      'main_menu' => 'settings',
      'sub_menu' => 'subcounty',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('subcounty.view', $view_data)
    ];

    return view('template.main', $data);
  }

  public function updateSubCounty(Request $request)
  {
    $subcounty_id = $request->id;

    $token = session()->get('token');

    $subcounty_data = [
      'name' => $request->name,
      'county_id' => $request->county_id
    ];
    $subcounty_response = $this->manageResourceData($token, "PUT", "subcounty/" . $subcounty_id, $subcounty_data);

    if (isset($subcounty_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> SubCounty was not updated successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> SubCounty have been updated successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/subcounty/view/' . $subcounty_id);
  }

  public function deleteSubCounty(Request $request)
  {
    $subcounty_id = $request->id;

    $token = session()->get('token');

    $subcounty_response = $this->manageResourceData($token, "DELETE", "subcounty/" . $subcounty_id, []);

    if (isset($subcounty_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> SubCounty was not deleted successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> SubCounty was deleted successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/subcounty');
  }
}
