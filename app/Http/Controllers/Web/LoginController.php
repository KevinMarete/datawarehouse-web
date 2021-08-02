<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;

class LoginController extends BaseController
{
  protected $client;

  public function displayLoginView()
  {
    $data = [
      'page_title' => 'Login'
    ];
    return view('auth.login', $data);
  }

  public function displayForgotPasswordView()
  {
    $data = [
      'page_title' => 'Forgot Password'
    ];
    return view('auth.forgot-password', $data);
  }

  public function authenticateAccount(Request $request)
  {
    $response = $this->client->post("login", ['json' => $request->all()]);
    $response = json_decode($response->getBody(), true);

    if (isset($response['error'])) {
      if (isset($response['user_id'])) {
        $flash_msg = $this->getAlertMessage('warning', '<strong>Issue!</strong> ' . $response["error"]);
      }
      $flash_msg = $this->getAlertMessage('danger', '<strong>Issue!</strong> ' . $response["error"]);
      $request->session()->flash('pharmacy_msg', $flash_msg);
      return redirect('/login');
    } else {
      //Store session variables
      session()->put('token', $response['token']);
      session($this->manageResourceData(session()->get('token'), 'GET', 'me'));
      $fullname = session()->get('firstname') . ' ' . session()->get('lastname');

      //Set flash message to View
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Welcome ' . $fullname . ' to DataWarehouse');
      $request->session()->flash('pharmacy_msg', $flash_msg);

      return redirect('dashboard');
    }
  }

  public function resetAccount(Request $request)
  {
    $response = $this->client->post("forgotpasswordemail", ['json' => $request->all()]);
    $response = json_decode($response->getBody(), true);

    if (isset($response['error'])) {
      $flash_msg = $this->getAlertMessage('danger', '<strong>Error!</strong> ' . $response["error"]);
    } else {
      $flash_msg = $this->getAlertMessage('success', '<strong>Success!</strong> Your account has been reset. Check your email for your new password.');
    }
    $request->session()->flash('pharmacy_msg', $flash_msg);

    return redirect('/forgot-password');
  }
}
