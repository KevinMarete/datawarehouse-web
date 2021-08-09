<?php

namespace App\Http\Controllers\Api;

use App\Models\SubCounty;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCountyController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $subcounties = SubCounty::with('county', 'facilities')->get();
    return response()->json($subcounties);
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
      $this->validate($request, SubCounty::$rules);
      $subcounty = SubCounty::firstOrCreate($request->all(), $request->all());
      return response()->json($subcounty);
    } catch (\Illuminate\Database\QueryException $e) {
      $errorCode = $e->errorInfo[1];
      if ($errorCode == '7') {
        SubCounty::withTrashed()->where([
          'name' => $request->name,
          'county_id' => $request->county_id
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
    $subcounty = SubCounty::with('county', 'facilities')->find($id);
    if (is_null($subcounty)) {
      return response()->json(['error' => 'not_found']);
    }
    return response()->json($subcounty);
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
      $this->validate($request, SubCounty::$rules);
      $subcounty  = SubCounty::find($id);
      if (is_null($subcounty)) {
        return response()->json(['error' => 'not_found']);
      }
      $subcounty->update($request->all());
      return response()->json($subcounty);
    } catch (\Illuminate\Database\QueryException $e) {
      $errorCode = $e->errorInfo[1];
      if ($errorCode == '7') {
        SubCounty::withTrashed()->where([
          'name' => $request->name,
          'county_id' => $request->county_id
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
    $subcounty = SubCounty::find($id);
    if (is_null($subcounty)) {
      return response()->json(['error' => 'not_found']);
    }
    $subcounty->delete();
    return response()->json(['msg' => 'Removed successfully']);
  }
}
