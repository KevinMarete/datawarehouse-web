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
          'cd4_testing' => [
            'New in Care' => 0,
            'New in Care with bCD4' => 0,
            'New in Care with bCD4<200 (Eligible for CRAG)' => 0,
            'No. with CRAG Test' => 0,
            'No. with Positive CRAG Test Result' => 0,
            'No. on Fluconazole' => 0
          ],
          'index_testing' => [
            'Cases offered index testing' => 0,
            'Cases accepted index testing' => 0,
            'Contacts elicited' => 0,
            'Contacts tested [Key Population]' => 0,
            'Contacts tested [New Negative]' => 0,
            'Contacts tested [New Positive]' => 0,
            'Contacts not tested' => 0
          ],
          'index_ft_testing_point' => [
            'FT [Tested]' => 0,
            'FT [HIV-]' => 0,
            'FT [HIV+]' => 0,
            'FT [Yield]' => 0,
          ],
          'index_pns_testing_point' => [
            'PNS [Tested]' => 0,
            'PNS [HIV-]' => 0,
            'PNS [HIV+]' => 0,
            'PNS [Yield]' => 0,
          ],
          'vl_testing' => [
            'VL Done [Last 12 Months]' => 0,
            'VL Done [Routine]' => 0,
            'VL Done [Targeted]' => 0,
            'Routine [Suppressed]' => 0,
            'Routine [Not Suppressed]' => 0,
            'Targeted [Suppressed]' => 0,
            'Targeted [Not Suppressed]' => 0,
          ],
          'hiv_testing' => [
            'Tested for HIV' => 0,
            'HIV +ve' => 0,
            'Total Linked' => 0
          ],
          'hiv_testing_gender' => [
            'Male' => 0,
            'Female' => 0
          ],
          'hiv_testing_points' => [
            'FT'=> 0,
            'KP' => 0,
            'Mobile/Outreach(KP)' => 0,
            'Mobile/Outreach(GP)' => 0,
            'STI' => 0,
            'Post 1st ANC Visit' => 0,
            'ANC1' => 0,
            'PNC' => 0,
            'Emergency' => 0,
            'VMMC' => 0,
            'VCT' => 0,
            'Malnutrition' => 0,
            'CWC' => 0,
            'FP' => 0,
            'TB' => 0,
            'PNS' => 0,
            'Inpatient' => 0,
            'OPD' => 0
          ],
          'hiv_datim' => [
            'STI' => 0,
            'Emergency' => 0,
            'VMMC' => 0,
            'Malnutrition' => 0,
            'Pediatric' => 0,
            'Inpatient' => 0,
            'TB' => 0,
            'VCT' => 0,
            'ANC1' => 0,
            'Other PITC' => 0,
            'Index Testing' => 0
          ]
        ],
        'gender' => [
          'F' => 0,
          'M' => 0
        ]
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
    $default_results = $this->default_results[$group_by_index]['cd4_testing'];

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
    $default_results = $this->default_results[$group_by_index]['cd4_testing'];

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
    $default_results = $this->default_results[$group_by_index]['cd4_testing'];

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
    $default_results = $this->default_results[$group_by_index]['cd4_testing'];

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
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_child' => [true]
    ];
    $default_results = $this->default_results[$group_by_index]['index_testing'];

    $results = Hts::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $offered_test_results = $this->arrayGroupBy($results, 'is_offered_test');
    $offered_test_results = $this->arrayCount($offered_test_results);
    $default_results['Cases offered index testing'] = (isset($offered_test_results['1']) ? $offered_test_results['1'] : 0);

    $accepted_test_results = $this->arrayGroupBy($results, 'is_accepted_test');
    $accepted_test_results = $this->arrayCount($accepted_test_results);
    $default_results['Cases accepted index testing'] = (isset($accepted_test_results['1']) ? $accepted_test_results['1'] : 0);

    $contact_elicited_results = $this->arrayGroupBy($results, 'is_contact_elicited');
    $contact_elicited_results = $this->arrayCount($contact_elicited_results);
    $default_results['Contacts elicited'] = (isset($contact_elicited_results['1']) ? $contact_elicited_results['1'] : 0);

    $contact_tested_kp_results = $this->arrayGroupBy($results, 'is_contact_tested_kp');
    $contact_tested_kp_results = $this->arrayCount($contact_tested_kp_results);
    $default_results['Contacts tested [Key Population]'] = (isset($contact_tested_kp_results['1']) ? $contact_tested_kp_results['1'] : 0);

    $contact_tested_new_neg_results = $this->arrayGroupBy($results, 'is_contact_new_negative');
    $contact_tested_new_neg_results = $this->arrayCount($contact_tested_new_neg_results);
    $default_results['Contacts tested [New Negative]'] = (isset($contact_tested_new_neg_results['1']) ? $contact_tested_new_neg_results['1'] : 0);

    $contact_tested_new_pos_results = $this->arrayGroupBy($results, 'is_contact_new_positive');
    $contact_tested_new_pos_results = $this->arrayCount($contact_tested_new_pos_results);
    $default_results['Contacts tested [New Positive]'] = (isset($contact_tested_new_pos_results['1']) ? $contact_tested_new_pos_results['1'] : 0);

    $contact_not_tested_results = $this->arrayGroupBy($results, 'is_contact_not_tested');
    $contact_not_tested_results = $this->arrayCount($contact_not_tested_results);
    $default_results['Contacts not tested'] = (isset($contact_not_tested_results['1']) ? $contact_not_tested_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getIndexTestingAdultsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_adult' => [true]
    ];
    $default_results = $this->default_results[$group_by_index]['index_testing'];

    $results = Hts::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $offered_test_results = $this->arrayGroupBy($results, 'is_offered_test');
    $offered_test_results = $this->arrayCount($offered_test_results);
    $default_results['Cases offered index testing'] = (isset($offered_test_results['1']) ? $offered_test_results['1'] : 0);

    $accepted_test_results = $this->arrayGroupBy($results, 'is_accepted_test');
    $accepted_test_results = $this->arrayCount($accepted_test_results);
    $default_results['Cases accepted index testing'] = (isset($accepted_test_results['1']) ? $accepted_test_results['1'] : 0);

    $contact_elicited_results = $this->arrayGroupBy($results, 'is_contact_elicited');
    $contact_elicited_results = $this->arrayCount($contact_elicited_results);
    $default_results['Contacts elicited'] = (isset($contact_elicited_results['1']) ? $contact_elicited_results['1'] : 0);

    $contact_tested_kp_results = $this->arrayGroupBy($results, 'is_contact_tested_kp');
    $contact_tested_kp_results = $this->arrayCount($contact_tested_kp_results);
    $default_results['Contacts tested [Key Population]'] = (isset($contact_tested_kp_results['1']) ? $contact_tested_kp_results['1'] : 0);

    $contact_tested_new_neg_results = $this->arrayGroupBy($results, 'is_contact_new_negative');
    $contact_tested_new_neg_results = $this->arrayCount($contact_tested_new_neg_results);
    $default_results['Contacts tested [New Negative]'] = (isset($contact_tested_new_neg_results['1']) ? $contact_tested_new_neg_results['1'] : 0);

    $contact_tested_new_pos_results = $this->arrayGroupBy($results, 'is_contact_new_positive');
    $contact_tested_new_pos_results = $this->arrayCount($contact_tested_new_pos_results);
    $default_results['Contacts tested [New Positive]'] = (isset($contact_tested_new_pos_results['1']) ? $contact_tested_new_pos_results['1'] : 0);

    $contact_not_tested_results = $this->arrayGroupBy($results, 'is_contact_not_tested');
    $contact_not_tested_results = $this->arrayCount($contact_not_tested_results);
    $default_results['Contacts not tested'] = (isset($contact_not_tested_results['1']) ? $contact_not_tested_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getIndexTestingTotalsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];
    $default_results = $this->default_results[$group_by_index]['index_testing'];

    $results = Hts::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $offered_test_results = $this->arrayGroupBy($results, 'is_offered_test');
    $offered_test_results = $this->arrayCount($offered_test_results);
    $default_results['Cases offered index testing'] = (isset($offered_test_results['1']) ? $offered_test_results['1'] : 0);

    $accepted_test_results = $this->arrayGroupBy($results, 'is_accepted_test');
    $accepted_test_results = $this->arrayCount($accepted_test_results);
    $default_results['Cases accepted index testing'] = (isset($accepted_test_results['1']) ? $accepted_test_results['1'] : 0);

    $contact_elicited_results = $this->arrayGroupBy($results, 'is_contact_elicited');
    $contact_elicited_results = $this->arrayCount($contact_elicited_results);
    $default_results['Contacts elicited'] = (isset($contact_elicited_results['1']) ? $contact_elicited_results['1'] : 0);

    $contact_tested_kp_results = $this->arrayGroupBy($results, 'is_contact_tested_kp');
    $contact_tested_kp_results = $this->arrayCount($contact_tested_kp_results);
    $default_results['Contacts tested [Key Population]'] = (isset($contact_tested_kp_results['1']) ? $contact_tested_kp_results['1'] : 0);

    $contact_tested_new_neg_results = $this->arrayGroupBy($results, 'is_contact_new_negative');
    $contact_tested_new_neg_results = $this->arrayCount($contact_tested_new_neg_results);
    $default_results['Contacts tested [New Negative]'] = (isset($contact_tested_new_neg_results['1']) ? $contact_tested_new_neg_results['1'] : 0);

    $contact_tested_new_pos_results = $this->arrayGroupBy($results, 'is_contact_new_positive');
    $contact_tested_new_pos_results = $this->arrayCount($contact_tested_new_pos_results);
    $default_results['Contacts tested [New Positive]'] = (isset($contact_tested_new_pos_results['1']) ? $contact_tested_new_pos_results['1'] : 0);

    $contact_not_tested_results = $this->arrayGroupBy($results, 'is_contact_not_tested');
    $contact_not_tested_results = $this->arrayCount($contact_not_tested_results);
    $default_results['Contacts not tested'] = (isset($contact_not_tested_results['1']) ? $contact_not_tested_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getIndexTestingFtByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_ft_testing_point' => [true]
    ];
    $default_results = $this->default_results[$group_by_index]['index_ft_testing_point'];

    $results = Hts::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $offered_test_results = $this->arrayGroupBy($results, 'is_accepted_test');
    $offered_test_results = $this->arrayCount($offered_test_results);
    $default_results['FT [Tested]'] = (isset($offered_test_results['1']) ? $offered_test_results['1'] : 0);

    $accepted_test_results = $this->arrayGroupBy($results, 'is_tested_negative');
    $accepted_test_results = $this->arrayCount($accepted_test_results);
    $default_results['FT [HIV-]'] = (isset($accepted_test_results['1']) ? $accepted_test_results['1'] : 0);

    $contact_elicited_results = $this->arrayGroupBy($results, 'is_tested_positive');
    $contact_elicited_results = $this->arrayCount($contact_elicited_results);
    $default_results['FT [HIV+]'] = (isset($contact_elicited_results['1']) ? $contact_elicited_results['1'] : 0);

    $default_results['FT [Yield]'] = ($default_results['FT [Tested]'] > 0 ? round(($default_results['FT [HIV+]'] / $default_results['FT [Tested]']), 2) : 0);

    return response()->json($default_results);
  }

  public function getIndexTestingPnsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_pns_testing_point' => [true]
    ];
    $default_results = $this->default_results[$group_by_index]['index_pns_testing_point'];

    $results = Hts::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $offered_test_results = $this->arrayGroupBy($results, 'is_accepted_test');
    $offered_test_results = $this->arrayCount($offered_test_results);
    $default_results['PNS [Tested]'] = (isset($offered_test_results['1']) ? $offered_test_results['1'] : 0);

    $accepted_test_results = $this->arrayGroupBy($results, 'is_tested_negative');
    $accepted_test_results = $this->arrayCount($accepted_test_results);
    $default_results['PNS [HIV-]'] = (isset($accepted_test_results['1']) ? $accepted_test_results['1'] : 0);

    $contact_elicited_results = $this->arrayGroupBy($results, 'is_tested_positive');
    $contact_elicited_results = $this->arrayCount($contact_elicited_results);
    $default_results['PNS [HIV+]'] = (isset($contact_elicited_results['1']) ? $contact_elicited_results['1'] : 0);

    $default_results['PNS [Yield]'] = ($default_results['PNS [Tested]'] > 0 ? round(($default_results['PNS [HIV+]'] / $default_results['PNS [Tested]']), 2) : 0);

    return response()->json($default_results);
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
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'age_group' => ['0 - 9 yrs (Children)']
    ];
    $default_results = $this->default_results[$group_by_index]['vl_testing'];

    $results = Hts::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $vl_results = $this->arrayGroupBy($results, 'is_vl');
    $vl_results = $this->arrayCount($vl_results);
    $default_results['VL Done [Last 12 Months]'] = (isset($vl_results['1']) ? $vl_results['1'] : 0);

    $vl_routine_results = $this->arrayGroupBy($results, 'is_vl_routine');
    $vl_routine_results = $this->arrayCount($vl_routine_results);
    $default_results['VL Done [Routine]'] = (isset($vl_routine_results['1']) ? $vl_routine_results['1'] : 0);

    $vl_targeted_results = $this->arrayGroupBy($results, 'is_vl_targeted');
    $vl_targeted_results = $this->arrayCount($vl_targeted_results);
    $default_results['VL Done [Targeted]'] = (isset($vl_targeted_results['1']) ? $vl_targeted_results['1'] : 0);

    $vl_routine_suppressed_results = $this->arrayGroupBy($results, 'is_vl_routine_suppressed');
    $vl_routine_suppressed_results = $this->arrayCount($vl_routine_suppressed_results);
    $default_results['Routine [Suppressed]'] = (isset($vl_routine_suppressed_results['1']) ? $vl_routine_suppressed_results['1'] : 0);

    $vl_routine_not_suppressed_results = $this->arrayGroupBy($results, 'is_vl_routine_not_suppressed');
    $vl_routine_not_suppressed_results = $this->arrayCount($vl_routine_not_suppressed_results);
    $default_results['Routine [Not Suppressed]'] = (isset($vl_routine_not_suppressed_results['1']) ? $vl_routine_not_suppressed_results['1'] : 0);

    $vl_targeted_suppressed_results = $this->arrayGroupBy($results, 'is_vl_targeted_suppressed');
    $vl_targeted_suppressed_results = $this->arrayCount($vl_targeted_suppressed_results);
    $default_results['Targeted [Suppressed]'] = (isset($vl_targeted_suppressed_results['1']) ? $vl_targeted_suppressed_results['1'] : 0);

    $vl_targeted_not_suppressed_results = $this->arrayGroupBy($results, 'is_vl_targeted_not_suppressed');
    $vl_targeted_not_suppressed_results = $this->arrayCount($vl_targeted_not_suppressed_results);
    $default_results['Targeted [Not Suppressed]'] = (isset($vl_targeted_not_suppressed_results['1']) ? $vl_targeted_not_suppressed_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getVlTestingAdolescentsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'age_group' => ['10 - 19 yrs (Adolescents)']
    ];
    $default_results = $this->default_results[$group_by_index]['vl_testing'];

    $results = Hts::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $vl_results = $this->arrayGroupBy($results, 'is_vl');
    $vl_results = $this->arrayCount($vl_results);
    $default_results['VL Done [Last 12 Months]'] = (isset($vl_results['1']) ? $vl_results['1'] : 0);

    $vl_routine_results = $this->arrayGroupBy($results, 'is_vl_routine');
    $vl_routine_results = $this->arrayCount($vl_routine_results);
    $default_results['VL Done [Routine]'] = (isset($vl_routine_results['1']) ? $vl_routine_results['1'] : 0);

    $vl_targeted_results = $this->arrayGroupBy($results, 'is_vl_targeted');
    $vl_targeted_results = $this->arrayCount($vl_targeted_results);
    $default_results['VL Done [Targeted]'] = (isset($vl_targeted_results['1']) ? $vl_targeted_results['1'] : 0);

    $vl_routine_suppressed_results = $this->arrayGroupBy($results, 'is_vl_routine_suppressed');
    $vl_routine_suppressed_results = $this->arrayCount($vl_routine_suppressed_results);
    $default_results['Routine [Suppressed]'] = (isset($vl_routine_suppressed_results['1']) ? $vl_routine_suppressed_results['1'] : 0);

    $vl_routine_not_suppressed_results = $this->arrayGroupBy($results, 'is_vl_routine_not_suppressed');
    $vl_routine_not_suppressed_results = $this->arrayCount($vl_routine_not_suppressed_results);
    $default_results['Routine [Not Suppressed]'] = (isset($vl_routine_not_suppressed_results['1']) ? $vl_routine_not_suppressed_results['1'] : 0);

    $vl_targeted_suppressed_results = $this->arrayGroupBy($results, 'is_vl_targeted_suppressed');
    $vl_targeted_suppressed_results = $this->arrayCount($vl_targeted_suppressed_results);
    $default_results['Targeted [Suppressed]'] = (isset($vl_targeted_suppressed_results['1']) ? $vl_targeted_suppressed_results['1'] : 0);

    $vl_targeted_not_suppressed_results = $this->arrayGroupBy($results, 'is_vl_targeted_not_suppressed');
    $vl_targeted_not_suppressed_results = $this->arrayCount($vl_targeted_not_suppressed_results);
    $default_results['Targeted [Not Suppressed]'] = (isset($vl_targeted_not_suppressed_results['1']) ? $vl_targeted_not_suppressed_results['1'] : 0);

    return response()->json($default_results);
  }
}
