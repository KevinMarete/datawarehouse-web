<?php

namespace App\Http\Controllers\Api;

use App\Models\CervicalScreening;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;

class CervicalScreeningController extends BaseController
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
        'category' => [
          'HIV-Positive Women ages 15-49* on ART' => 0,
          'Total Screened for Cervical Cancer' => 0,
          'Total Positive Screen [Eligible for TX]' => 0,
          'Total on Treatment [Cryotherapy, Thermocoagulation or LEEP]' => 0
        ],
        'gender' => [
          'F' => 0,
          'M' => 0
        ],
        'visit-type' => [
          '1st Time Screened' => 0,
          'Rescreened after previous negative' => 0
        ]
      ];
  }
  public function getCervicalScreeningByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];
    $default_results = $this->default_results[$group_by_index];

    $results = CervicalScreening::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $female_onart_results = $this->arrayGroupBy($results, 'is_female_on_art');
    $female_onart_results = $this->arrayCount($female_onart_results);
    $default_results['HIV-Positive Women ages 15-49* on ART'] = (isset($female_onart_results['1']) ? $female_onart_results['1'] : 0);

    $default_results['Total Screened for Cervical Cancer'] = sizeof($results);

    $positive_results = $this->arrayGroupBy($results, 'is_positive');
    $positive_results = $this->arrayCount($positive_results);
    $default_results['Total Positive Screen [Eligible for TX]'] = (isset($positive_results['1']) ? $positive_results['1'] : 0);

    $treatment_results = $this->arrayGroupBy($results, 'is_on_treatment');
    $treatment_results = $this->arrayCount($treatment_results);
    $default_results['Total on Treatment [Cryotherapy, Thermocoagulation or LEEP]'] = (isset($treatment_results['1']) ? $treatment_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getCervicalScreeningByVisitType(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'visit-type';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];
    $default_results = $this->default_results[$group_by_index];

    $results = CervicalScreening::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $first_time_results = $this->arrayGroupBy($results, 'is_first_time_screen');
    $first_time_results = $this->arrayCount($first_time_results);
    $default_results['1st Time Screened'] = (isset($first_time_results['1']) ? $first_time_results['1'] : 0);

    $rescreen_results = $this->arrayGroupBy($results, 'is_rescreen_after_negative');
    $rescreen_results = $this->arrayCount($rescreen_results);
    $default_results['Rescreened after previous negative'] = (isset($rescreen_results['1']) ? $rescreen_results['1'] : 0);

    return response()->json($default_results);
  }
}
