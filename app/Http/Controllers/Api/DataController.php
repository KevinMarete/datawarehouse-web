<?php

namespace App\Http\Controllers\Api;

use App\Models\Patient;
use App\Http\Controllers\Controller;

class DataController extends Controller
{

  protected $default_results, $default_age_gender;

  public function __construct()
  {
    $this->default_results = [
      '20+ yrs (Adults)' => 0,
      '10 - 19 yrs (Adolescents)' => 0,
      '0 - 9 yrs (Children)' => 0,
      'Total' => 0
    ];

    $this->default_age_gender_results = [
      '<1 F' => 0,
      '<1 M' => 0,
      '1-4 F' => 0,
      '1-4 M' => 0,
      '5-9 F' => 0,
      '5-9 M' => 0,
      '10-14 F' => 0,
      '10-14 M' => 0,
      '15-19 F' => 0,
      '15-19 M' => 0,
      '20-24 F' => 0,
      '20-24 M' => 0,
      '25-29 F' => 0,
      '25-29 M' => 0,
      '30-34 F' => 0,
      '30-34 M' => 0,
      '35-39 F' => 0,
      '35-39 M' => 0,
      '40-44 F' => 0,
      '40-44 M' => 0,
      '45-49 F' => 0,
      '45-49 M' => 0,
      '50+ F' => 0,
      '50+ M' => 0,
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
    if ($category == 'new' || $category == 'new-age-gender') {
      $results = Patient::whereDate('start_regimen_date', '>=', $from)
        ->whereDate('start_regimen_date', '<', $to)
        ->get();
    } else {
      $results = Patient::whereDate('start_regimen_date', '<', $to)->get();
    }

    if ($category == 'new-age-gender' || $category == 'current-age-gender') {
      $results = $this->arrayGroupBy($results, 'age_group_gender');
      $results = $this->arrayCount($results);

      $results = array_merge($this->default_age_gender_results, $results);
    } else if ($category == 'current-prop') {
      $enrollment_results = Patient::whereDate('enrollment_date', '<', $to)->get();

      $art_results = $this->arrayGroupBy($results, 'age_group_gender');
      $art_results = $this->arrayCount($art_results);
      $art_results = array_merge($this->default_age_gender_results, $art_results);

      $enrollment_results = $this->arrayGroupBy($enrollment_results, 'age_group_gender');
      $enrollment_results = $this->arrayCount($enrollment_results);
      $enrollment_results = array_merge($this->default_age_gender_results, $enrollment_results);

      $results = [];
      foreach ($enrollment_results as $key => $result) {
        $results[$key] = 0;
        if ($result > 0) {
          $results[$key] = round(($art_results[$key] / $result) * 100);
        }
      }
    } else {
      $results = $this->arrayGroupBy($results, 'age_group');
      $results = $this->arrayCount($results);

      $results['Total'] = array_sum(array_values($results));
      $results = array_merge($this->default_results, $results);
    }
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
    if ($category == 'new' || $category == 'new-age-gender') {
      $results = Patient::whereDate('enrollment_date', '>=', $from)
        ->whereDate('enrollment_date', '<', $to)
        ->get();
    } else {
      $results = Patient::whereDate('enrollment_date', '<', $to)->get();
    }

    if ($category == 'new-age-gender' || $category == 'current-age-gender') {
      $results = $this->arrayGroupBy($results, 'age_group_gender');
      $results = $this->arrayCount($results);

      $results = array_merge($this->default_age_gender_results, $results);
    } else {
      $results = $this->arrayGroupBy($results, 'age_group');
      $results = $this->arrayCount($results);

      $results['Total'] = array_sum(array_values($results));
      $results = array_merge($this->default_results, $results);
    }

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
