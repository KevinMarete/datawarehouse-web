<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends BaseController
{
  public function displayHomeView(Request $request)
  {
    $token = session()->get('token');

    $view_data = [];

    $data = [
      'page_title' => 'Home',
      'main_menu' => 'dashboard',
      'sub_menu' => 'care-and-treatment',
      'content_view' => View::make('dashboard.home', $view_data),
    ];

    return view('template.main', $data);
  }
}
