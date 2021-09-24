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

    //Remove empty filters
    $filters = array_filter($filters, function ($filter) {
      return sizeof($filter) > 0;
    });

    //Filter by all conditions
    foreach ($array as $value) {
      $match = [];
      foreach ($filters as $filter_name => $filter_values) {
        if (array_key_exists($filter_name, $value) && in_array($value[$filter_name], $filter_values)) {
          $match[] = true;
        } else {
          $match[] = false;
        }
      }
      if (!in_array(false, $match)) {
        $results[] = $value;
      }
    }
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
