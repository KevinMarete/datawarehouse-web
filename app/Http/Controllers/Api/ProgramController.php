<?php

namespace App\Http\Controllers\Api;

use App\Models\Program;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
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
}
