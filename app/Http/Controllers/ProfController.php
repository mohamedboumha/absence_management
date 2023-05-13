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
            'profs' => Prof::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    public function index_()
    {
        $director = auth()->user();

        $profs = Prof::whereIn('school_id', $director->schools()->pluck('id'))
        ->where(function ($query) {
            $query->when(request('search'), function ($q, $search) {
                $q->where('f_name', 'like', '%' . $search . '%')
                  ->orWhere('l_name', 'like', '%' . $search . '%')
                  ->orWhere('f_name_ar', 'like', '%' . $search . '%')
                  ->orWhere('l_name_ar', 'like', '%' . $search . '%')
                  ->orWhere('cni', 'like', '%' . $search . '%')
                  ->orWhere('ppr', 'like', '%' . $search . '%');
            });
        })
        ->paginate(10);

        return view('director.profs', [
            'schools' => School::all(),
            'profs' => $profs
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prof.create', [
            'schools' => School::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'f_name_ar' => 'required',
            'l_name_ar' => 'required',
            'cni' => 'required',
            'ppr' => 'required',
            'school_id' => 'required'
        ]);

        $prof = new Prof();
        $prof->f_name = $request->f_name;
        $prof->l_name = $request->l_name;
        $prof->f_name_ar = $request->f_name_ar;
        $prof->l_name_ar = $request->l_name_ar;
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
        $absences = Absence::where('prof_id', $prof->id)->latest()->filter(request(['search']))->paginate(10);

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
            'selected_school' => School::findOrFail($prof->school_id),
            'schools' => School::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prof $prof)
    {
        $data = $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'f_name_ar' => 'required',
            'l_name_ar' => 'required',
            'cni' => 'required',
            'ppr' => 'required',
            'school_id' => 'required'
        ]);

        $prof->update($data);

        return to_route('profs.index')->with([
            'status' => true,
            'message' => "Le professeur a été modifier avec succès"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prof $prof)
    {
        $prof_ = Prof::findOrfail($prof->id);

        $prof_->delete();

        return redirect()->back()->with([
            'status' => true,
            'message' => "Le professeur a été supprimée avec succès"
        ]);
    }
}
