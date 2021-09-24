<?php

namespace App\Http\Controllers\Api;

use App\Models\Hei;
use App\Models\Mch;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;

class PmtctController extends BaseController
{

  protected $default_results, $default_configs;

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
            'No. of New Preg Women [ANC]' => 0,
            'No. with known HIV Status' => 0,
            'KPs' => 0,
            'No. of Newly Tested' => 0,
            'Newly Tested HIV+' => 0,
            'Total HIV+' => 0,
            'Total on HAART' => 0,
          ],
          'pmtct_infants_cascades' => [
            'No. of New Preg Women [ANC]' => 0,
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
            'Samples collected by age (0 - <=2months)' => 0,
            'Positive by age (0 - <= 2 months)' => 0,
            'Positive, confirmed initated ART by age (0 - <= 2 months)' => 0,
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

  public function getPmtctCascades10to14ByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'age_group_large' => ['10-14 yrs']
    ];

    $default_results = $this->default_results[$group_by_index]['pmtct_cascades'];

    $results = Mch::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_preg_results = $this->arrayGroupBy($results, 'is_new_pregnant');
    $new_preg_results = $this->arrayCount($new_preg_results);
    $default_results['No. of New Preg Women [ANC]'] = (isset($new_preg_results['1']) ? $new_preg_results['1'] : 0);

    $known_status_results = $this->arrayGroupBy($results, 'is_known_status');
    $known_status_results = $this->arrayCount($known_status_results);
    $default_results['No. with known HIV Status'] = (isset($known_status_results['1']) ? $known_status_results['1'] : 0);

    $kp_results = $this->arrayGroupBy($results, 'is_kp');
    $kp_results = $this->arrayCount($kp_results);
    $default_results['KPs'] = (isset($kp_results['1']) ? $kp_results['1'] : 0);

    $new_tested_results = $this->arrayGroupBy($results, 'is_new_tested');
    $new_tested_results = $this->arrayCount($new_tested_results);
    $default_results['No. of Newly Tested'] = (isset($new_tested_results['Complete IPT']) ? $new_tested_results['Complete IPT'] : 0);

    $tested_positive_results = $this->arrayGroupBy($results, 'is_tested_positive');
    $tested_positive_results = $this->arrayCount($tested_positive_results);
    $default_results['Newly Tested HIV+'] = (isset($tested_positive_results['start_tb_treatment_date']) ? $tested_positive_results['start_tb_treatment_date'] : 0);

    $total_positive_results = $this->arrayGroupBy($results, 'current_status');
    $total_positive_results = $this->arrayCount($total_positive_results);
    $default_results['Total HIV+'] = (isset($total_positive_results['active']) ? $total_positive_results['active'] : 0);

    $default_results['Total on HAART'] = $default_results['Total HIV+'];

    return response()->json($default_results);
  }

  public function getPmtctCascades15to19ByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'age_group_large' => ['15-19 yrs']
    ];

    $default_results = $this->default_results[$group_by_index]['pmtct_cascades'];

    $results = Mch::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_preg_results = $this->arrayGroupBy($results, 'is_new_pregnant');
    $new_preg_results = $this->arrayCount($new_preg_results);
    $default_results['No. of New Preg Women [ANC]'] = (isset($new_preg_results['1']) ? $new_preg_results['1'] : 0);

    $known_status_results = $this->arrayGroupBy($results, 'is_known_status');
    $known_status_results = $this->arrayCount($known_status_results);
    $default_results['No. with known HIV Status'] = (isset($known_status_results['1']) ? $known_status_results['1'] : 0);

    $kp_results = $this->arrayGroupBy($results, 'is_kp');
    $kp_results = $this->arrayCount($kp_results);
    $default_results['KPs'] = (isset($kp_results['1']) ? $kp_results['1'] : 0);

    $new_tested_results = $this->arrayGroupBy($results, 'is_new_tested');
    $new_tested_results = $this->arrayCount($new_tested_results);
    $default_results['No. of Newly Tested'] = (isset($new_tested_results['Complete IPT']) ? $new_tested_results['Complete IPT'] : 0);

    $tested_positive_results = $this->arrayGroupBy($results, 'is_tested_positive');
    $tested_positive_results = $this->arrayCount($tested_positive_results);
    $default_results['Newly Tested HIV+'] = (isset($tested_positive_results['start_tb_treatment_date']) ? $tested_positive_results['start_tb_treatment_date'] : 0);

    $total_positive_results = $this->arrayGroupBy($results, 'current_status');
    $total_positive_results = $this->arrayCount($total_positive_results);
    $default_results['Total HIV+'] = (isset($total_positive_results['active']) ? $total_positive_results['active'] : 0);

    $default_results['Total on HAART'] = $default_results['Total HIV+'];

    return response()->json($default_results);
  }

  public function getPmtctCascades20to24ByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'age_group_large' => ['20-24 yrs']
    ];

    $default_results = $this->default_results[$group_by_index]['pmtct_cascades'];

    $results = Mch::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_preg_results = $this->arrayGroupBy($results, 'is_new_pregnant');
    $new_preg_results = $this->arrayCount($new_preg_results);
    $default_results['No. of New Preg Women [ANC]'] = (isset($new_preg_results['1']) ? $new_preg_results['1'] : 0);

    $known_status_results = $this->arrayGroupBy($results, 'is_known_status');
    $known_status_results = $this->arrayCount($known_status_results);
    $default_results['No. with known HIV Status'] = (isset($known_status_results['1']) ? $known_status_results['1'] : 0);

    $kp_results = $this->arrayGroupBy($results, 'is_kp');
    $kp_results = $this->arrayCount($kp_results);
    $default_results['KPs'] = (isset($kp_results['1']) ? $kp_results['1'] : 0);

    $new_tested_results = $this->arrayGroupBy($results, 'is_new_tested');
    $new_tested_results = $this->arrayCount($new_tested_results);
    $default_results['No. of Newly Tested'] = (isset($new_tested_results['Complete IPT']) ? $new_tested_results['Complete IPT'] : 0);

    $tested_positive_results = $this->arrayGroupBy($results, 'is_tested_positive');
    $tested_positive_results = $this->arrayCount($tested_positive_results);
    $default_results['Newly Tested HIV+'] = (isset($tested_positive_results['start_tb_treatment_date']) ? $tested_positive_results['start_tb_treatment_date'] : 0);

    $total_positive_results = $this->arrayGroupBy($results, 'current_status');
    $total_positive_results = $this->arrayCount($total_positive_results);
    $default_results['Total HIV+'] = (isset($total_positive_results['active']) ? $total_positive_results['active'] : 0);

    $default_results['Total on HAART'] = $default_results['Total HIV+'];

    return response()->json($default_results);
  }

  public function getPmtctCascades15to24ByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'age_group' => ['15 - 24 yrs (Youths)']
    ];

    $default_results = $this->default_results[$group_by_index]['pmtct_cascades'];

    $results = Mch::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_preg_results = $this->arrayGroupBy($results, 'is_new_pregnant');
    $new_preg_results = $this->arrayCount($new_preg_results);
    $default_results['No. of New Preg Women [ANC]'] = (isset($new_preg_results['1']) ? $new_preg_results['1'] : 0);

    $known_status_results = $this->arrayGroupBy($results, 'is_known_status');
    $known_status_results = $this->arrayCount($known_status_results);
    $default_results['No. with known HIV Status'] = (isset($known_status_results['1']) ? $known_status_results['1'] : 0);

    $kp_results = $this->arrayGroupBy($results, 'is_kp');
    $kp_results = $this->arrayCount($kp_results);
    $default_results['KPs'] = (isset($kp_results['1']) ? $kp_results['1'] : 0);

    $new_tested_results = $this->arrayGroupBy($results, 'is_new_tested');
    $new_tested_results = $this->arrayCount($new_tested_results);
    $default_results['No. of Newly Tested'] = (isset($new_tested_results['Complete IPT']) ? $new_tested_results['Complete IPT'] : 0);

    $tested_positive_results = $this->arrayGroupBy($results, 'is_tested_positive');
    $tested_positive_results = $this->arrayCount($tested_positive_results);
    $default_results['Newly Tested HIV+'] = (isset($tested_positive_results['start_tb_treatment_date']) ? $tested_positive_results['start_tb_treatment_date'] : 0);

    $total_positive_results = $this->arrayGroupBy($results, 'current_status');
    $total_positive_results = $this->arrayCount($total_positive_results);
    $default_results['Total HIV+'] = (isset($total_positive_results['active']) ? $total_positive_results['active'] : 0);

    $default_results['Total on HAART'] = $default_results['Total HIV+'];

    return response()->json($default_results);
  }

  public function getPmtctCascadesOver25ByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'age_group' => ['25+ yrs (Adults)']
    ];

    $default_results = $this->default_results[$group_by_index]['pmtct_cascades'];

    $results = Mch::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_preg_results = $this->arrayGroupBy($results, 'is_new_pregnant');
    $new_preg_results = $this->arrayCount($new_preg_results);
    $default_results['No. of New Preg Women [ANC]'] = (isset($new_preg_results['1']) ? $new_preg_results['1'] : 0);

    $known_status_results = $this->arrayGroupBy($results, 'is_known_status');
    $known_status_results = $this->arrayCount($known_status_results);
    $default_results['No. with known HIV Status'] = (isset($known_status_results['1']) ? $known_status_results['1'] : 0);

    $kp_results = $this->arrayGroupBy($results, 'is_kp');
    $kp_results = $this->arrayCount($kp_results);
    $default_results['KPs'] = (isset($kp_results['1']) ? $kp_results['1'] : 0);

    $new_tested_results = $this->arrayGroupBy($results, 'is_new_tested');
    $new_tested_results = $this->arrayCount($new_tested_results);
    $default_results['No. of Newly Tested'] = (isset($new_tested_results['Complete IPT']) ? $new_tested_results['Complete IPT'] : 0);

    $tested_positive_results = $this->arrayGroupBy($results, 'is_tested_positive');
    $tested_positive_results = $this->arrayCount($tested_positive_results);
    $default_results['Newly Tested HIV+'] = (isset($tested_positive_results['start_tb_treatment_date']) ? $tested_positive_results['start_tb_treatment_date'] : 0);

    $total_positive_results = $this->arrayGroupBy($results, 'current_status');
    $total_positive_results = $this->arrayCount($total_positive_results);
    $default_results['Total HIV+'] = (isset($total_positive_results['active']) ? $total_positive_results['active'] : 0);

    $default_results['Total on HAART'] = $default_results['Total HIV+'];

    return response()->json($default_results);
  }

  public function getPmtctCascadesTotalsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $default_results = $this->default_results[$group_by_index]['pmtct_infants_cascades'];

    $results = Mch::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_preg_results = $this->arrayGroupBy($results, 'is_new_pregnant');
    $new_preg_results = $this->arrayCount($new_preg_results);
    $default_results['No. of New Preg Women [ANC]'] = (isset($new_preg_results['1']) ? $new_preg_results['1'] : 0);

    $known_status_results = $this->arrayGroupBy($results, 'is_known_status');
    $known_status_results = $this->arrayCount($known_status_results);
    $default_results['No. with known HIV Status'] = (isset($known_status_results['1']) ? $known_status_results['1'] : 0);

    $kp_results = $this->arrayGroupBy($results, 'is_kp');
    $kp_results = $this->arrayCount($kp_results);
    $default_results['KPs'] = (isset($kp_results['1']) ? $kp_results['1'] : 0);

    $new_tested_results = $this->arrayGroupBy($results, 'is_new_tested');
    $new_tested_results = $this->arrayCount($new_tested_results);
    $default_results['No. of Newly Tested'] = (isset($new_tested_results['Complete IPT']) ? $new_tested_results['Complete IPT'] : 0);

    $tested_positive_results = $this->arrayGroupBy($results, 'is_tested_positive');
    $tested_positive_results = $this->arrayCount($tested_positive_results);
    $default_results['Newly Tested HIV+'] = (isset($tested_positive_results['start_tb_treatment_date']) ? $tested_positive_results['start_tb_treatment_date'] : 0);

    $total_positive_results = $this->arrayGroupBy($results, 'current_status');
    $total_positive_results = $this->arrayCount($total_positive_results);
    $default_results['Total HIV+'] = (isset($total_positive_results['active']) ? $total_positive_results['active'] : 0);

    $default_results['Total on HAART'] = $default_results['Total HIV+'];

    $infant_results = $this->arrayGroupBy($results, 'is_infant');
    $infant_results = $this->arrayCount($infant_results);
    $default_results['Infants Issued ARV Prophylaxis'] = (isset($infant_results['1']) ? $infant_results['1'] : 0);

    return response()->json($default_results);
  }

  public function getPmtctCascades12MonthsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'eid_sample_collection_period' => ['0-12 Months']
    ];

    $default_results = $this->default_results[$group_by_index]['eid_cascades'];

    $results = Mch::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_tested_results = $this->arrayGroupBy($results, 'is_new_tested');
    $new_tested_results = $this->arrayCount($new_tested_results);
    $default_results['Samples collected by age (0 - <=12months)'] = (isset($new_tested_results['1']) ? $new_tested_results['1'] : 0);

    $tested_positive_results = $this->arrayGroupBy($results, 'is_tested_positive');
    $tested_positive_results = $this->arrayCount($tested_positive_results);
    $default_results['Positive by age (0 - <= 12 months)'] = (isset($tested_positive_results['1']) ? $tested_positive_results['1'] : 0);

    $current_status_results = $this->arrayGroupBy($results, 'current_status');
    $current_status_results = $this->arrayCount($current_status_results);
    $default_results['Positive, confirmed initated ART by age (0 - <= 12 months)'] = (isset($current_status_results['active']) ? $current_status_results['active'] : 0);

    return response()->json($default_results);
  }

  public function getPmtctCascadesAtSampleByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $two_month_filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'hei_sample_collection_period' => ['0-2 Months']
    ];
    $over_two_month_filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'hei_sample_collection_period' => ['2-12 Months']
    ];

    $default_results = $this->default_results[$group_by_index]['hei_cascades'];

    $results = Mch::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();

    $two_month_results = $this->arrayFilterBy($results, $two_month_filters);
    $over_two_month_results = $this->arrayFilterBy($results, $over_two_month_filters);

    $new_tested_results = $this->arrayGroupBy($two_month_results, 'is_new_tested');
    $new_tested_results = $this->arrayCount($new_tested_results);
    $default_results['Samples collected by age (0 - <=2months)'] = (isset($new_tested_results['1']) ? $new_tested_results['1'] : 0);

    $tested_positive_results = $this->arrayGroupBy($two_month_results, 'is_known_status');
    $tested_positive_results = $this->arrayCount($tested_positive_results);
    $default_results['Positive by age (0 - <= 2 months)'] = (isset($tested_positive_results['1']) ? $tested_positive_results['1'] : 0);

    $current_status_results = $this->arrayGroupBy($two_month_results, 'is_kp');
    $current_status_results = $this->arrayCount($current_status_results);
    $default_results['Positive, confirmed initated ART by age (0 - <= 2 months)'] = (isset($current_status_results['1']) ? $current_status_results['1'] : 0);

    $new_tested_results = $this->arrayGroupBy($over_two_month_results, 'is_new_tested');
    $new_tested_results = $this->arrayCount($new_tested_results);
    $default_results['Samples collected by age (2 - <=12months)'] = (isset($new_tested_results['Complete IPT']) ? $new_tested_results['Complete IPT'] : 0);

    $tested_positive_results = $this->arrayGroupBy($over_two_month_results, 'is_tested_positive');
    $tested_positive_results = $this->arrayCount($tested_positive_results);
    $default_results['Positive by age (2 - <= 12 months)'] = (isset($tested_positive_results['start_tb_treatment_date']) ? $tested_positive_results['start_tb_treatment_date'] : 0);

    $current_status_results = $this->arrayGroupBy($over_two_month_results, 'current_status');
    $current_status_results = $this->arrayCount($current_status_results);
    $default_results['Positive, confirmed initated ART by age (2 - <= 12 months)'] = (isset($current_status_results['active']) ? $current_status_results['active'] : 0);

    return response()->json($default_results);
  }

  public function getPmtctHca12MonthsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_adult' => [true]
    ];

    $default_results = $this->default_results[$group_by_index]['hca_cascades'];

    $results = Hei::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->whereRaw('datediff(?, visit_date) < ?', [$to, 366])->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $negative_results = $this->arrayGroupBy($results, 'is_negative');
    $negative_results = $this->arrayCount($negative_results);
    $default_results['HIV-ve in FollowUp'] = (isset($negative_results['1']) ? $negative_results['1'] : 0);

    $positive_results = $this->arrayGroupBy($results, 'is_positive');
    $positive_results = $this->arrayCount($positive_results);
    $default_results['HIV+ve'] = (isset($positive_results['1']) ? $positive_results['1'] : 0);

    $to_results = $this->arrayGroupBy($results, 'is_to');
    $to_results = $this->arrayCount($to_results);
    $default_results['To'] = (isset($to_results['1']) ? $to_results['1'] : 0);

    $ltfu_results = $this->arrayGroupBy($results, 'is_ltfu');
    $ltfu_results = $this->arrayCount($ltfu_results);
    $default_results['LTFU'] = (isset($ltfu_results['Complete IPT']) ? $ltfu_results['Complete IPT'] : 0);

    $dead_results = $this->arrayGroupBy($results, 'is_dead');
    $dead_results = $this->arrayCount($dead_results);
    $default_results['Dead'] = (isset($dead_results['start_tb_treatment_date']) ? $dead_results['start_tb_treatment_date'] : 0);

    return response()->json($default_results);
  }

  public function getPmtctHca24MonthsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_adult' => [true]
    ];

    $default_results = $this->default_results[$group_by_index]['hca_cascades'];

    $results = Hei::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->whereRaw('datediff(?, visit_date) < ?', [$to, 732])->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $negative_results = $this->arrayGroupBy($results, 'is_negative');
    $negative_results = $this->arrayCount($negative_results);
    $default_results['HIV-ve in FollowUp'] = (isset($negative_results['1']) ? $negative_results['1'] : 0);

    $positive_results = $this->arrayGroupBy($results, 'is_positive');
    $positive_results = $this->arrayCount($positive_results);
    $default_results['HIV+ve'] = (isset($positive_results['1']) ? $positive_results['1'] : 0);

    $to_results = $this->arrayGroupBy($results, 'is_to');
    $to_results = $this->arrayCount($to_results);
    $default_results['To'] = (isset($to_results['1']) ? $to_results['1'] : 0);

    $ltfu_results = $this->arrayGroupBy($results, 'is_ltfu');
    $ltfu_results = $this->arrayCount($ltfu_results);
    $default_results['LTFU'] = (isset($ltfu_results['Complete IPT']) ? $ltfu_results['Complete IPT'] : 0);

    $dead_results = $this->arrayGroupBy($results, 'is_dead');
    $dead_results = $this->arrayCount($dead_results);
    $default_results['Dead'] = (isset($dead_results['start_tb_treatment_date']) ? $dead_results['start_tb_treatment_date'] : 0);

    return response()->json($default_results);
  }

  public function getPmtctHcaDeadByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_dead' => [true],
      'is_know_status' => [true]
    ];

    $default_results = $this->default_results[$group_by_index]['hca_dead_outcomes'];

    $results = Hei::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $default_results['Dead [known HIV status]'] = sizeof($results);

    return response()->json($default_results);
  }
}
