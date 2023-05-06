<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Prof;
use App\Models\School;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class Director extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.directors', [
            'directors' => User::where('role', 'director')->get(),
            'schools' => School::with('profs')->get(),
            'profs' => Prof::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.director.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = count(User::where('role', 'director')->get()) + 1;
        $request->validate([
            'name' => 'required|string|max:255',
            'cni' => 'required|string|max:255',
            'ppr' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'id' => $user_id,
            'name' => $request->name,
            'cni' => $request->cni,
            'ppr' => $request->ppr,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return to_route('directors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        $user = User::findOrfail($id);

        $user->delete();

        return redirect()->back();
    }
}
