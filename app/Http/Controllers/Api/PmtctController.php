<?php

namespace App\Http\Controllers\Api;

use App\Models\Visit;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;

class PmtctController extends BaseController
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
  public function getPmtctCascadesByAgeGroupGender(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'age_group_gender';
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

  public function getPmtctHcaByAgeGroupGender(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'age_group_gender';
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
