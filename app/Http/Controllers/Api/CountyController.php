<?php

namespace App\Http\Controllers\Api;

use App\Models\County;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountyController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $counties = County::with('subcounties')->get();
    return response()->json($counties);
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
      $this->validate($request, County::$rules);
      $county = County::firstOrCreate($request->all(), $request->all());
      return response()->json($county);
    } catch (\Illuminate\Database\QueryException $e) {
      $errorCode = $e->errorInfo[1];
      if ($errorCode == '7') {
        County::withTrashed()->where([
          'name' => $request->name
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
    $county = County::with('subcounties')->find($id);
    if (is_null($county)) {
      return response()->json(['error' => 'not_found']);
    }
    return response()->json($county);
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
      $this->validate($request, County::$rules);
      $county  = County::find($id);
      if (is_null($county)) {
        return response()->json(['error' => 'not_found']);
      }
      $county->update($request->all());
      return response()->json($county);
    } catch (\Illuminate\Database\QueryException $e) {
      $errorCode = $e->errorInfo[1];
      if ($errorCode == '7') {
        County::withTrashed()->where([
          'name' => $request->name
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
    $county = County::find($id);
    if (is_null($county)) {
      return response()->json(['error' => 'not_found']);
    }
    $county->delete();
    return response()->json(['msg' => 'Removed successfully']);
  }
}
