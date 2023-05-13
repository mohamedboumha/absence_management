<?php

namespace App\Http\Controllers;

use App\Models\Prof;
use App\Models\User;
use App\Models\School;
use App\Models\Absence;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.schools',[
            'schools' => School::latest()->filter(request(['search']))->paginate(10),
            'directors' => User::where('role', 'director')->get()
        ]);
    }
    public function index_()
    {
        $schools = School::where('user_id', auth()->user()->id)->get();

        $schools->load(['profs' => function ($query) {
            $query->latest()->take(10);
        }]);

        return view('director.schools', [
            'absence' => Absence::latest()->filter(request(['search']))->paginate(10),
            'schools' => $schools
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
            'name_ar' => 'required',
            'level' => 'required',
            'director_id' => 'required'
        ]);

        $school = new School();
        $school->name = $request->name;
        $school->name_ar = $request->name_ar;
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
        return view('school.show', [
            'school' => $school,
            'director' => User::where('id', $school->user_id)->get()[0],
            'profs' => Prof::where('school_id',$school->id)->filter(request(['search']))->paginate(10)
        ]);
    }

    public function show_(School $school)
    {
        return view('school.show', [
            'school' => $school,
            'director' => User::where('id', $school->user_id)->get()[0],
            'profs' => Prof::where('school_id',$school->id)->filter(request(['search']))->paginate(10)
        ]);
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
            'name_ar' => 'required',
            'level' => 'required',
            'user_id' => 'required'
        ]);

        $school->update($data);

        return to_route('schools.index')->with([
            'status' => true,
            'message' => "L'école a été modifier avec succès"
        ]);

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
