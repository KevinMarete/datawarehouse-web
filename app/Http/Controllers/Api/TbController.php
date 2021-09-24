<?php

namespace App\Http\Controllers\Api;

use App\Models\Tb;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;

class TbController extends BaseController
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
          'cascades' => [
            'No. of New & Relapsed TB Cases' => 0,
            'No. with known HIV status' => 0,
            'KPs' => 0,
            'No. Newly Tested' => 0,
            'Newly Tested HIV+' => 0,
            'Total HIV+' => 0,
            'Total on HAART' => 0
          ],
          'testing_point' => [
            'Newly Tested' => 0,
            'New HIV+' => 0
          ],
          'outcomes' => [
            'Total in Cohort [TB/HIV+]' => 0,
            'Total with TB Outcomes' => 0,
            'Cured' => 0,
            'Treatment Complete' => 0,
            'Treatment Failure' => 0,
            'Died' => 0,
            'LTFU' => 0,
            'Not Evaluated (TO)' => 0
          ],
          'prevention' => [
            'Current on ART' => 0,
            'Screened for TB' => 0,
            'Screened Negative' => 0,
            'Expected to Complete IPT' => 0,
            'Complete IPT' => 0
          ],
          'treatment' => [
            'Current on ART' => 0,
            'Screened for TB' => 0,
            'Screened Positive' => 0,
            'Specimen sent for Bacteriologic Diagnosis' => 0,
            'Diagnosis with TB' => 0,
            'Started on TB Treatment' => 0
          ],
          'diagnosis' => [
            'GeneXpert' => 0,
            'Chest Xray' => 0,
            'Smear Microscopy' => 0
          ]
        ],
        'gender' => [
          'F' => 0,
          'M' => 0
        ],
      ];
  }
  
  public function getTbCascadesTotalsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $default_results = $this->default_results[$group_by_index]['cascades'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_results = $this->arrayGroupBy($results, 'is_new');
    $new_results = $this->arrayCount($new_results);
    $default_results['No. of New & Relapsed TB Cases'] = (isset($new_results['1']) ? $new_results['1'] : 0);

    $known_status_results = $this->arrayGroupBy($results, 'is_known_hiv_status');
    $known_status_results = $this->arrayCount($known_status_results);
    $default_results['No. with known HIV status'] = (isset($known_status_results['1']) ? $known_status_results['1'] : 0);

    $new_ipt_results = $this->arrayGroupBy($results, 'is_kp');
    $new_ipt_results = $this->arrayCount($new_ipt_results);
    $default_results['KPs'] = (isset($new_ipt_results['1']) ? $new_ipt_results['1'] : 0);

    $new_tested_results = $this->arrayGroupBy($results, 'is_new_tested');
    $new_tested_results = $this->arrayCount($new_tested_results);
    $default_results['No. Newly Tested'] = (isset($new_tested_results['1']) ? $new_tested_results['1'] : 0);

    $new_positive_results = $this->arrayGroupBy($results, 'is_new_positive');
    $new_positive_results = $this->arrayCount($new_positive_results);
    $default_results['Newly Tested HIV+'] = (isset($new_positive_results['1']) ? $new_positive_results['1'] : 0);

    $positive_results = $this->arrayGroupBy($results, 'is_positive');
    $positive_results = $this->arrayCount($positive_results);
    $default_results['Total HIV+'] = (isset($positive_results['1']) ? $positive_results['1'] : 0);

    $on_haart_results = $this->arrayGroupBy($results, 'is_on_haart');
    $on_haart_results = $this->arrayCount($on_haart_results);
    $default_results['Total on HAART'] = (isset($on_haart_results['1']) ? $on_haart_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getTbCascadesTestingPointsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $default_results = $this->default_results[$group_by_index]['testing_point'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_tested_results = $this->arrayGroupBy($results, 'is_new_tested');
    $new_tested_results = $this->arrayCount($new_tested_results);
    $default_results['Newly Tested'] = (isset($new_tested_results['1']) ? $new_tested_results['1'] : 0);

    $new_positive_results = $this->arrayGroupBy($results, 'is_new_positive');
    $new_positive_results = $this->arrayCount($new_positive_results);
    $default_results['New HIV+'] = (isset($new_positive_results['1']) ? $new_positive_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getTbCascadesChildrenByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_child' => [true]
    ];

    $default_results = $this->default_results[$group_by_index]['cascades'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_results = $this->arrayGroupBy($results, 'is_new');
    $new_results = $this->arrayCount($new_results);
    $default_results['No. of New & Relapsed TB Cases'] = (isset($new_results['1']) ? $new_results['1'] : 0);

    $known_status_results = $this->arrayGroupBy($results, 'is_known_hiv_status');
    $known_status_results = $this->arrayCount($known_status_results);
    $default_results['No. with known HIV status'] = (isset($known_status_results['1']) ? $known_status_results['1'] : 0);

    $new_ipt_results = $this->arrayGroupBy($results, 'is_kp');
    $new_ipt_results = $this->arrayCount($new_ipt_results);
    $default_results['KPs'] = (isset($new_ipt_results['1']) ? $new_ipt_results['1'] : 0);

    $new_tested_results = $this->arrayGroupBy($results, 'is_new_tested');
    $new_tested_results = $this->arrayCount($new_tested_results);
    $default_results['No. Newly Tested'] = (isset($new_tested_results['1']) ? $new_tested_results['1'] : 0);

    $new_positive_results = $this->arrayGroupBy($results, 'is_new_positive');
    $new_positive_results = $this->arrayCount($new_positive_results);
    $default_results['Newly Tested HIV+'] = (isset($new_positive_results['1']) ? $new_positive_results['1'] : 0);

    $positive_results = $this->arrayGroupBy($results, 'is_positive');
    $positive_results = $this->arrayCount($positive_results);
    $default_results['Total HIV+'] = (isset($positive_results['1']) ? $positive_results['1'] : 0);

    $on_haart_results = $this->arrayGroupBy($results, 'is_on_haart');
    $on_haart_results = $this->arrayCount($on_haart_results);
    $default_results['Total on HAART'] = (isset($on_haart_results['1']) ? $on_haart_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getTbCascadesAdultsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_adult' => [true]
    ];

    $default_results = $this->default_results[$group_by_index]['cascades'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_results = $this->arrayGroupBy($results, 'is_new');
    $new_results = $this->arrayCount($new_results);
    $default_results['No. of New & Relapsed TB Cases'] = (isset($new_results['1']) ? $new_results['1'] : 0);

    $known_status_results = $this->arrayGroupBy($results, 'is_known_hiv_status');
    $known_status_results = $this->arrayCount($known_status_results);
    $default_results['No. with known HIV status'] = (isset($known_status_results['1']) ? $known_status_results['1'] : 0);

    $new_ipt_results = $this->arrayGroupBy($results, 'is_kp');
    $new_ipt_results = $this->arrayCount($new_ipt_results);
    $default_results['KPs'] = (isset($new_ipt_results['1']) ? $new_ipt_results['1'] : 0);

    $new_tested_results = $this->arrayGroupBy($results, 'is_new_tested');
    $new_tested_results = $this->arrayCount($new_tested_results);
    $default_results['No. Newly Tested'] = (isset($new_tested_results['1']) ? $new_tested_results['1'] : 0);

    $new_positive_results = $this->arrayGroupBy($results, 'is_new_positive');
    $new_positive_results = $this->arrayCount($new_positive_results);
    $default_results['Newly Tested HIV+'] = (isset($new_positive_results['1']) ? $new_positive_results['1'] : 0);

    $positive_results = $this->arrayGroupBy($results, 'is_positive');
    $positive_results = $this->arrayCount($positive_results);
    $default_results['Total HIV+'] = (isset($positive_results['1']) ? $positive_results['1'] : 0);

    $on_haart_results = $this->arrayGroupBy($results, 'is_on_haart');
    $on_haart_results = $this->arrayCount($on_haart_results);
    $default_results['Total on HAART'] = (isset($on_haart_results['1']) ? $on_haart_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getTbCascadesFemalesByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'gender' => ['F']
    ];

    $default_results = $this->default_results[$group_by_index]['cascades'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_results = $this->arrayGroupBy($results, 'is_new');
    $new_results = $this->arrayCount($new_results);
    $default_results['No. of New & Relapsed TB Cases'] = (isset($new_results['1']) ? $new_results['1'] : 0);

    $known_status_results = $this->arrayGroupBy($results, 'is_known_hiv_status');
    $known_status_results = $this->arrayCount($known_status_results);
    $default_results['No. with known HIV status'] = (isset($known_status_results['1']) ? $known_status_results['1'] : 0);

    $new_ipt_results = $this->arrayGroupBy($results, 'is_kp');
    $new_ipt_results = $this->arrayCount($new_ipt_results);
    $default_results['KPs'] = (isset($new_ipt_results['1']) ? $new_ipt_results['1'] : 0);

    $new_tested_results = $this->arrayGroupBy($results, 'is_new_tested');
    $new_tested_results = $this->arrayCount($new_tested_results);
    $default_results['No. Newly Tested'] = (isset($new_tested_results['1']) ? $new_tested_results['1'] : 0);

    $new_positive_results = $this->arrayGroupBy($results, 'is_new_positive');
    $new_positive_results = $this->arrayCount($new_positive_results);
    $default_results['Newly Tested HIV+'] = (isset($new_positive_results['1']) ? $new_positive_results['1'] : 0);

    $positive_results = $this->arrayGroupBy($results, 'is_positive');
    $positive_results = $this->arrayCount($positive_results);
    $default_results['Total HIV+'] = (isset($positive_results['1']) ? $positive_results['1'] : 0);

    $on_haart_results = $this->arrayGroupBy($results, 'is_on_haart');
    $on_haart_results = $this->arrayCount($on_haart_results);
    $default_results['Total on HAART'] = (isset($on_haart_results['1']) ? $on_haart_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getTbCascadesMalesByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'gender' => ['M']
    ];

    $default_results = $this->default_results[$group_by_index]['cascades'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_results = $this->arrayGroupBy($results, 'is_new');
    $new_results = $this->arrayCount($new_results);
    $default_results['No. of New & Relapsed TB Cases'] = (isset($new_results['1']) ? $new_results['1'] : 0);

    $known_status_results = $this->arrayGroupBy($results, 'is_known_hiv_status');
    $known_status_results = $this->arrayCount($known_status_results);
    $default_results['No. with known HIV status'] = (isset($known_status_results['1']) ? $known_status_results['1'] : 0);

    $new_ipt_results = $this->arrayGroupBy($results, 'is_kp');
    $new_ipt_results = $this->arrayCount($new_ipt_results);
    $default_results['KPs'] = (isset($new_ipt_results['1']) ? $new_ipt_results['1'] : 0);

    $new_tested_results = $this->arrayGroupBy($results, 'is_new_tested');
    $new_tested_results = $this->arrayCount($new_tested_results);
    $default_results['No. Newly Tested'] = (isset($new_tested_results['1']) ? $new_tested_results['1'] : 0);

    $new_positive_results = $this->arrayGroupBy($results, 'is_new_positive');
    $new_positive_results = $this->arrayCount($new_positive_results);
    $default_results['Newly Tested HIV+'] = (isset($new_positive_results['1']) ? $new_positive_results['1'] : 0);

    $positive_results = $this->arrayGroupBy($results, 'is_positive');
    $positive_results = $this->arrayCount($positive_results);
    $default_results['Total HIV+'] = (isset($positive_results['1']) ? $positive_results['1'] : 0);

    $on_haart_results = $this->arrayGroupBy($results, 'is_on_haart');
    $on_haart_results = $this->arrayCount($on_haart_results);
    $default_results['Total on HAART'] = (isset($on_haart_results['1']) ? $on_haart_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getTbTotalsOutcomesByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $default_results = $this->default_results[$group_by_index]['outcomes'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $has_tb_results = $this->arrayGroupBy($results, 'has_tb');
    $has_tb_results = $this->arrayCount($has_tb_results);
    $default_results['Total in Cohort [TB/HIV+]'] = (isset($has_tb_results['1']) ? $has_tb_results['1'] : 0);

    $default_results['Total with TB Outcomes'] = sizeof($results);

    $outcome_results = $this->arrayGroupBy($results, 'treatment_outcome');
    $outcome_results = $this->arrayCount($outcome_results);

    $default_results['Cured'] = (isset($outcome_results['Cured']) ? $outcome_results['Cured'] : 0);
    $default_results['Treatment Complete'] = (isset($outcome_results['Treatment Complete']) ? $outcome_results['Treatment Complete'] : 0);
    $default_results['Treatment Failure'] = (isset($outcome_results['Treatment Failure']) ? $outcome_results['Treatment Failure'] : 0);
    $default_results['Died'] = (isset($outcome_results['Died']) ? $outcome_results['Died'] : 0);
    $default_results['LTFU'] = (isset($outcome_results['LTFU']) ? $outcome_results['LTFU'] : 0);
    $default_results['Not Evaluated (TO)'] = (isset($outcome_results['Not Evaluated (TO)']) ? $outcome_results['Not Evaluated (TO)'] : 0);

    return response()->json($default_results);
  }

  public function getTbChildrenOutcomesByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_child' => [true]
    ];

    $default_results = $this->default_results[$group_by_index]['outcomes'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $has_tb_results = $this->arrayGroupBy($results, 'has_tb');
    $has_tb_results = $this->arrayCount($has_tb_results);
    $default_results['Total in Cohort [TB/HIV+]'] = (isset($has_tb_results['1']) ? $has_tb_results['1'] : 0);

    $default_results['Total with TB Outcomes'] = sizeof($results);

    $outcome_results = $this->arrayGroupBy($results, 'treatment_outcome');
    $outcome_results = $this->arrayCount($outcome_results);

    $default_results['Cured'] = (isset($outcome_results['Cured']) ? $outcome_results['Cured'] : 0);
    $default_results['Treatment Complete'] = (isset($outcome_results['Treatment Complete']) ? $outcome_results['Treatment Complete'] : 0);
    $default_results['Treatment Failure'] = (isset($outcome_results['Treatment Failure']) ? $outcome_results['Treatment Failure'] : 0);
    $default_results['Died'] = (isset($outcome_results['Died']) ? $outcome_results['Died'] : 0);
    $default_results['LTFU'] = (isset($outcome_results['LTFU']) ? $outcome_results['LTFU'] : 0);
    $default_results['Not Evaluated (TO)'] = (isset($outcome_results['Not Evaluated (TO)']) ? $outcome_results['Not Evaluated (TO)'] : 0);

    return response()->json($default_results);
  }

  public function getTbAdultsOutcomesByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_adult' => [true]
    ];

    $default_results = $this->default_results[$group_by_index]['outcomes'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $has_tb_results = $this->arrayGroupBy($results, 'has_tb');
    $has_tb_results = $this->arrayCount($has_tb_results);
    $default_results['Total in Cohort [TB/HIV+]'] = (isset($has_tb_results['1']) ? $has_tb_results['1'] : 0);

    $default_results['Total with TB Outcomes'] = sizeof($results);

    $outcome_results = $this->arrayGroupBy($results, 'treatment_outcome');
    $outcome_results = $this->arrayCount($outcome_results);

    $default_results['Cured'] = (isset($outcome_results['Cured']) ? $outcome_results['Cured'] : 0);
    $default_results['Treatment Complete'] = (isset($outcome_results['Treatment Complete']) ? $outcome_results['Treatment Complete'] : 0);
    $default_results['Treatment Failure'] = (isset($outcome_results['Treatment Failure']) ? $outcome_results['Treatment Failure'] : 0);
    $default_results['Died'] = (isset($outcome_results['Died']) ? $outcome_results['Died'] : 0);
    $default_results['LTFU'] = (isset($outcome_results['LTFU']) ? $outcome_results['LTFU'] : 0);
    $default_results['Not Evaluated (TO)'] = (isset($outcome_results['Not Evaluated (TO)']) ? $outcome_results['Not Evaluated (TO)'] : 0);

    return response()->json($default_results);
  }

  public function getTbFemalesOutcomesByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'gender' => ['F']
    ];

    $default_results = $this->default_results[$group_by_index]['outcomes'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $has_tb_results = $this->arrayGroupBy($results, 'has_tb');
    $has_tb_results = $this->arrayCount($has_tb_results);
    $default_results['Total in Cohort [TB/HIV+]'] = (isset($has_tb_results['1']) ? $has_tb_results['1'] : 0);

    $default_results['Total with TB Outcomes'] = sizeof($results);

    $outcome_results = $this->arrayGroupBy($results, 'treatment_outcome');
    $outcome_results = $this->arrayCount($outcome_results);

    $default_results['Cured'] = (isset($outcome_results['Cured']) ? $outcome_results['Cured'] : 0);
    $default_results['Treatment Complete'] = (isset($outcome_results['Treatment Complete']) ? $outcome_results['Treatment Complete'] : 0);
    $default_results['Treatment Failure'] = (isset($outcome_results['Treatment Failure']) ? $outcome_results['Treatment Failure'] : 0);
    $default_results['Died'] = (isset($outcome_results['Died']) ? $outcome_results['Died'] : 0);
    $default_results['LTFU'] = (isset($outcome_results['LTFU']) ? $outcome_results['LTFU'] : 0);
    $default_results['Not Evaluated (TO)'] = (isset($outcome_results['Not Evaluated (TO)']) ? $outcome_results['Not Evaluated (TO)'] : 0);

    return response()->json($default_results);
  }

  public function getTbMalesOutcomesByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'gender' => ['M']
    ];

    $default_results = $this->default_results[$group_by_index]['outcomes'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $has_tb_results = $this->arrayGroupBy($results, 'has_tb');
    $has_tb_results = $this->arrayCount($has_tb_results);
    $default_results['Total in Cohort [TB/HIV+]'] = (isset($has_tb_results['1']) ? $has_tb_results['1'] : 0);

    $default_results['Total with TB Outcomes'] = sizeof($results);

    $outcome_results = $this->arrayGroupBy($results, 'treatment_outcome');
    $outcome_results = $this->arrayCount($outcome_results);

    $default_results['Cured'] = (isset($outcome_results['Cured']) ? $outcome_results['Cured'] : 0);
    $default_results['Treatment Complete'] = (isset($outcome_results['Treatment Complete']) ? $outcome_results['Treatment Complete'] : 0);
    $default_results['Treatment Failure'] = (isset($outcome_results['Treatment Failure']) ? $outcome_results['Treatment Failure'] : 0);
    $default_results['Died'] = (isset($outcome_results['Died']) ? $outcome_results['Died'] : 0);
    $default_results['LTFU'] = (isset($outcome_results['LTFU']) ? $outcome_results['LTFU'] : 0);
    $default_results['Not Evaluated (TO)'] = (isset($outcome_results['Not Evaluated (TO)']) ? $outcome_results['Not Evaluated (TO)'] : 0);

    return response()->json($default_results);
  }

  public function getTbPreventionChildrenByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_child' => [true]
    ];

    $default_results = $this->default_results[$group_by_index]['prevention'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $on_haart_results = $this->arrayGroupBy($results, 'is_on_haart');
    $on_haart_results = $this->arrayCount($on_haart_results);
    $default_results['Current on ART'] = (isset($on_haart_results['1']) ? $on_haart_results['1'] : 0);

    $screened_results = $this->arrayGroupBy($results, 'is_screened');
    $screened_results = $this->arrayCount($screened_results);
    $default_results['Screened for TB'] = (isset($screened_results['1']) ? $screened_results['1'] : 0);

    $positive_results = $this->arrayGroupBy($results, 'is_positive');
    $positive_results = $this->arrayCount($positive_results);
    $default_results['Screened Negative'] = (isset($positive_results['0']) ? $positive_results['0'] : 0);

    $tb_status_results = $this->arrayGroupBy($results, 'tb_status');
    $tb_status_results = $this->arrayCount($tb_status_results);
    $default_results['Expected to Complete IPT'] = (isset($tb_status_results['Expected to Complete IPT']) ? $tb_status_results['Expected to Complete IPT'] : 0);
    $default_results['Complete IPT'] = (isset($tb_status_results['Complete IPT']) ? $tb_status_results['Complete IPT'] : 0);

    return response()->json($default_results);
  }

  public function getTbPreventionAdultsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_adult' => [true]
    ];

    $default_results = $this->default_results[$group_by_index]['prevention'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $on_haart_results = $this->arrayGroupBy($results, 'is_on_haart');
    $on_haart_results = $this->arrayCount($on_haart_results);
    $default_results['Current on ART'] = (isset($on_haart_results['1']) ? $on_haart_results['1'] : 0);

    $screened_results = $this->arrayGroupBy($results, 'is_screened');
    $screened_results = $this->arrayCount($screened_results);
    $default_results['Screened for TB'] = (isset($screened_results['1']) ? $screened_results['1'] : 0);

    $positive_results = $this->arrayGroupBy($results, 'is_positive');
    $positive_results = $this->arrayCount($positive_results);
    $default_results['Screened Negative'] = (isset($positive_results['0']) ? $positive_results['0'] : 0);

    $tb_status_results = $this->arrayGroupBy($results, 'tb_status');
    $tb_status_results = $this->arrayCount($tb_status_results);
    $default_results['Expected to Complete IPT'] = (isset($tb_status_results['Expected to Complete IPT']) ? $tb_status_results['Expected to Complete IPT'] : 0);
    $default_results['Complete IPT'] = (isset($tb_status_results['Complete IPT']) ? $tb_status_results['Complete IPT'] : 0);

    return response()->json($default_results);
  }

  public function getTbPreventionTotalsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $default_results = $this->default_results[$group_by_index]['prevention'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $on_haart_results = $this->arrayGroupBy($results, 'is_on_haart');
    $on_haart_results = $this->arrayCount($on_haart_results);
    $default_results['Current on ART'] = (isset($on_haart_results['1']) ? $on_haart_results['1'] : 0);

    $screened_results = $this->arrayGroupBy($results, 'is_screened');
    $screened_results = $this->arrayCount($screened_results);
    $default_results['Screened for TB'] = (isset($screened_results['1']) ? $screened_results['1'] : 0);

    $positive_results = $this->arrayGroupBy($results, 'is_positive');
    $positive_results = $this->arrayCount($positive_results);
    $default_results['Screened Negative'] = (isset($positive_results['0']) ? $positive_results['0'] : 0);

    $tb_status_results = $this->arrayGroupBy($results, 'tb_status');
    $tb_status_results = $this->arrayCount($tb_status_results);
    $default_results['Expected to Complete IPT'] = (isset($tb_status_results['Expected to Complete IPT']) ? $tb_status_results['Expected to Complete IPT'] : 0);
    $default_results['Complete IPT'] = (isset($tb_status_results['Complete IPT']) ? $tb_status_results['Complete IPT'] : 0);

    return response()->json($default_results);
  }

  public function getTbTreatmentChildrenByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_child' => [true]
    ];

    $default_results = $this->default_results[$group_by_index]['prevention'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $on_haart_results = $this->arrayGroupBy($results, 'is_on_haart');
    $on_haart_results = $this->arrayCount($on_haart_results);
    $default_results['Current on ART'] = (isset($on_haart_results['1']) ? $on_haart_results['1'] : 0);

    $screened_results = $this->arrayGroupBy($results, 'is_screened');
    $screened_results = $this->arrayCount($screened_results);
    $default_results['Screened for TB'] = (isset($screened_results['1']) ? $screened_results['1'] : 0);

    $positive_results = $this->arrayGroupBy($results, 'is_positive');
    $positive_results = $this->arrayCount($positive_results);
    $default_results['Screened Positive'] = (isset($positive_results['1']) ? $positive_results['1'] : 0);

    $default_results['Specimen sent for Bacteriologic Diagnosis'] = $default_results['Screened for TB'];

    $diagnosed_results = $this->arrayGroupBy($results, 'is_diagnosed');
    $diagnosed_results = $this->arrayCount($diagnosed_results);
    $default_results['Diagnosis with TB'] = (isset($diagnosed_results['Complete IPT']) ? $diagnosed_results['Complete IPT'] : 0);

    $treatment_start_results = $this->arrayGroupBy($results, 'start_tb_treatment_date');
    $treatment_start_results = $this->arrayCount($treatment_start_results);
    $default_results['Started on TB Treatment'] = (isset($treatment_start_results['start_tb_treatment_date']) ? $treatment_start_results['start_tb_treatment_date'] : 0);

    return response()->json($default_results);
  }

  public function getTbTreatmentAdultsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_adult' => [true]
    ];

    $default_results = $this->default_results[$group_by_index]['prevention'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $on_haart_results = $this->arrayGroupBy($results, 'is_on_haart');
    $on_haart_results = $this->arrayCount($on_haart_results);
    $default_results['Current on ART'] = (isset($on_haart_results['1']) ? $on_haart_results['1'] : 0);

    $screened_results = $this->arrayGroupBy($results, 'is_screened');
    $screened_results = $this->arrayCount($screened_results);
    $default_results['Screened for TB'] = (isset($screened_results['1']) ? $screened_results['1'] : 0);

    $positive_results = $this->arrayGroupBy($results, 'is_positive');
    $positive_results = $this->arrayCount($positive_results);
    $default_results['Screened Positive'] = (isset($positive_results['1']) ? $positive_results['1'] : 0);

    $default_results['Specimen sent for Bacteriologic Diagnosis'] = $default_results['Screened for TB'];

    $diagnosed_results = $this->arrayGroupBy($results, 'is_diagnosed');
    $diagnosed_results = $this->arrayCount($diagnosed_results);
    $default_results['Diagnosis with TB'] = (isset($diagnosed_results['Complete IPT']) ? $diagnosed_results['Complete IPT'] : 0);

    $treatment_start_results = $this->arrayGroupBy($results, 'start_tb_treatment_date');
    $treatment_start_results = $this->arrayCount($treatment_start_results);
    $default_results['Started on TB Treatment'] = (isset($treatment_start_results['start_tb_treatment_date']) ? $treatment_start_results['start_tb_treatment_date'] : 0);

    return response()->json($default_results);
  }

  public function getTbTreatmentTotalsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $default_results = $this->default_results[$group_by_index]['prevention'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $on_haart_results = $this->arrayGroupBy($results, 'is_on_haart');
    $on_haart_results = $this->arrayCount($on_haart_results);
    $default_results['Current on ART'] = (isset($on_haart_results['1']) ? $on_haart_results['1'] : 0);

    $screened_results = $this->arrayGroupBy($results, 'is_screened');
    $screened_results = $this->arrayCount($screened_results);
    $default_results['Screened for TB'] = (isset($screened_results['1']) ? $screened_results['1'] : 0);

    $positive_results = $this->arrayGroupBy($results, 'is_positive');
    $positive_results = $this->arrayCount($positive_results);
    $default_results['Screened Positive'] = (isset($positive_results['1']) ? $positive_results['1'] : 0);

    $default_results['Specimen sent for Bacteriologic Diagnosis'] = $default_results['Screened for TB'];

    $diagnosed_results = $this->arrayGroupBy($results, 'is_diagnosed');
    $diagnosed_results = $this->arrayCount($diagnosed_results);
    $default_results['Diagnosis with TB'] = (isset($diagnosed_results['Complete IPT']) ? $diagnosed_results['Complete IPT'] : 0);

    $treatment_start_results = $this->arrayGroupBy($results, 'start_tb_treatment_date');
    $treatment_start_results = $this->arrayCount($treatment_start_results);
    $default_results['Started on TB Treatment'] = (isset($treatment_start_results['start_tb_treatment_date']) ? $treatment_start_results['start_tb_treatment_date'] : 0);

    return response()->json($default_results);
  }

  public function getTbBacteriologicDiagnosisChildrenByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_child' => [true]
    ];

    $default_results = $this->default_results[$group_by_index]['prevention'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $genexpert_results = $this->arrayGroupBy($results, 'is_genexpert');
    $genexpert_results = $this->arrayCount($genexpert_results);
    $default_results['GeneXpert'] = (isset($genexpert_results['1']) ? $genexpert_results['1'] : 0);

    $chestxray_results = $this->arrayGroupBy($results, 'is_chest_xray');
    $chestxray_results = $this->arrayCount($chestxray_results);
    $default_results['Chest Xray'] = (isset($chestxray_results['1']) ? $chestxray_results['1'] : 0);

    $smear_results = $this->arrayGroupBy($results, 'is_smear_microscopy');
    $smear_results = $this->arrayCount($smear_results);
    $default_results['Smear Microscopy'] = (isset($smear_results['1']) ? $smear_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getTbBacteriologicDiagnosisAdultsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_adult' => [true]
    ];

    $default_results = $this->default_results[$group_by_index]['prevention'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $genexpert_results = $this->arrayGroupBy($results, 'is_genexpert');
    $genexpert_results = $this->arrayCount($genexpert_results);
    $default_results['GeneXpert'] = (isset($genexpert_results['1']) ? $genexpert_results['1'] : 0);

    $chestxray_results = $this->arrayGroupBy($results, 'is_chest_xray');
    $chestxray_results = $this->arrayCount($chestxray_results);
    $default_results['Chest Xray'] = (isset($chestxray_results['1']) ? $chestxray_results['1'] : 0);

    $smear_results = $this->arrayGroupBy($results, 'is_smear_microscopy');
    $smear_results = $this->arrayCount($smear_results);
    $default_results['Smear Microscopy'] = (isset($smear_results['1']) ? $smear_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getTbBacteriologicDiagnosisTotalsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $default_results = $this->default_results[$group_by_index]['prevention'];

    $results = Tb::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $genexpert_results = $this->arrayGroupBy($results, 'is_genexpert');
    $genexpert_results = $this->arrayCount($genexpert_results);
    $default_results['GeneXpert'] = (isset($genexpert_results['1']) ? $genexpert_results['1'] : 0);

    $chestxray_results = $this->arrayGroupBy($results, 'is_chest_xray');
    $chestxray_results = $this->arrayCount($chestxray_results);
    $default_results['Chest Xray'] = (isset($chestxray_results['1']) ? $chestxray_results['1'] : 0);

    $smear_results = $this->arrayGroupBy($results, 'is_smear_microscopy');
    $smear_results = $this->arrayCount($smear_results);
    $default_results['Smear Microscopy'] = (isset($smear_results['1']) ? $smear_results['1'] : 0);

    return response()->json($default_results);
  }
}
