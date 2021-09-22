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
        'category' => [
          'pmtct_cascades' => [
            'No. of New Pref Women [ANC]' => 0,
            'No. with known HIV Status' => 0,
            'KPs' => 0,
            'No. of Newly Tested' => 0,
            'Newly Tested HIV+' => 0,
            'Total HIV+' => 0,
            'Total on HAART' => 0,
          ],
          'pmtct_infants_cascades' => [
            'No. of New Pref Women [ANC]' => 0,
            'No. with known HIV Status' => 0,
            'KPs' => 0,
            'No. of Newly Tested' => 0,
            'Newly Tested HIV+' => 0,
            'Total HIV+' => 0,
            'Total on HAART' => 0,
            'Infants Issued ARV Prophylaxis' => 0
          ],
          'eid_cascades' => [
            'Samples collected by age (0 - <=12months)' => 0,
            'Positive by age (0 - <= 12 months)' => 0,
            'Positive, confirmed initated ART by age (0 - <= 12 months)' => 0
          ],
          'hei_cascades' => [
            'Samples collected by age (0 - <=12months)' => 0,
            'Positive by age (0 - <= 12 months)' => 0,
            'Positive, confirmed initated ART by age (0 - <= 12 months)' => 0,
            'Samples collected by age (2 - <=12months)' => 0,
            'Positive by age (2 - <= 12 months)' => 0,
            'Positive, confirmed initated ART by age (2 - <= 12 months)' => 0
          ],
          'hca_cascades' => [
            'HIV-ve in FollowUp' => 0,
            'HIV+ve' => 0,
            'To' => 0,
            'LTFU' => 0,
            'Dead' => 0
          ],
          'hca_dead_outcomes' => [
            'Dead [known HIV status]' => 0
          ]
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
