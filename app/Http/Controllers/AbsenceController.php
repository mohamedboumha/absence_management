<?php

namespace App\Http\Controllers;

use App\Models\Prof;
use App\Models\User;
use App\Models\School;
use App\Models\Absence;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('absence.index', [
            'absences' => Absence::where('prof_id', $request->route('id'))->get(),
            'prof' => Prof::where('id', $request->route('id'))->get()
        ]
        );
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
            'start' => 'required',
            'end' => 'required',
            'justification',
            'status',
        ]);

        $absence = new Absence();
        $absence->start = $request->start;
        $absence->end = $request->end;
        $absence->status = $request->status == 'on' ? true : false;
        $request->status == 'on' ? $absence->justification = 'Justifié' : $absence->justification = 'Injustifié';
        $absence->prof_id = $request->route('id');
        $absence->save();

        return  redirect()->back()->with([
            'status' => true,
            'message' => "L'absence a été créée avec succès"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Absence $absence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absence $absence)
    {
        return view('absence.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absence $absence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $absence = Absence::findOrFail($request->absence);

        $absence->delete();

        return redirect()->back()->with([
            'status' => true,
            'message' => "L'école est supprimée avec succès"
        ]);
    }

}
