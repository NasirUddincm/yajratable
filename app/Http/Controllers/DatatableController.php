<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;

class DatatableController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('products')->latest()->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }

        return view('index');
    }

    public function indexGet()
    {

        return response()->json(DB::table('products')->get());
    }
}
