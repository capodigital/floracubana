<?php

namespace App\Http\Controllers\Admin;

use App\Models\Origenes;
use App\Http\Controllers\Controller;
//use App\Http\Resources\OrigenesResource;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrigenesController extends Controller
{

    public function index()
    {
        $origenes = Origenes::all();
        /*return Inertia::render('Origenes/Index',[
            'origenes'=> OrigenesResource::collection(Origenes::latest()->simplePaginate(10))
        ]);*/
        return Inertia::render('Origenes/Index',[
            'origenes'=> $origenes
        ]);
    }


    public function create()
    {
        return Inertia::render('Origenes/Create');
    }


    public function store(Request $request)
    {
        $request->validate(['origen'=>'required|max:100']);
        $origen = new Origenes($request->input());
        $origen->save();

        return redirect('dashboard/origenes');
    }


    public function show(Origenes $origene)
    {
        //
    }


    public function edit(Origenes $origene)
    {
        return Inertia::render('Origenes/Edit',[
            'origene'=>$origene
        ]);

    }


    public function update(Request $request, Origenes $origene)
    {
        $request->validate(['origen'=>'required|max:100']);
        $origene->update($request->all());

        return redirect('dashboard/origenes');

    }


    public function destroy(Origenes $origene)
    {
        $origene->delete();

        return redirect('dashboard/origenes');
    }
}
