<?php

namespace App\Http\Controllers;

use App\Models\Prof;
use Illuminate\Http\Request;

class ProfController extends Controller
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

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Prof $prof)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prof $prof)
    {
        //
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

        return redirect()->back();
    }
}
