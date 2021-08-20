<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{

  /**
   * Filter Array Elements based on filters
   *
   * @param  Array  $array
   * @param  Array  $filters
   * @return Array
   */
  public function arrayFilterBy($array, $filters)
  {
    $results = [];
    if (sizeof($filters['facility']) == 0 && sizeof($filters['sub_county']) == 0) {
      return $array;
    }
    $results = array_filter($array, function ($value) use ($filters) {
      return (in_array($value['facility'], $filters['facility']) || in_array($value['sub_county'], $filters['sub_county']));
    });
    return $results;
  }

  /**
   * Group Array Elements based on key
   *
   * @param  Array  $array
   * @param  string  $key
   * @return Array
   */
  public function arrayGroupBy($array, $key)
  {
    $results = [];
    foreach ($array as $val) {
      $results[$val[$key]][] = $val;
    }
    return $results;
  }

  /**
   * Count Array Elements
   *
   * @param  Array  $array
   * @return Array
   */
  public function arrayCount($array)
  {
    $response = [];
    foreach ($array as $index => $val) {
      $response[$index] = count($val);
    }
    return $response;
  }
}
