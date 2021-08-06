<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends BaseController
{
  public function displayDashboardView(Request $request)
  {
    $category = $request->category;
    $filters = [
      'from' => '2020-02-01',
      'to' => '2020-03-01'
    ];

    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $view_data = [
      'chart_config' => $this->getChartConfig($token, $category, $filters),
      'counties' => [],
      'facilities' => [],
      'from' => $filters['from'],
      'to' => $filters['to']
    ];

    $data = [
      'page_title' => 'Home',
      'main_menu' => 'dashboard',
      'sub_menu' => $category,
      'menugroups' => $this->getRoleMenus($token, $role_id),
      'content_view' => View::make('dashboard.' . $category, $view_data),
    ];

    return view('template.main', $data);
  }

  public function displayDashboardFilterView(Request $request)
  {
    return redirect('/dashboard/care-and-treatment');
  }

  public function getChartConfig($token = null, $category = null, $filters = [])
  {
    $config = config('dashboard');
    $chart_config = $config[$category]['charts'];

    if ($token !== null && $chart_config !== null && sizeof($filters) > 0) {
      foreach ($chart_config as $chart_name => $chart) {
        $datasets = $chart['datasets'];

        foreach ($datasets as $index => $dataset) {
          $chart_data = $this->getChartData($token, $dataset['dataUrl'], $filters);

          $chart['labels'] = $chart_data['labels'];
          $chart['datasets'][$index]['data'] = $chart_data['data'];
        }
        $chart_config[$chart_name] = json_encode($chart);
      }
    }
    return $chart_config;
  }

  public function getChartData($token = null, $data_url = null, $filters = [])
  {
    $response = ['labels' => [], 'data' => []];
    if ($token !== null && $data_url !== null && sizeof($filters) > 0) {
      $results = $this->manageResourceData($token, 'POST', $data_url, $filters);
      $response['labels'] = array_keys($results);
      $response['data'] = array_values($results);
    }
    return $response;
  }
}
