<?php

namespace App\Http\Controllers\Api;

use App\Models\MenuGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menugroups = MenuGroup::with('menus', 'menus.menu_roles')->get();
        return response()->json($menugroups);
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
            $this->validate($request, MenuGroup::$rules);
            $menugroup = MenuGroup::firstOrCreate([
                'name' => $request->name
            ], $request->all());
            return response()->json($menugroup);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '7') {
                MenuGroup::withTrashed()->where([
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
        $menugroup = MenuGroup::with('menus', 'menus.menu_roles')->find($id);
        if (is_null($menugroup)) {
            return response()->json(['error' => 'not_found']);
        }
        return response()->json($menugroup);
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
            $this->validate($request, MenuGroup::$rules);
            $menugroup  = MenuGroup::find($id);
            if (is_null($menugroup)) {
                return response()->json(['error' => 'not_found']);
            }
            $menugroup->update($request->all());
            return response()->json($menugroup);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '7') {
                MenuGroup::withTrashed()->where([
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
        $menugroup = MenuGroup::find($id);
        if (is_null($menugroup)) {
            return response()->json(['error' => 'not_found']);
        }
        $menugroup->delete();
        return response()->json(['msg' => 'Removed successfully']);
    }
}
