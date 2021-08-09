<?php

namespace App\Http\Controllers\Api;

use App\Models\Facility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $facilities = Facility::with('subcounty', 'subcounty.county')->get();
    return response()->json($facilities);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    try {
      $this->validate($request, Facility::$rules);
      $facility = Facility::firstOrCreate($request->all(), $request->all());
      return response()->json($facility);
    } catch (\Illuminate\Database\QueryException $e) {
      $errorCode = $e->errorInfo[1];
      if ($errorCode == '7') {
        Facility::withTrashed()->where([
          'mflcode' => $request->mflcode,
          'subcounty_id' => $request->subcounty_id,
        ])->restore();
        return response()->json(['error' => 'Deleted duplicate entry was restored!']);
      }
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $facility = Facility::with('subcounty', 'subcounty.county')->find($id);
    if (is_null($facility)) {
      return response()->json(['error' => 'not_found']);
    }
    return response()->json($facility);
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
      $this->validate($request, Facility::$rules);
      $facility  = Facility::find($id);
      if (is_null($facility)) {
        return response()->json(['error' => 'not_found']);
      }
      $facility->update($request->all());
      return response()->json($facility);
    } catch (\Illuminate\Database\QueryException $e) {
      $errorCode = $e->errorInfo[1];
      if ($errorCode == '7') {
        Facility::withTrashed()->where([
          'mflcode' => $request->mflcode,
          'subcounty_id' => $request->subcounty_id,
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
    $facility = Facility::find($id);
    if (is_null($facility)) {
      return response()->json(['error' => 'not_found']);
    }
    $facility->delete();
    return response()->json(['msg' => 'Removed successfully']);
  }
}
