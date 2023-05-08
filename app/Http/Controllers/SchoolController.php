<?php

namespace App\Http\Controllers;

use App\Models\Prof;
use App\Models\User;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.schools',[
            'schools' => School::all(),
            'directors' => User::where('role', 'director')->get()
        ]);
    }
    public function admin_()
    {
        return view('school.index',[
            'schools' => School::where('user_id', auth()->user()->id)->get(),
            'directors' => User::where('role', 'director')->get()
        ]);

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
            'name' => 'required',
            'level' => 'required',
            'director_id' => 'required'
        ]);

        $school = new School();
        $school->name = $request->name;
        $school->level = $request->level;
        $school->user_id = $request->director_id;
        $school->save();

        return  redirect()->back()->with([
            'status' => true,
            'message' => "L'école a été créée avec succès"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        return view('school.edit', [
            'school' => $school,
            'directors' => User::where('role', 'director')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        $data = $request->validate([
            'name' => 'required',
            'level' => 'required',
            'user_id' => 'required'
        ]);

        $school->update($data);

        return to_route('schools.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        foreach (Prof::all() as $profs) {
            if ($profs->school_id == $school->id) {
                return redirect()->back()->with([
                    'status' => false,
                    'message' => "Vous ne pouvez pas supprimer cette école!"
                ]);
            }
        }

        $school_ = School::findOrfail($school->id);

        $school_->delete();

        return redirect()->back()->with([
            'status' => true,
            'message' => "L'école est supprimée avec succès"
        ]);
    }
}
