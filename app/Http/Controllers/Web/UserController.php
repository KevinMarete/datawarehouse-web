<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends BaseController
{
  public function displayUserTableView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'table_data' => $this->manageResourceData($token, 'GET', 'user', [])
    ];
    $data = [
      'page_title' => 'User',
      'main_menu' => 'settings',
      'sub_menu' => 'user',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('user.listing', $view_data),
    ];

    return view('template.main', $data);
  }

  public function displayNewUserView(Request $request)
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'roles' => $this->manageResourceData($token, 'GET', 'role', [])
    ];

    $data = [
      'page_title' => 'Add User',
      'main_menu' => 'settings',
      'sub_menu' => 'user',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('user.new', $view_data)
    ];

    return view('template.main', $data);
  }

  public function saveUser(Request $request)
  {
    $token = session()->get('token');

    $user_data = [
      'firstname' => $request->firstname,
      'lastname' => $request->lastname,
      'email' => $request->email,
      'phone' => $request->phone,
      'role_id' => $request->role_id,
      'is_active' => $request->is_active
    ];
    $user_response = $this->manageResourceData($token, "POST", "add-user", $user_data);

    if (isset($user_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> User was not added successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> User was created successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/user');
  }

  public function displayUserView(Request $request)
  {
    $user_id = $request->id;

    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'edit' => $this->manageResourceData($token, 'GET', 'user/' . $user_id, []),
      'roles' => $this->manageResourceData($token, 'GET', 'role', [])
    ];

    $data = [
      'page_title' => 'View User',
      'main_menu' => 'settings',
      'sub_menu' => 'user',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('user.view', $view_data)
    ];

    return view('template.main', $data);
  }

  public function updateUser(Request $request)
  {
    $user_id = $request->id;

    $token = session()->get('token');

    $user_data = [
      'firstname' => $request->firstname,
      'lastname' => $request->lastname,
      'email' => $request->email,
      'phone' => $request->phone,
      'role_id' => $request->role_id,
      'is_active' => $request->is_active
    ];
    $user_response = $this->manageResourceData($token, "PUT", "user/" . $user_id, $user_data);

    if (isset($user_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> User was not updated successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> User have been updated successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/user/view/' . $user_id);
  }

  public function deleteUser(Request $request)
  {
    $user_id = $request->id;

    $token = session()->get('token');

    $user_response = $this->manageResourceData($token, "DELETE", "user/" . $user_id, []);

    if (isset($user_response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> User was not deleted successfully.');
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> User was deleted successfully.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/user');
  }
}
