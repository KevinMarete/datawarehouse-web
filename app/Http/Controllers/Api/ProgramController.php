<?php

namespace App\Http\Controllers\Api;

use App\Models\Program;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;

class ProgramController extends BaseController
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
          'sub_county' => [
            'Dagoretti' => 0,
            'Embakasi' => 0,
            'Kamukunji' => 0,
            'Kasarani' => 0,
            'Langata' => 0,
            'Makadara' => 0,
            'Ruaraka' => 0,
            'Starehe' => 0,
            'Westlands' => 0
          ],
          'program_area' => [
            'FBCTS' => 0,
            'HTC' => 0,
            'KP: FSW' => 0,
            'KP:PWID' => 0,
            'LAB' => 0,
            'MAT' => 0,
            'PMTCT' => 0
          ],
          'funding_stream' => [
            'HBHC/HVOP' => 0,
            'HLAB' => 0,
            'HTXS' => 0,
            'HVCT' => 0,
            'HVOP' => 0,
            'HVTB' => 0,
            'IDUP' => 0,
            'MTCT' => 0,
            'PDTX' => 0
          ],
          'expenditure_analysis' => [
            'Health Systems Strengthening' => 0,
            'Program Management' => 0,
            'Site Level' => 0,
            'Strategic Information' => 0
          ],
        ],
        'gender' => [
          'F' => 0,
          'M' => 0
        ]
      ];
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $activities = Program::get();
    return response()->json($activities);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, Program::$rules);
    $activity = Program::firstOrCreate([
      'activity_date' => $request->activity_date,
      'activity' => $request->activity,
      'sub_activity' => $request->sub_activity
    ], $request->all());
    return response()->json($activity, 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $activity = Program::find($id);
    if (is_null($activity)) {
      return response()->json(['error' => 'not_found']);
    }
    return response()->json($activity);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    try {
      $this->validate($request, Program::$rules);
      $activity  = Program::find($id);
      if (is_null($activity)) {
        return response()->json(['error' => 'not_found']);
      }
      $activity->update($request->all());
      return response()->json($activity);
    } catch (\Illuminate\Database\QueryException $e) {
      $errorCode = $e->errorInfo[1];
      if ($errorCode == '7') {
        Program::withTrashed()->where([
          'activity_date' => $request->activity_date,
          'activity' => $request->activity,
          'sub_activity' => $request->sub_activity
        ])->restore();
        return response()->json(['error' => 'Deleted duplicate entry was restored!']);
      }
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $activity = Program::find($id);
    if (is_null($activity)) {
      return response()->json(['error' => 'not_found']);
    }
    $activity->delete();
    return response()->json(['msg' => 'Removed successfully'], 204);
  }

  public function getProgramCostSubCountyByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $sub_group_by_index = 'sub_county';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Program::whereDate('activity_date', '>=', $from)->whereDate('activity_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $results = $this->arrayGroupBy($results, $sub_group_by_index);
    $results = $this->arrayCount($results);
    $results = array_merge($this->default_results[$group_by_index][$sub_group_by_index], $results);

    return response()->json($results);
  }

  public function getProgramCostProgramAreaByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $sub_group_by_index = 'program_area';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Program::whereDate('activity_date', '>=', $from)->whereDate('activity_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $results = $this->arrayGroupBy($results, $sub_group_by_index);
    $results = $this->arrayCount($results);
    $results = array_merge($this->default_results[$group_by_index][$sub_group_by_index], $results);

    return response()->json($results);
  }

  public function getProgramCostFundingStreamByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $sub_group_by_index = 'funding_stream';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Program::whereDate('activity_date', '>=', $from)->whereDate('activity_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $results = $this->arrayGroupBy($results, $sub_group_by_index);
    $results = $this->arrayCount($results);
    $results = array_merge($this->default_results[$group_by_index][$sub_group_by_index], $results);

    return response()->json($results);
  }

  public function getProgramCostExpenditureAnalysisByCategory(Request $request)
  {
    $from = $request->from;
    $to = $request->to;
    $group_by_index = 'category';
    $sub_group_by_index = 'expenditure_analysis';
    $filters = [
      'facility' => $request->facility,
      'sub_county' => $request->subcounty
    ];

    $results = Program::whereDate('activity_date', '>=', $from)->whereDate('activity_date', '<', $to)->get()->toArray();
    $results = $this->arrayFilterBy($results, $filters);

    $results = $this->arrayGroupBy($results, $sub_group_by_index);
    $results = $this->arrayCount($results);
    $results = array_merge($this->default_results[$group_by_index][$sub_group_by_index], $results);

    return response()->json($results);
  }
}
