<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NhacsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('nhacsis')->get();
        return view('nhacsi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('nhacsi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $model = DB::table('nhacsis')->where('id', $id)->first();
        $listAmNhac = DB::table('amnhacs')
            ->join('nhacsis', 'amnhacs.id_nhacsi', '=', 'nhacsis.id')
            ->where('id_nhacsi', $id)
            ->select('amnhacs.*', 'nhacsis.ten as ten_nhacsi')->get();
        return view('nhacsi.show', compact('model', 'listAmNhac'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('nhacsi.edit');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('nhacsis')->where('id', $id)->delete();
        return back();
    }
}
