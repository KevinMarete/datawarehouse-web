<?php

namespace App\Http\Controllers\Api;

use App\Models\Visit;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;

class CohortController extends BaseController
{

  protected $default_results;

  public function __construct()
  {
    $this->default_results =
      [
        'category' => [
          'Total Starting ART Last 12 Months' => 0,
          'Net Cohort Starting ART Last 12 Months' => 0,
          'Retention (Retained)' => 0,
          'Retention (Not Retained)' => 0,
          'Attritions (Dead)' => 0,
          'Attritions (Stopped ART)' => 0,
          'Attritions (LTFU)' => 0,
        ],
      ];
  }

  /**
   * Display all cohort children by category
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getCohortChildrenByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Visit::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->whereRaw('datediff(next_appointment_date, visit_date) > ?', [30])->get()->toArray();

    $results = $this->arrayFilterBy($results, $filters);
    $results = $this->arrayGroupBy($results, $group_by_index);
    $results = $this->arrayCount($results);
    $results = array_merge($this->default_results[$group_by_index], $results);

    return response()->json($results);
  }

  /**
   * Display all cohort children by category
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getCohortAdolescentsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Visit::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->whereRaw('datediff(next_appointment_date, visit_date) > ?', [30])->get()->toArray();

    $results = $this->arrayFilterBy($results, $filters);
    $results = $this->arrayGroupBy($results, $group_by_index);
    $results = $this->arrayCount($results);
    $results = array_merge($this->default_results[$group_by_index], $results);

    return response()->json($results);
  }

  /**
   * Display all cohort children by category
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getCohortAdultsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Visit::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->whereRaw('datediff(next_appointment_date, visit_date) > ?', [30])->get()->toArray();

    $results = $this->arrayFilterBy($results, $filters);
    $results = $this->arrayGroupBy($results, $group_by_index);
    $results = $this->arrayCount($results);
    $results = array_merge($this->default_results[$group_by_index], $results);

    return response()->json($results);
  }

  /**
   * Display all cohort children by category
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getCohortTotalsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Visit::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->whereRaw('datediff(next_appointment_date, visit_date) > ?', [30])->get()->toArray();

    $results = $this->arrayFilterBy($results, $filters);
    $results = $this->arrayGroupBy($results, $group_by_index);
    $results = $this->arrayCount($results);
    $results = array_merge($this->default_results[$group_by_index], $results);

    return response()->json($results);
  }
}
