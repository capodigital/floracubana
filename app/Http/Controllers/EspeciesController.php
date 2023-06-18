<?php

namespace App\Http\Controllers;

use App\Models\Especies;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class EspeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Especies $especies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Especies $especies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Especies $especies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Especies $especies)
    {
        //
    }

    public function export()
    {
        return Excel::download(new EspeciesExport, 'dbo_gretant cejas31.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        Excel::import(new EspeciesImport,request()->file('file'));
        return back();
    }

}
