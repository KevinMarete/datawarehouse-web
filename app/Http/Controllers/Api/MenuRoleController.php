<?php

namespace App\Http\Controllers\Api;

use App\Models\MenuRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuroles = MenuRole::with('menu', 'role')->get();
        return response()->json($menuroles);
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
            $this->validate($request, MenuRole::$rules);
            $menurole = MenuRole::firstOrCreate([
                'menu_id' => $request->menu_id,
                'role_id' => $request->role_id
            ], $request->all());
            return response()->json($menurole);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '7') {
                MenuRole::withTrashed()->where([
                    'menu_id' => $request->menu_id,
                    'role_id' => $request->role_id
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
        $menurole = MenuRole::with('menu', 'role')->find($id);
        if (is_null($menurole)) {
            return response()->json(['error' => 'not_found']);
        }
        return response()->json($menurole);
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
            $this->validate($request, MenuRole::$rules);
            $menurole  = MenuRole::find($id);
            if (is_null($menurole)) {
                return response()->json(['error' => 'not_found']);
            }
            $menurole->update($request->all());
            return response()->json($menurole);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '7') {
                MenuRole::withTrashed()->where([
                    'menu_id' => $request->menu_id,
                    'role_id' => $request->role_id
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
        $menurole = MenuRole::find($id);
        if (is_null($menurole)) {
            return response()->json(['error' => 'not_found']);
        }
        $menurole->delete();
        return response()->json(['msg' => 'Removed successfully']);
    }
}
