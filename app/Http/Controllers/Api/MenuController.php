<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $menus = Menu::all();
    return response()->json($menus);
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
      $this->validate($request, Menu::$rules);
      $menu = Menu::firstOrCreate([
        'name' => $request->name,
        'menu_group_id' => $request->menu_group_id
      ], $request->all());
      return response()->json($menu);
    } catch (\Illuminate\Database\QueryException $e) {
      $errorCode = $e->errorInfo[1];
      if ($errorCode == '7') {
        Menu::withTrashed()->where([
          'name' => $request->name,
          'menu_group_id' => $request->menu_group_id
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
    $menu = Menu::find($id);
    if (is_null($menu)) {
      return response()->json(['error' => 'not_found']);
    }
    return response()->json($menu);
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
      $this->validate($request, Menu::$rules);
      $menu  = Menu::find($id);
      if (is_null($menu)) {
        return response()->json(['error' => 'not_found']);
      }
      $menu->update($request->all());
      return response()->json($menu);
    } catch (\Illuminate\Database\QueryException $e) {
      $errorCode = $e->errorInfo[1];
      if ($errorCode == '7') {
        Menu::withTrashed()->where([
          'name' => $request->name,
          'menu_group_id' => $request->menu_group_id
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
    $menu = Menu::find($id);
    if (is_null($menu)) {
      return response()->json(['error' => 'not_found']);
    }
    $menu->delete();
    return response()->json(['msg' => 'Removed successfully']);
  }
}
