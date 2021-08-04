<?php

namespace App\Http\Controllers\Api;

use App\Models\Patient;
use App\Http\Controllers\Controller;

class DataController extends Controller
{

  protected $default_results;

  public function __construct()
  {
    $this->default_results = [
      '20+ yrs (Adults)' => 0,
      '10 - 19 yrs (Adolescents)' => 0,
      '0 - 9 yrs (Children)' => 0,
      'Total' => 0
    ];
  }

  /**
   * Display all patients on care in specified period
   *
   * @param  string  $category
   * @param  date  $from
   * @param  date  $to
   * @return \Illuminate\Http\Response
   */
  public function getOnART($category, $from, $to)
  {
    if ($category == 'new') {
      $results = Patient::whereDate('start_regimen_date', '>=', $from)
        ->whereDate('start_regimen_date', '<', $to)
        ->get();
    } else {
      $results = Patient::whereDate('start_regimen_date', '<', $to)->get();
    }

    $results = $this->arrayGroupBy($results, 'age_group');
    $results = $this->arrayCount($results);

    $results['Total'] = array_sum(array_values($results));

    $results = array_merge($this->default_results, $results);

    return response()->json($results);
  }

  /**
   * Display all patients on care in specified period
   *
   * @param  string  $category
   * @param  date  $from
   * @param  date  $to
   * @return \Illuminate\Http\Response
   */
  public function getOnCare($category, $from, $to)
  {
    if ($category == 'new') {
      $results = Patient::whereDate('enrollment_date', '>=', $from)
        ->whereDate('enrollment_date', '<', $to)
        ->get();
    } else {
      $results = Patient::whereDate('enrollment_date', '<', $to)->get();
    }

    $results = $this->arrayGroupBy($results, 'age_group');
    $results = $this->arrayCount($results);

    $results['Total'] = array_sum(array_values($results));

    $results = array_merge($this->default_results, $results);

    return response()->json($results);
  }

  /**
   * Group Array Elements based on key
   *
   * @param  Array  $array
   * @param  string  $key
   * @return Array
   */
  private function arrayGroupBy($array, $key)
  {
    $results = [];
    foreach ($array as $val) {
      $results[$val->$key][] = $val;
    }
    return $results;
  }

  /**
   * Count Array Elements
   *
   * @param  Array  $array
   * @return Array
   */
  private function arrayCount($array)
  {
    $response = [];
    foreach ($array as $index => $val) {
      $response[$index] = count($val);
    }
    return $response;
  }
}
