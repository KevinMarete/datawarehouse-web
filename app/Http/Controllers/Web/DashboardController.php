<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends BaseController
{
  public function displayDashboardView(Request $request)
  {
    $view_data = [
      'chart_data' => json_encode([
        'title' => 'Current on ART vs Current on Care',
        'type' => 'horizontalBar',
        'labels' => [
          "20+ yrs (Adults)",
          "10-19 yrs (Teens)",
          "0-9 yrs (Children)",
          "Total",
        ],
        'datasets' => [
          [
            "label" => "Current On ART",
            "data" => [200, 40, 6, 246],
            "borderColor" => "transparent",
            "backgroundColor" => "#FFFF00",
          ],
          [
            "label" => "Current On Care",
            "data" => [-300, -55, -15, -370],
            "borderColor" => "transparent",
            "backgroundColor" => "#0000FF",
          ],
        ]
      ])
    ];

    $category = $request->category;

    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $data = [
      'page_title' => 'Home',
      'main_menu' => 'dashboard',
      'sub_menu' => $category,
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('dashboard.' . $category, $view_data),
    ];

    return view('template.main', $data);
  }
}
