<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends BaseController
{
  public function displayHomeView(Request $request)
  {
    $view_data = [];

    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $data = [
      'page_title' => 'Home',
      'main_menu' => 'dashboard',
      'sub_menu' => 'care-and-treatment',
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('dashboard.home', $view_data),
    ];

    return view('template.main', $data);
  }
}
