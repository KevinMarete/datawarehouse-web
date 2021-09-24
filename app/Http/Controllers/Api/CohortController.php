<?php

namespace App\Http\Controllers\Api;

use App\Models\Cohort;
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
    $from = date('Y-m-d', strtotime($request->from . '-1 year'));
    $to = date('Y-m-d', strtotime($request->to . '-1 year'));
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'age_group' => ['0 - 9 yrs (Children)']
    ];
    $default_results = $this->default_results[$group_by_index];

    $results = Cohort::whereDate('enroll_date', '>=', $from)->whereDate('enroll_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $default_results['Total Starting ART Last 12 Months'] = sizeof($results);
    $default_results['Net Cohort Starting ART Last 12 Months'] = sizeof($results);

    $retained_results = $this->arrayGroupBy($results, 'is_retained');
    $retained_results = $this->arrayCount($retained_results);
    $default_results['Retention (Retained)'] = (isset($retained_results['1']) ? $retained_results['1'] : 0);
    $default_results['Retention (Not Retained)'] = (isset($retained_results['0']) ? $retained_results['0'] : 0);

    $dead_results = $this->arrayGroupBy($results, 'is_dead');
    $dead_results = $this->arrayCount($dead_results);
    $default_results['Attritions (Dead)'] = (isset($dead_results['1']) ? $dead_results['1'] : 0);

    $stopped_results = $this->arrayGroupBy($results, 'is_stopped_art');
    $stopped_results = $this->arrayCount($stopped_results);
    $default_results['Attritions (Stopped ART)'] = (isset($stopped_results['1']) ? $stopped_results['1'] : 0);

    $ltfu_results = $this->arrayGroupBy($results, 'is_ltfu');
    $ltfu_results = $this->arrayCount($ltfu_results);
    $default_results['Attritions (LTFU)'] = (isset($ltfu_results['1']) ? $ltfu_results['1'] : 0);

    return response()->json($default_results);
  }

  /**
   * Display all cohort children by category
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getCohortAdolescentsByCategory(Request $request)
  {
    $from = date('Y-m-d', strtotime($request->from . '-1 year'));
    $to = date('Y-m-d', strtotime($request->to . '-1 year'));
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'age_group' => ['10 - 19 yrs (Adolescents)']
    ];
    $default_results = $this->default_results[$group_by_index];

    $results = Cohort::whereDate('enroll_date', '>=', $from)->whereDate('enroll_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $default_results['Total Starting ART Last 12 Months'] = sizeof($results);
    $default_results['Net Cohort Starting ART Last 12 Months'] = sizeof($results);

    $retained_results = $this->arrayGroupBy($results, 'is_retained');
    $retained_results = $this->arrayCount($retained_results);
    $default_results['Retention (Retained)'] = (isset($retained_results['1']) ? $retained_results['1'] : 0);
    $default_results['Retention (Not Retained)'] = (isset($retained_results['0']) ? $retained_results['0'] : 0);

    $dead_results = $this->arrayGroupBy($results, 'is_dead');
    $dead_results = $this->arrayCount($dead_results);
    $default_results['Attritions (Dead)'] = (isset($dead_results['1']) ? $dead_results['1'] : 0);

    $stopped_results = $this->arrayGroupBy($results, 'is_stopped_art');
    $stopped_results = $this->arrayCount($stopped_results);
    $default_results['Attritions (Stopped ART)'] = (isset($stopped_results['1']) ? $stopped_results['1'] : 0);

    $ltfu_results = $this->arrayGroupBy($results, 'is_ltfu');
    $ltfu_results = $this->arrayCount($ltfu_results);
    $default_results['Attritions (LTFU)'] = (isset($ltfu_results['1']) ? $ltfu_results['1'] : 0);

    return response()->json($default_results);
  }

  /**
   * Display all cohort children by category
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getCohortAdultsByCategory(Request $request)
  {
    $from = date('Y-m-d', strtotime($request->from . '-1 year'));
    $to = date('Y-m-d', strtotime($request->to . '-1 year'));
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'age_group' => ['20+ yrs (Adults)']
    ];
    $default_results = $this->default_results[$group_by_index];

    $results = Cohort::whereDate('enroll_date', '>=', $from)->whereDate('enroll_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $default_results['Total Starting ART Last 12 Months'] = sizeof($results);
    $default_results['Net Cohort Starting ART Last 12 Months'] = sizeof($results);

    $retained_results = $this->arrayGroupBy($results, 'is_retained');
    $retained_results = $this->arrayCount($retained_results);
    $default_results['Retention (Retained)'] = (isset($retained_results['1']) ? $retained_results['1'] : 0);
    $default_results['Retention (Not Retained)'] = (isset($retained_results['0']) ? $retained_results['0'] : 0);

    $dead_results = $this->arrayGroupBy($results, 'is_dead');
    $dead_results = $this->arrayCount($dead_results);
    $default_results['Attritions (Dead)'] = (isset($dead_results['1']) ? $dead_results['1'] : 0);

    $stopped_results = $this->arrayGroupBy($results, 'is_stopped_art');
    $stopped_results = $this->arrayCount($stopped_results);
    $default_results['Attritions (Stopped ART)'] = (isset($stopped_results['1']) ? $stopped_results['1'] : 0);

    $ltfu_results = $this->arrayGroupBy($results, 'is_ltfu');
    $ltfu_results = $this->arrayCount($ltfu_results);
    $default_results['Attritions (LTFU)'] = (isset($ltfu_results['1']) ? $ltfu_results['1'] : 0);

    return response()->json($default_results);
  }

  /**
   * Display all cohort children by category
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function getCohortTotalsByCategory(Request $request)
  {
    $from = date('Y-m-d', strtotime($request->from . '-1 year'));
    $to = date('Y-m-d', strtotime($request->to . '-1 year'));
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'age_group' => []
    ];
    $default_results = $this->default_results[$group_by_index];

    $results = Cohort::whereDate('enroll_date', '>=', $from)->whereDate('enroll_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $default_results['Total Starting ART Last 12 Months'] = sizeof($results);
    $default_results['Net Cohort Starting ART Last 12 Months'] = sizeof($results);

    $retained_results = $this->arrayGroupBy($results, 'is_retained');
    $retained_results = $this->arrayCount($retained_results);
    $default_results['Retention (Retained)'] = (isset($retained_results['1']) ? $retained_results['1'] : 0);
    $default_results['Retention (Not Retained)'] = (isset($retained_results['0']) ? $retained_results['0'] : 0);

    $dead_results = $this->arrayGroupBy($results, 'is_dead');
    $dead_results = $this->arrayCount($dead_results);
    $default_results['Attritions (Dead)'] = (isset($dead_results['1']) ? $dead_results['1'] : 0);

    $stopped_results = $this->arrayGroupBy($results, 'is_stopped_art');
    $stopped_results = $this->arrayCount($stopped_results);
    $default_results['Attritions (Stopped ART)'] = (isset($stopped_results['1']) ? $stopped_results['1'] : 0);

    $ltfu_results = $this->arrayGroupBy($results, 'is_ltfu');
    $ltfu_results = $this->arrayCount($ltfu_results);
    $default_results['Attritions (LTFU)'] = (isset($ltfu_results['1']) ? $ltfu_results['1'] : 0);

    return response()->json($default_results);
  }
}
