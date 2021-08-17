<?php

namespace App\Http\Controllers\Api;

use App\Models\Query;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queries = Query::with('query_category')->get();
        return response()->json($queries);
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
            $this->validate($request, Query::$rules);
            $query = Query::firstOrCreate($request->all(), $request->all());
            return response()->json($query);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '7') {
                Query::withTrashed()->where([
                    'name' => $request->name,
                    'query_category_id' => $request->query_category_id
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
        $query = Query::with('query_category')->find($id);
        if (is_null($query)) {
            return response()->json(['error' => 'not_found']);
        }
        return response()->json($query);
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
            $this->validate($request, Query::$rules);
            $query  = Query::find($id);
            if (is_null($query)) {
                return response()->json(['error' => 'not_found']);
            }
            $query->update($request->all());
            return response()->json($query);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '7') {
                Query::withTrashed()->where([
                    'name' => $request->name,
                    'query_category_id' => $request->query_category_id
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
        $query = Query::find($id);
        if (is_null($query)) {
            return response()->json(['error' => 'not_found']);
        }
        $query->delete();
        return response()->json(['msg' => 'Removed successfully']);
    }

    /**
     * Run query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function runQuery(Request $request)
    {
        $results = [];
        $query = str_replace([':from', ':to'], ["'" . $request->from . "'", "'" . $request->to . "'"], $request->query_statement);
        try {
            $results = DB::connection('mysql_read')->select(DB::raw($query));
            if (empty($results)) {
                $results = [['message' => 'No data found']];
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
        return response()->json($results);
    }
}
