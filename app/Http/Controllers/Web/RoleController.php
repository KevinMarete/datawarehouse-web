<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RoleController extends BaseController
{
  public function displayRoleTableView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'table_data' => $this->manageResourceData($token, 'GET', 'role', [])
    ];
    $data = [
      'page_title' => 'Role',
      'main_menu' => 'settings',
      'sub_menu' => 'role',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('role.listing', $view_data),
    ];

    return view('template.main', $data);
  }

  public function displayNewRoleView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [];

    $data = [
      'page_title' => 'Add Role',
      'main_menu' => 'settings',
      'sub_menu' => 'role',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('role.new', $view_data)
    ];

    return view('template.main', $data);
  }

  public function saveRole(Request $request)
  {
    $token = session()->get('token');

    $role_data = [
      'name' => $request->name
    ];
    $role_response = $this->manageResourceData($token, "POST", "role", $role_data);

    if (isset($role_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> Role was not added successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Role was created successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/role');
  }

  public function displayRoleView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'edit' => $this->manageResourceData($token, 'GET', 'role/' . $request->id, [])
    ];

    $data = [
      'page_title' => 'View Role',
      'main_menu' => 'settings',
      'sub_menu' => 'role',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('role.view', $view_data)
    ];

    return view('template.main', $data);
  }

  public function updateRole(Request $request)
  {
    $role_id = $request->id;

    $token = session()->get('token');

    $role_data = [
      'name' => $request->name
    ];
    $role_response = $this->manageResourceData($token, "PUT", "role/" . $role_id, $role_data);

    if (isset($role_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> Role was not updated successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Rol have been updated successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/role/view/' . $role_id);
  }

  public function deleteRole(Request $request)
  {
    $role_id = $request->id;

    $token = session()->get('token');

    $role_response = $this->manageResourceData($token, "DELETE", "role/" . $role_id, []);

    if (isset($role_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> Role was not deleted successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Role was deleted successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/role');
  }
}
