<?php

namespace App\Http\Controllers\Admin;

use App\Models\Origenes;
use App\Models\Especies;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Imports\EspeciesImport;
use Maatwebsite\Excel\Facades\Excel;

class EspeciesController extends Controller
{
    public function index()
    {
        $especies = Especies::select('especies.id','gen','epit','fam',
        'id_origen','origen')
        ->join('origenes', 'especies.id_origen', '=', 'origenes.id')

        ->paginate(10);

        $origenes = Origenes::all();

        return Inertia::render('Especies/Index',[
            'origenes'=> $origenes,
            'especies'=> $especies,

        ]);
    }


    public function create()
    {
        return Inertia::render('Especies/Create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'gen'=>'required|max:100',
            'epit'=>'required|max:100',
            'fam'=>'required|max:100',
            'id_origen'=>'required|numeric',
        ]);
        $especie = new Especies($request->input());
        $especie->save();

        return to_route('especies.index');


    }


    public function show(Origenes $origen)
    {
        //
    }


    public function edit(Especies $especy)
    {
        return Inertia::render('Especies/Edit',[
            'especy'=>$especy
        ]);

    }


    public function update(Request $request, Especies $especy)
    {
        $request->validate([
            'gen'=>'required|max:100',
            'epit'=>'required|max:100',
            'fam'=>'required|max:100',
            'id_origen'=>'required|numeric',
        ]);

        $especy->update($request->all());

        return redirect()->route('View_Child_Profile');


    }


    public function destroy(Especies $especy)
    {
        $especy->delete();

        return to_route('especies.index');

    }


    public function reportes(){
        $especies = Especies::select('especies.id','gen','epit','fam',
        'id_origen','origen')
        ->join('origenes','origenes.id','=','especies.id_origen')
        ->get();

        $origenes = Origenes::all();

        return Inertia::render('Especies/Reportes',[
            'origenes'=> $origenes,
            'especies'=> $especies
        ]);
    }

    public function import(Request $request){

        /*$path1 = $request->file('file')->store('temp');
        $path=storage_path('app').'/'.$path1;
        $data = Excel::import(new EspeciesImport,$path);*/

        //$file = $request->file('file');

        //Excel::import(new EspeciesImport, $file);
        //dd(request()->file('file'));
        Excel::import(new EspeciesImport, request()->file('file'));

        return redirect()->route('View_Child_Profile');




    }
}
