<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CountyController extends BaseController
{
  public function displayCountyTableView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'table_data' => $this->manageResourceData($token, 'GET', 'county', [])
    ];
    $data = [
      'page_title' => 'County',
      'main_menu' => 'settings',
      'sub_menu' => 'county',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('county.listing', $view_data),
    ];

    return view('template.main', $data);
  }

  public function displayNewCountyView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [];

    $data = [
      'page_title' => 'Add County',
      'main_menu' => 'settings',
      'sub_menu' => 'county',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('county.new', $view_data)
    ];

    return view('template.main', $data);
  }

  public function saveCounty(Request $request)
  {
    $token = session()->get('token');

    $county_data = [
      'name' => $request->name
    ];
    $county_response = $this->manageResourceData($token, "POST", "county", $county_data);

    if (isset($county_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> County was not added successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> County was created successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/county');
  }

  public function displayCountyView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'edit' => $this->manageResourceData($token, 'GET', 'county/' . $request->id, [])
    ];

    $data = [
      'page_title' => 'View County',
      'main_menu' => 'settings',
      'sub_menu' => 'county',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('county.view', $view_data)
    ];

    return view('template.main', $data);
  }

  public function updateCounty(Request $request)
  {
    $county_id = $request->id;

    $token = session()->get('token');

    $county_data = [
      'name' => $request->name
    ];
    $county_response = $this->manageResourceData($token, "PUT", "county/" . $county_id, $county_data);

    if (isset($county_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> County was not updated successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> County have been updated successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/county/view/' . $county_id);
  }

  public function deleteCounty(Request $request)
  {
    $county_id = $request->id;

    $token = session()->get('token');

    $county_response = $this->manageResourceData($token, "DELETE", "county/" . $county_id, []);

    if (isset($county_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> County was not deleted successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> County was deleted successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/county');
  }
}
