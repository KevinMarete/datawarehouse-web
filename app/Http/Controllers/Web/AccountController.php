<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AccountController extends BaseController
{

  public function displayProfileView()
  {
    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'profile' => $this->manageResourceData($token, 'GET', 'me'),
      'roles' => $this->manageResourceData($token, 'GET', 'role')
    ];
    $data = [
      'page_title' => 'Profile',
      'main_menu' => 'settings',
      'sub_menu' => 'user',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('auth.profile', $view_data),
    ];

    return view('template.main', $data);
  }

  public function updateProfile(Request $request)
  {
    $token = session()->get('token');

    //Send request data to Api
    $response = $this->manageResourceData($token, 'PUT', 'profile', $request->all());

    if (isset($response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> ' . $response["error"]);
    } else {
      //Update current session data
      $profile = $this->manageResourceData($token, 'GET', 'me', []);
      session($profile);

      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> ' . $response["msg"]);
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/profile');
  }

  public function changePassword(Request $request)
  {
    //Send request data to Api
    $response = $this->manageResourceData(session()->get('token'), 'POST', 'changepassword', $request->all());

    if (isset($response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> ' . $response["error"]);
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> ' . $response["msg"]);
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/profile');
  }

  public function logout(Request $request)
  {
    //Send request data to Api
    $response = $this->manageResourceData(session()->get('token'), 'POST', 'logout', []);

    //Clear sessions
    $request->session()->flush();

    if (isset($response['msg'])) {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> ' . $response["msg"]);
      $request->session()->flash('pharmacy_msg', $flash_msg);
    }

    return redirect('/login');
  }
}
