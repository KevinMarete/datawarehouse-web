<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->get();
        return response()->json($users);
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
            $this->validate($request, User::$rules);
            $user = User::firstOrCreate([
                'email' => $request->email,
            ], $request->all());
            return response()->json($user);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '7') {
                User::withTrashed()->where([
                    'email' => $request->email
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
        $user = User::with('role')->find($id);
        if (is_null($user)) {
            return response()->json(['error' => 'not_found']);
        }
        return response()->json($user);
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
            $this->validate($request, User::$rules);
            $user  = User::find($id);
            if (is_null($user)) {
                return response()->json(['error' => 'not_found']);
            }
            $user->update($request->all());
            return response()->json($user);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '7') {
                User::withTrashed()->where([
                    'email' => $request->email
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
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json(['error' => 'not_found']);
        }
        $user->delete();
        return response()->json(['msg' => 'Removed successfully']);
    }
}
