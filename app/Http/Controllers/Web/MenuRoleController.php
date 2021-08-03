<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MenuRoleController extends BaseController
{
  public function displayMenuRoleTableView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'table_data' => $this->manageResourceData($token, 'GET', 'menurole', [])
    ];
    $data = [
      'page_title' => 'MenuRole',
      'main_menu' => 'settings',
      'sub_menu' => 'menurole',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('menurole.listing', $view_data),
    ];

    return view('template.main', $data);
  }

  public function displayNewMenuRoleView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'menus' => $this->manageResourceData($token, 'GET', 'menu', []),
      'roles' => $this->manageResourceData($token, 'GET', 'role', [])
    ];

    $data = [
      'page_title' => 'Add MenuRole',
      'main_menu' => 'settings',
      'sub_menu' => 'menurole',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('menurole.new', $view_data)
    ];

    return view('template.main', $data);
  }

  public function saveMenuRole(Request $request)
  {
    $token = session()->get('token');

    $menurole_data = [
      'menu_id' => $request->menu_id,
      'role_id' => $request->role_id
    ];
    $menurole_response = $this->manageResourceData($token, "POST", "menurole", $menurole_data);

    if (isset($menurole_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> MenuRole was not added successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> MenuRole was created successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/menurole');
  }

  public function displayMenuRoleView(Request $request)
  {
    $menurole_id = $request->id;

    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'edit' => $this->manageResourceData($token, 'GET', 'menurole/' . $menurole_id, []),
      'menus' => $this->manageResourceData($token, 'GET', 'menu', []),
      'roles' => $this->manageResourceData($token, 'GET', 'role', [])
    ];

    $data = [
      'page_title' => 'View MenuRole',
      'main_menu' => 'settings',
      'sub_menu' => 'menurole',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('menurole.view', $view_data)
    ];

    return view('template.main', $data);
  }

  public function updateMenuRole(Request $request)
  {
    $menurole_id = $request->id;

    $token = session()->get('token');

    $menurole_data = [
      'menu_id' => $request->menu_id,
      'role_id' => $request->role_id
    ];
    $menurole_response = $this->manageResourceData($token, "PUT", "menurole/" . $menurole_id, $menurole_data);

    if (isset($menurole_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> MenuRole was not updated successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> MenuRole have been updated successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/menurole/view/' . $menurole_id);
  }

  public function deleteMenuRole(Request $request)
  {
    $menurole_id = $request->id;

    $token = session()->get('token');

    $menurole_response = $this->manageResourceData($token, "DELETE", "menurole/" . $menurole_id, []);

    if (isset($menurole_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> MenuRole was not deleted successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> MenuRole was deleted successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/menurole');
  }
}
