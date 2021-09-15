<?php

namespace App\Http\Controllers\Api;

use App\Models\Hts;
use App\Models\Visit;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;

class TestController extends BaseController
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
          'New in Care' => 0,
          'New in Care with bCD4' => 0,
          'New in Care with bCD4<200 (Eligible for CRAG)' => 0,
          'No. with CRAG Test' => 0,
          'No. with Positive CRAG Test Result' => 0,
          'No. on Fluconazole' => 0
        ],
        'gender' => [
          'F' => 0,
          'M' => 0
        ],
      ];
  }
  public function getCD4TestsChildrenByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'age_group' => ['0 - 9 yrs (Children)']
    ];
    $default_results = $this->default_results[$group_by_index];

    $results = Hts::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_care_results = $this->arrayGroupBy($results, 'is_new_care');
    $new_care_results = $this->arrayCount($new_care_results);
    $default_results['New in Care'] = (isset($new_care_results['1']) ? $new_care_results['1'] : 0);

    $new_care_bcd4_results = $this->arrayGroupBy($results, 'is_new_care_bcd4');
    $new_care_bcd4_results = $this->arrayCount($new_care_bcd4_results);
    $default_results['New in Care with bCD4'] = (isset($new_care_bcd4_results['1']) ? $new_care_bcd4_results['1'] : 0);

    $eligible_crag_results = $this->arrayGroupBy($results, 'is_eligible_crag');
    $eligible_crag_results = $this->arrayCount($eligible_crag_results);
    $default_results['New in Care with bCD4<200 (Eligible for CRAG)'] = (isset($eligible_crag_results['1']) ? $eligible_crag_results['1'] : 0);

    $crag_test_results = $this->arrayGroupBy($results, 'is_crag_test');
    $crag_test_results = $this->arrayCount($crag_test_results);
    $default_results['No. with CRAG Test'] = (isset($crag_test_results['1']) ? $crag_test_results['1'] : 0);

    $crag_test_positive_results = $this->arrayGroupBy($results, 'is_crag_test_positive');
    $crag_test_positive_results = $this->arrayCount($crag_test_positive_results);
    $default_results['No. with Positive CRAG Test Result'] = (isset($crag_test_positive_results['1']) ? $crag_test_positive_results['1'] : 0);

    $fluconazole_results = $this->arrayGroupBy($results, 'is_fluconazole');
    $fluconazole_results = $this->arrayCount($fluconazole_results);
    $default_results['No. on Fluconazole'] = (isset($fluconazole_results['1']) ? $fluconazole_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getCD4TestsAdolescentsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'age_group' => ['10 - 19 yrs (Adolescents)']
    ];
    $default_results = $this->default_results[$group_by_index];

    $results = Hts::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_care_results = $this->arrayGroupBy($results, 'is_new_care');
    $new_care_results = $this->arrayCount($new_care_results);
    $default_results['New in Care'] = (isset($new_care_results['1']) ? $new_care_results['1'] : 0);

    $new_care_bcd4_results = $this->arrayGroupBy($results, 'is_new_care_bcd4');
    $new_care_bcd4_results = $this->arrayCount($new_care_bcd4_results);
    $default_results['New in Care with bCD4'] = (isset($new_care_bcd4_results['1']) ? $new_care_bcd4_results['1'] : 0);

    $eligible_crag_results = $this->arrayGroupBy($results, 'is_eligible_crag');
    $eligible_crag_results = $this->arrayCount($eligible_crag_results);
    $default_results['New in Care with bCD4<200 (Eligible for CRAG)'] = (isset($eligible_crag_results['1']) ? $eligible_crag_results['1'] : 0);

    $crag_test_results = $this->arrayGroupBy($results, 'is_crag_test');
    $crag_test_results = $this->arrayCount($crag_test_results);
    $default_results['No. with CRAG Test'] = (isset($crag_test_results['1']) ? $crag_test_results['1'] : 0);

    $crag_test_positive_results = $this->arrayGroupBy($results, 'is_crag_test_positive');
    $crag_test_positive_results = $this->arrayCount($crag_test_positive_results);
    $default_results['No. with Positive CRAG Test Result'] = (isset($crag_test_positive_results['1']) ? $crag_test_positive_results['1'] : 0);

    $fluconazole_results = $this->arrayGroupBy($results, 'is_fluconazole');
    $fluconazole_results = $this->arrayCount($fluconazole_results);
    $default_results['No. on Fluconazole'] = (isset($fluconazole_results['1']) ? $fluconazole_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getCD4TestsAdultsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'age_group' => ['20+ yrs (Adults)']
    ];
    $default_results = $this->default_results[$group_by_index];

    $results = Hts::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_care_results = $this->arrayGroupBy($results, 'is_new_care');
    $new_care_results = $this->arrayCount($new_care_results);
    $default_results['New in Care'] = (isset($new_care_results['1']) ? $new_care_results['1'] : 0);

    $new_care_bcd4_results = $this->arrayGroupBy($results, 'is_new_care_bcd4');
    $new_care_bcd4_results = $this->arrayCount($new_care_bcd4_results);
    $default_results['New in Care with bCD4'] = (isset($new_care_bcd4_results['1']) ? $new_care_bcd4_results['1'] : 0);

    $eligible_crag_results = $this->arrayGroupBy($results, 'is_eligible_crag');
    $eligible_crag_results = $this->arrayCount($eligible_crag_results);
    $default_results['New in Care with bCD4<200 (Eligible for CRAG)'] = (isset($eligible_crag_results['1']) ? $eligible_crag_results['1'] : 0);

    $crag_test_results = $this->arrayGroupBy($results, 'is_crag_test');
    $crag_test_results = $this->arrayCount($crag_test_results);
    $default_results['No. with CRAG Test'] = (isset($crag_test_results['1']) ? $crag_test_results['1'] : 0);

    $crag_test_positive_results = $this->arrayGroupBy($results, 'is_crag_test_positive');
    $crag_test_positive_results = $this->arrayCount($crag_test_positive_results);
    $default_results['No. with Positive CRAG Test Result'] = (isset($crag_test_positive_results['1']) ? $crag_test_positive_results['1'] : 0);

    $fluconazole_results = $this->arrayGroupBy($results, 'is_fluconazole');
    $fluconazole_results = $this->arrayCount($fluconazole_results);
    $default_results['No. on Fluconazole'] = (isset($fluconazole_results['1']) ? $fluconazole_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getCD4TestsTotalsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'age_group' => []
    ];
    $default_results = $this->default_results[$group_by_index];

    $results = Hts::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_care_results = $this->arrayGroupBy($results, 'is_new_care');
    $new_care_results = $this->arrayCount($new_care_results);
    $default_results['New in Care'] = (isset($new_care_results['1']) ? $new_care_results['1'] : 0);

    $new_care_bcd4_results = $this->arrayGroupBy($results, 'is_new_care_bcd4');
    $new_care_bcd4_results = $this->arrayCount($new_care_bcd4_results);
    $default_results['New in Care with bCD4'] = (isset($new_care_bcd4_results['1']) ? $new_care_bcd4_results['1'] : 0);

    $eligible_crag_results = $this->arrayGroupBy($results, 'is_eligible_crag');
    $eligible_crag_results = $this->arrayCount($eligible_crag_results);
    $default_results['New in Care with bCD4<200 (Eligible for CRAG)'] = (isset($eligible_crag_results['1']) ? $eligible_crag_results['1'] : 0);

    $crag_test_results = $this->arrayGroupBy($results, 'is_crag_test');
    $crag_test_results = $this->arrayCount($crag_test_results);
    $default_results['No. with CRAG Test'] = (isset($crag_test_results['1']) ? $crag_test_results['1'] : 0);

    $crag_test_positive_results = $this->arrayGroupBy($results, 'is_crag_test_positive');
    $crag_test_positive_results = $this->arrayCount($crag_test_positive_results);
    $default_results['No. with Positive CRAG Test Result'] = (isset($crag_test_positive_results['1']) ? $crag_test_positive_results['1'] : 0);

    $fluconazole_results = $this->arrayGroupBy($results, 'is_fluconazole');
    $fluconazole_results = $this->arrayCount($fluconazole_results);
    $default_results['No. on Fluconazole'] = (isset($fluconazole_results['1']) ? $fluconazole_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getIndexTestingChildrenByCategory(Request $request)
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

  public function getIndexTestingAdultsByCategory(Request $request)
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

  public function getIndexTestingTotalsByCategory(Request $request)
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

  public function getIndexTestingFtByCategory(Request $request)
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

  public function getIndexTestingPnsByCategory(Request $request)
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

  public function getHivTestingChildrenByAgeGroup(Request $request)
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

  public function getHivTestingAdolescentsByAgeGroup(Request $request)
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

  public function getHivTestingYouthsByAgeGroup(Request $request)
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

  public function getHivTestingAdultsByAgeGroup(Request $request)
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

  public function getHivTestingTotalsByAgeGroup(Request $request)
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

  public function getHivTestingOverallByGender(Request $request)
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

  public function getHivTestingPositiveOverallByGender(Request $request)
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

  public function getHivTestingPositiveTotals(Request $request)
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

  public function getHivTestingPositiveLinkedTotals(Request $request)
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


  public function getHivTestingPositiveMales(Request $request)
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

  public function getHivTestingPositiveLinkedMales(Request $request)
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

  public function getHivTestingPositiveFemales(Request $request)
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

  public function getHivTestingPositiveLinkedFemales(Request $request)
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

  public function getHivTestingModalitiesByTesting(Request $request)
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

  public function getHivTestingPositiveModalitiesByTesting(Request $request)
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

  public function getHivTestingModalitiesByDatim(Request $request)
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

  public function getHivTestingPositiveModalitiesByDatim(Request $request)
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

  public function getVlTestingChildrenByCategory(Request $request)
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

  public function getVlTestingAdolescentsByCategory(Request $request)
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
