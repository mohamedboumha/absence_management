<?php

namespace App\Http\Controllers;

use App\Models\Prof;
use App\Models\School;
use App\Models\Absence;
use Illuminate\Http\Request;

class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.profs', [
            'schools' => School::all(),
            'profs' => Prof::all()
        ]);
    }

    public function index_()
    {

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
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'cni' => 'required',
            'ppr' => 'required',
            'school_id' => 'required'
        ]);

        $prof = new Prof();
        $prof->f_name = $request->f_name;
        $prof->l_name = $request->l_name;
        $prof->cni = $request->cni;
        $prof->ppr = $request->ppr;
        $prof->school_id = $request->school_id;
        $prof->save();

        return  to_route('profs.index')->with([
            'status' => true,
            'message' => "Le professeur a été créée avec succès"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Prof $prof)
    {
        $absences = Absence::where('prof_id', $prof->id)->paginate(10);

        return view('prof.show', [
            'prof' => $prof,
            'school' => School::findOrFail($prof->school_id),
            'absences' => $absences
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prof $prof)
    {
        return view('prof.edit', [
            'prof' => $prof,
            'school' => School::findOrFail($prof->school_id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prof $prof)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prof $prof)
    {
        $prof_ = Prof::findOrfail($prof->id);

        $prof_->delete();

        return to_route('profs.index')->with([
            'status' => true,
            'message' => "Le professeur a été supprimée avec succès"
        ]);
    }
}
