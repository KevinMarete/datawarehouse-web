<?php

namespace App\Http\Controllers\Api;

use App\Models\QueryCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QueryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query_categories = QueryCategory::with('queries')->get();
        return response()->json($query_categories);
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
            $this->validate($request, QueryCategory::$rules);
            $query_category = QueryCategory::firstOrCreate($request->all(), $request->all());
            return response()->json($query_category);
        } catch (\Illuminate\Database\QueryCategoryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '7') {
                QueryCategory::withTrashed()->where([
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
        $query_category = QueryCategory::with('queries')->find($id);
        if (is_null($query_category)) {
            return response()->json(['error' => 'not_found']);
        }
        return response()->json($query_category);
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
            $this->validate($request, QueryCategory::$rules);
            $query_category  = QueryCategory::find($id);
            if (is_null($query_category)) {
                return response()->json(['error' => 'not_found']);
            }
            $query_category->update($request->all());
            return response()->json($query_category);
        } catch (\Illuminate\Database\QueryCategoryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '7') {
                QueryCategory::withTrashed()->where([
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
        $query_category = QueryCategory::find($id);
        if (is_null($query_category)) {
            return response()->json(['error' => 'not_found']);
        }
        $query_category->delete();
        return response()->json(['msg' => 'Removed successfully']);
    }
}
