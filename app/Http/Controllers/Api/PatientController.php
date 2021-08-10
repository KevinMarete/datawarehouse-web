<?php

namespace App\Http\Controllers\Api;

use App\Models\Patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{

  protected $default_results;

  public function __construct()
  {
    $this->default_results =
      [
        'age_group' => [
          '20+ yrs (Adults)' => 0,
          '10 - 19 yrs (Adolescents)' => 0,
          '0 - 9 yrs (Children)' => 0,
          'Total' => 0
        ],
        'age_group_gender' => [
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
        ],
        'gender' => [
          'F' => 0,
          'M' => 0
        ],
      ];
  }

  /**
   * Display all current patients totals on art by age group
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getCurrentOnArtPatientTotalsByAgeGroup(Request $request)
  {
    $to = $request->to;
    $group_by_index = 'age_group';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Patient::whereDate('start_regimen_date', '<', $to)
      ->get()->toArray();

    $results = $this->arrayFilterBy($results, $filters);
    $results = $this->arrayGroupBy($results, $group_by_index);
    $results = $this->arrayCount($results);

    $results['Total'] = array_sum(array_values($results));
    $results = array_merge($this->default_results[$group_by_index], $results);

    return response()->json($results);
  }

  /**
   * Display all current patients totals on art by age group gender
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getCurrentOnArtPatientTotalsByAgeGroupGender(Request $request)
  {
    $to = $request->to;
    $group_by_index = 'age_group_gender';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Patient::whereDate('start_regimen_date', '<', $to)->get()->toArray();

    $results = $this->arrayFilterBy($results, $filters);
    $results = $this->arrayGroupBy($results, $group_by_index);
    $results = $this->arrayCount($results);

    $results = array_merge($this->default_results[$group_by_index], $results);

    return response()->json($results);
  }

  /**
   * Display all current patients proportions on art by age group gender
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getCurrentOnArtPatientProportionsByAgeGroupGender(Request $request)
  {
    $to = $request->to;
    $group_by_index = 'age_group_gender';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $onart_results = Patient::whereDate('start_regimen_date', '<', $to)->get()->toArray();
    $onart_results = $this->arrayFilterBy($onart_results, $filters);
    $onart_results = $this->arrayGroupBy($onart_results, $group_by_index);
    $onart_results = $this->arrayCount($onart_results);
    $onart_results = array_merge($this->default_results[$group_by_index], $onart_results);

    $oncare_results = Patient::whereDate('enrollment_date', '<', $to)->get()->toArray();
    $oncare_results = $this->arrayFilterBy($oncare_results, $filters);
    $oncare_results = $this->arrayGroupBy($oncare_results, $group_by_index);
    $oncare_results = $this->arrayCount($oncare_results);
    $oncare_results = array_merge($this->default_results[$group_by_index], $oncare_results);

    $results = [];
    foreach ($oncare_results as $key => $result) {
      $results[$key] = 0;
      if ($result > 0) {
        $results[$key] = round(($onart_results[$key] / $result) * 100);
      }
    }

    return response()->json($results);
  }

  /**
   * Display all new patients totals on art by age group
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getNewOnArtPatientTotalsByAgeGroup(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'age_group';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Patient::whereDate('start_regimen_date', '>=', $from)->whereDate('start_regimen_date', '<', $to)->get()->toArray();

    $results = $this->arrayFilterBy($results, $filters);
    $results = $this->arrayGroupBy($results, $group_by_index);
    $results = $this->arrayCount($results);

    $results['Total'] = array_sum(array_values($results));
    $results = array_merge($this->default_results[$group_by_index], $results);

    return response()->json($results);
  }

  /**
   * Display all new patients totals on art by age group gender
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getNewOnArtPatientTotalsByAgeGroupGender(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'age_group_gender';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Patient::whereDate('start_regimen_date', '>=', $from)->whereDate('start_regimen_date', '<', $to)->get()->toArray();

    $results = $this->arrayFilterBy($results, $filters);
    $results = $this->arrayGroupBy($results, $group_by_index);
    $results = $this->arrayCount($results);

    $results = array_merge($this->default_results[$group_by_index], $results);

    return response()->json($results);
  }

  /**
   * Display all current patients totals on care by age group
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getCurrentOnCarePatientTotalsByAgeGroup(Request $request)
  {
    $to = $request->to;
    $group_by_index = 'age_group';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Patient::whereDate('enrollment_date', '<', $to)->get()->toArray();

    $results = $this->arrayFilterBy($results, $filters);
    $results = $this->arrayGroupBy($results, $group_by_index);
    $results = $this->arrayCount($results);

    $results['Total'] = array_sum(array_values($results));
    $results = array_merge($this->default_results[$group_by_index], $results);

    return response()->json($results);
  }

  /**
   * Display all current patients totals on care by age group gender
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getCurrentOnCarePatientTotalsByAgeGroupGender(Request $request)
  {
    $to = $request->to;
    $group_by_index = 'age_group_gender';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Patient::whereDate('enrollment_date', '<', $to)->get()->toArray();

    $results = $this->arrayFilterBy($results, $filters);
    $results = $this->arrayGroupBy($results, $group_by_index);
    $results = $this->arrayCount($results);

    $results = array_merge($this->default_results[$group_by_index], $results);

    return response()->json($results);
  }

  /**
   * Display all new patients totals on care by age group
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getNewOnCarePatientTotalsByAgeGroup(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'age_group';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Patient::whereDate('enrollment_date', '>=', $from)->whereDate('enrollment_date', '<', $to)->get()->toArray();

    $results = $this->arrayFilterBy($results, $filters);
    $results = $this->arrayGroupBy($results, $group_by_index);
    $results = $this->arrayCount($results);

    $results['Total'] = array_sum(array_values($results));
    $results = array_merge($this->default_results[$group_by_index], $results);

    return response()->json($results);
  }

  /**
   * Display all new patients totals on care by age group gender
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getNewOnCarePatientTotalsByAgeGroupGender(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'age_group_gender';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Patient::whereDate('enrollment_date', '>=', $from)->whereDate('enrollment_date', '<', $to)->get()->toArray();

    $results = $this->arrayFilterBy($results, $filters);
    $results = $this->arrayGroupBy($results, $group_by_index);
    $results = $this->arrayCount($results);

    $results = array_merge($this->default_results[$group_by_index], $results);

    return response()->json($results);
  }

  /**
   * Display all new patients totals on care by age group
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getTestedPostivePatientTotalsByGender(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'gender';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Patient::whereDate('hiv_test_date', '>=', $from)->whereDate('hiv_test_date', '<', $to)->get()->toArray();

    $results = $this->arrayFilterBy($results, $filters);
    $results = $this->arrayGroupBy($results, $group_by_index);
    $results = $this->arrayCount($results);

    $results = array_merge($this->default_results[$group_by_index], $results);

    return response()->json($results);
  }

  /**
   * Display all new patients totals on care by age group gender
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getTestedPostivePatientTotalsByAgeGroupGender(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'age_group_gender';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Patient::whereDate('hiv_test_date', '>=', $from)->whereDate('hiv_test_date', '<', $to)->get()->toArray();

    $results = $this->arrayFilterBy($results, $filters);
    $results = $this->arrayGroupBy($results, $group_by_index);
    $results = $this->arrayCount($results);

    $results = array_merge($this->default_results[$group_by_index], $results);

    return response()->json($results);
  }

  /**
   * Filter Array Elements based on filters
   *
   * @param  Array  $array
   * @param  Array  $filters
   * @return Array
   */
  private function arrayFilterBy($array, $filters)
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
  private function arrayGroupBy($array, $key)
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
  private function arrayCount($array)
  {
    $response = [];
    foreach ($array as $index => $val) {
      $response[$index] = count($val);
    }
    return $response;
  }
}
