<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MenuGroupController extends BaseController
{
  public function displayMenuGroupTableView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'table_data' => $this->manageResourceData($token, 'GET', 'menugroup', [])
    ];
    $data = [
      'page_title' => 'MenuGroup',
      'main_menu' => 'settings',
      'sub_menu' => 'menugroup',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('menugroup.listing', $view_data),
    ];

    return view('template.main', $data);
  }

  public function displayNewMenuGroupView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [];

    $data = [
      'page_title' => 'Add MenuGroup',
      'main_menu' => 'settings',
      'sub_menu' => 'menugroup',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('menugroup.new', $view_data)
    ];

    return view('template.main', $data);
  }

  public function saveMenuGroup(Request $request)
  {
    $token = session()->get('token');

    $menugroup_data = [
      'name' => $request->name,
      'icon' => $request->icon
    ];
    $menugroup_response = $this->manageResourceData($token, "POST", "menugroup", $menugroup_data);

    if (isset($menugroup_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> MenuGroup was not added successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> MenuGroup was created successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/menugroup');
  }

  public function displayMenuGroupView(Request $request)
  {
    $menugroup_id = $request->id;

    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'edit' => $this->manageResourceData($token, 'GET', 'menugroup/' . $menugroup_id, [])
    ];

    $data = [
      'page_title' => 'View MenuGroup',
      'main_menu' => 'settings',
      'sub_menu' => 'menugroup',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('menugroup.view', $view_data)
    ];

    return view('template.main', $data);
  }

  public function updateMenuGroup(Request $request)
  {
    $menugroup_id = $request->id;

    $token = session()->get('token');

    $menugroup_data = [
      'name' => $request->name,
      'icon' => $request->icon
    ];
    $menugroup_response = $this->manageResourceData($token, "PUT", "menugroup/" . $menugroup_id, $menugroup_data);

    if (isset($menugroup_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> MenuGroup was not updated successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> MenuGroup have been updated successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/menugroup/view/' . $menugroup_id);
  }

  public function deleteMenuGroup(Request $request)
  {
    $menugroup_id = $request->id;

    $token = session()->get('token');

    $menugroup_response = $this->manageResourceData($token, "DELETE", "menugroup/" . $menugroup_id, []);

    if (isset($menugroup_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> MenuGroup was not deleted successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> MenuGroup was deleted successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/menugroup');
  }
}
