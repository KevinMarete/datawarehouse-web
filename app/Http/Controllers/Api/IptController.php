<?php

namespace App\Http\Controllers\Api;

use App\Models\Ipt;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;

class IptController extends BaseController
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
          'ipt_new' => [
            'New on IPT' => 0,
            'New on IPT [Male]' => 0,
            'New on IPT [Female]' => 0,
          ],
          'ipt_current' => [
            'Current on ART' => 0,
            'Current on ART Ever on IPT' => 0,
          ],
          'ipt_completed_outcomes' => [
            'Expected to Complete IPT' => 0,
            'Completed IPT' => 0
          ],
          'ipt_not_completed_outcomes' => [
            'Not Completed' => 0,
            'Discontinued Developed TB' => 0,
            'LTFU' => 0,
            'To' => 0
          ]
        ],
        'gender' => [
          'F' => 0,
          'M' => 0
        ],
      ];
  }
  public function getIptNewChildrenByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_child' => [true]
    ];
    $default_results = $this->default_results[$group_by_index]['ipt_new'];

    $results = Ipt::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_ipt_results = $this->arrayGroupBy($results, 'is_new_ipt');
    $new_ipt_results = $this->arrayCount($new_ipt_results);
    $default_results['New on IPT'] = (isset($new_ipt_results['1']) ? $new_ipt_results['1'] : 0);

    $new_ipt_gender_results = $this->arrayGroupBy($results, 'gender');
    $new_ipt_gender_results = $this->arrayCount($new_ipt_gender_results);
    $default_results['New on IPT [Male]'] = (isset($new_ipt_gender_results['M']) ? $new_ipt_gender_results['M'] : 0);

    $default_results['New on IPT [Female]'] = (isset($new_ipt_gender_results['F']) ? $new_ipt_gender_results['F'] : 0);

    return response()->json($default_results);
  }

  public function getIptNewAdultsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_adult' => [true]
    ];
    $default_results = $this->default_results[$group_by_index]['ipt_new'];

    $results = Ipt::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_ipt_results = $this->arrayGroupBy($results, 'is_new_ipt');
    $new_ipt_results = $this->arrayCount($new_ipt_results);
    $default_results['New on IPT'] = (isset($new_ipt_results['1']) ? $new_ipt_results['1'] : 0);

    $new_ipt_gender_results = $this->arrayGroupBy($results, 'gender');
    $new_ipt_gender_results = $this->arrayCount($new_ipt_gender_results);
    $default_results['New on IPT [Male]'] = (isset($new_ipt_gender_results['M']) ? $new_ipt_gender_results['M'] : 0);

    $default_results['New on IPT [Female]'] = (isset($new_ipt_gender_results['F']) ? $new_ipt_gender_results['F'] : 0);

    return response()->json($default_results);
  }

  public function getIptNewTotalsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];
    $default_results = $this->default_results[$group_by_index]['ipt_new'];

    $results = Ipt::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $new_ipt_results = $this->arrayGroupBy($results, 'is_new_ipt');
    $new_ipt_results = $this->arrayCount($new_ipt_results);
    $default_results['New on IPT'] = (isset($new_ipt_results['1']) ? $new_ipt_results['1'] : 0);

    $new_ipt_gender_results = $this->arrayGroupBy($results, 'gender');
    $new_ipt_gender_results = $this->arrayCount($new_ipt_gender_results);
    $default_results['New on IPT [Male]'] = (isset($new_ipt_gender_results['M']) ? $new_ipt_gender_results['M'] : 0);

    $default_results['New on IPT [Female]'] = (isset($new_ipt_gender_results['F']) ? $new_ipt_gender_results['F'] : 0);

    return response()->json($default_results);
  }

  public function getIptCurrentChildrenByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_child' => [true]
    ];
    $default_results = $this->default_results[$group_by_index]['ipt_current'];

    $results = Ipt::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $default_results['Current on ART'] = sizeof($results);

    $current_ever_on_ipt_results = $this->arrayGroupBy($results, 'current_art_ever_on_ipt');
    $current_ever_on_ipt_results = $this->arrayCount($current_ever_on_ipt_results);
    $default_results['Current on ART Ever on IPT'] = (isset($current_ever_on_ipt_results[1]) ? $current_ever_on_ipt_results[1] : 0);

    return response()->json($default_results);
  }

  public function getIptCurrentAdultsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_adult' => [true]
    ];
    $default_results = $this->default_results[$group_by_index]['ipt_current'];

    $results = Ipt::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $default_results['Current on ART'] = sizeof($results);

    $current_ever_on_ipt_results = $this->arrayGroupBy($results, 'current_art_ever_on_ipt');
    $current_ever_on_ipt_results = $this->arrayCount($current_ever_on_ipt_results);
    $default_results['Current on ART Ever on IPT'] = (isset($current_ever_on_ipt_results[1]) ? $current_ever_on_ipt_results[1] : 0);

    return response()->json($default_results);
  }

  public function getIptCurrentTotalsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];
    $default_results = $this->default_results[$group_by_index]['ipt_current'];

    $results = Ipt::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $default_results['Current on ART'] = sizeof($results);

    $current_ever_on_ipt_results = $this->arrayGroupBy($results, 'current_art_ever_on_ipt');
    $current_ever_on_ipt_results = $this->arrayCount($current_ever_on_ipt_results);
    $default_results['Current on ART Ever on IPT'] = (isset($current_ever_on_ipt_results[1]) ? $current_ever_on_ipt_results[1] : 0);

    return response()->json($default_results);
  }

  public function getIptOutcomesTotalsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];
    $default_results = $this->default_results[$group_by_index]['ipt_completed_outcomes'];

    $results = Ipt::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $expected_complete_ipt_results = $this->arrayGroupBy($results, 'expected_to_complete_ipt');
    $expected_complete_ipt_results = $this->arrayCount($expected_complete_ipt_results);
    $default_results['Expected to Complete IPT'] = (isset($expected_complete_ipt_results[1]) ? $expected_complete_ipt_results[1] : 0);

    $completed_ipt_results = $this->arrayGroupBy($results, 'completed_ipt');
    $completed_ipt_results = $this->arrayCount($completed_ipt_results);
    $default_results['Completed IPT'] = (isset($completed_ipt_results[1]) ? $completed_ipt_results[1] : 0);

    return response()->json($default_results);
  }

  public function getIptNotCompletingTotalsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];
    $default_results = $this->default_results[$group_by_index]['ipt_not_completed_outcomes'];

    $results = Ipt::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $not_completed_ipt_results = $this->arrayGroupBy($results, 'not_complete_reason_not_completed');
    $not_completed_ipt_results = $this->arrayCount($not_completed_ipt_results);
    $default_results['Not Completed'] = (isset($not_completed_ipt_results[1]) ? $not_completed_ipt_results[1] : 0);

    $discontinued_ipt_results = $this->arrayGroupBy($results, 'not_complete_reason_discontinued_developed_tb');
    $discontinued_ipt_results = $this->arrayCount($discontinued_ipt_results);
    $default_results['Discontinued Developed TB'] = (isset($discontinued_ipt_results[1]) ? $discontinued_ipt_results[1] : 0);

    $ltfu_ipt_results = $this->arrayGroupBy($results, 'not_complete_reason_ltfu');
    $ltfu_ipt_results = $this->arrayCount($ltfu_ipt_results);
    $default_results['LTFU'] = (isset($ltfu_ipt_results[1]) ? $ltfu_ipt_results[1] : 0);

    $to_ipt_results = $this->arrayGroupBy($results, 'not_complete_reason_to');
    $to_ipt_results = $this->arrayCount($to_ipt_results);
    $default_results['To'] = (isset($to_ipt_results[1]) ? $to_ipt_results[1] : 0);

    return response()->json($default_results);
  }

  public function getIptOutcomesAdultsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_adult' => [true]
    ];
    $default_results = $this->default_results[$group_by_index]['ipt_completed_outcomes'];

    $results = Ipt::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $expected_complete_ipt_results = $this->arrayGroupBy($results, 'expected_to_complete_ipt');
    $expected_complete_ipt_results = $this->arrayCount($expected_complete_ipt_results);
    $default_results['Expected to Complete IPT'] = (isset($expected_complete_ipt_results[1]) ? $expected_complete_ipt_results[1] : 0);

    $completed_ipt_results = $this->arrayGroupBy($results, 'completed_ipt');
    $completed_ipt_results = $this->arrayCount($completed_ipt_results);
    $default_results['Completed IPT'] = (isset($completed_ipt_results[1]) ? $completed_ipt_results[1] : 0);

    return response()->json($default_results);
  }

  public function getIptNotCompletingAdultsByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_adult' => [true]
    ];
    $default_results = $this->default_results[$group_by_index]['ipt_not_completed_outcomes'];

    $results = Ipt::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $not_completed_ipt_results = $this->arrayGroupBy($results, 'not_complete_reason_not_completed');
    $not_completed_ipt_results = $this->arrayCount($not_completed_ipt_results);
    $default_results['Not Completed'] = (isset($not_completed_ipt_results[1]) ? $not_completed_ipt_results[1] : 0);

    $discontinued_ipt_results = $this->arrayGroupBy($results, 'not_complete_reason_discontinued_developed_tb');
    $discontinued_ipt_results = $this->arrayCount($discontinued_ipt_results);
    $default_results['Discontinued Developed TB'] = (isset($discontinued_ipt_results[1]) ? $discontinued_ipt_results[1] : 0);

    $ltfu_ipt_results = $this->arrayGroupBy($results, 'not_complete_reason_ltfu');
    $ltfu_ipt_results = $this->arrayCount($ltfu_ipt_results);
    $default_results['LTFU'] = (isset($ltfu_ipt_results[1]) ? $ltfu_ipt_results[1] : 0);

    $to_ipt_results = $this->arrayGroupBy($results, 'not_complete_reason_to');
    $to_ipt_results = $this->arrayCount($to_ipt_results);
    $default_results['To'] = (isset($to_ipt_results[1]) ? $to_ipt_results[1] : 0);

    return response()->json($default_results);
  }

  public function getIptOutcomesChildrenByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_child' => [true]
    ];
    $default_results = $this->default_results[$group_by_index]['ipt_completed_outcomes'];

    $results = Ipt::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $expected_complete_ipt_results = $this->arrayGroupBy($results, 'expected_to_complete_ipt');
    $expected_complete_ipt_results = $this->arrayCount($expected_complete_ipt_results);
    $default_results['Expected to Complete IPT'] = (isset($expected_complete_ipt_results[1]) ? $expected_complete_ipt_results[1] : 0);

    $completed_ipt_results = $this->arrayGroupBy($results, 'completed_ipt');
    $completed_ipt_results = $this->arrayCount($completed_ipt_results);
    $default_results['Completed IPT'] = (isset($completed_ipt_results[1]) ? $completed_ipt_results[1] : 0);

    return response()->json($default_results);
  }

  public function getIptNotCompletingChildrenByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty,
      'is_child' => [true]
    ];
    $default_results = $this->default_results[$group_by_index]['ipt_not_completed_outcomes'];

    $results = Ipt::whereDate('visit_date', '>=', $from)->whereDate('visit_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $not_completed_ipt_results = $this->arrayGroupBy($results, 'not_complete_reason_not_completed');
    $not_completed_ipt_results = $this->arrayCount($not_completed_ipt_results);
    $default_results['Not Completed'] = (isset($not_completed_ipt_results[1]) ? $not_completed_ipt_results[1] : 0);

    $discontinued_ipt_results = $this->arrayGroupBy($results, 'not_complete_reason_discontinued_developed_tb');
    $discontinued_ipt_results = $this->arrayCount($discontinued_ipt_results);
    $default_results['Discontinued Developed TB'] = (isset($discontinued_ipt_results[1]) ? $discontinued_ipt_results[1] : 0);

    $ltfu_ipt_results = $this->arrayGroupBy($results, 'not_complete_reason_ltfu');
    $ltfu_ipt_results = $this->arrayCount($ltfu_ipt_results);
    $default_results['LTFU'] = (isset($ltfu_ipt_results[1]) ? $ltfu_ipt_results[1] : 0);

    $to_ipt_results = $this->arrayGroupBy($results, 'not_complete_reason_to');
    $to_ipt_results = $this->arrayCount($to_ipt_results);
    $default_results['To'] = (isset($to_ipt_results[1]) ? $to_ipt_results[1] : 0);

    return response()->json($default_results);
  }
}
