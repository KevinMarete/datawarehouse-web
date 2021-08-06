<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use function GuzzleHttp\json_decode;

class DashboardController extends BaseController
{
  public function displayDashboardView(Request $request)
  {
    $from = '2020-02-01';
    $to = '2020-03-01';
    $category = $request->category;

    $token = session()->get('token');
    $role_id = session()->get('role_id');

    $config = config('dashboard');
    $chart_config = $config[$request->category]['charts'];

    foreach ($chart_config as $chart_name => $chart) {
      $datasets = $chart['datasets'];

      foreach ($datasets as $index => $dataset) {
        $data_url = sprintf($dataset['dataUrl'], $from, $to);
        $chart_data = $this->getChartData($token, $data_url);

        $chart['labels'] = $chart_data['labels'];
        $chart['datasets'][$index]['data'] = $chart_data['data'];
      }
      $chart_config[$chart_name] = json_encode($chart);
    }

    $view_data = [
      'chart_config' => $chart_config,
      'counties' => [],
      'facilities' => [],
      'from' => $from,
      'to' => $to
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

  public function getChartData($token = null, $data_url = null)
  {
    $response = ['labels' => [], 'data' => []];
    if ($token !== null && $data_url !== null) {
      $results = $this->manageResourceData($token, 'GET', $data_url);
      $response['labels'] = array_keys($results);
      $response['data'] = array_values($results);
    }
    return $response;
  }
}
