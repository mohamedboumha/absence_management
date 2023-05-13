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

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.directors', [
            'directors' => User::where('role', 'director')->latest()->filter(request(['search']))->paginate(10),
            'schools' => School::with('profs')->get(),
            'profs' => Prof::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('director.create', [
            'schools' => School::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = count(User::where('role', 'director')->get()) + 1;
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'f_name_ar' => 'required|string|max:255',
            'l_name_ar' => 'required|string|max:255',
            'cni' => 'required|string|max:255',
            'ppr' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'id' => $user_id,
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'f_name_ar' => $request->f_name_ar,
            'l_name_ar' => $request->l_name_ar,
            'cni' => $request->cni,
            'ppr' => $request->ppr,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->back()->with([
            'status' => true,
            'message' => "Le Directeur compte a été créée avec succès"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     $director = User::findOrFail($id);
    
    // Load all the schools associated with the director
    $schools = $director->schools()->get();

    // Load the latest 5 professors for each school
    $schools->load(['profs' => function ($query) {
        $query->latest()->take(5);
    }]);

    return view('director.show', [
        'director' => $director,
        'schools' => $schools,
    ]);
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

        foreach (School::all() as $school) {
            if ($school->user_id == $id) {
                return redirect()->back()->with([
                    'status' => false,
                    'message' => "Vous ne pouvez pas supprimer ce Directeur compte!"
                ]);
            }
        }


        $user->delete();

        return redirect()->back()->with([
            'status' => true,
            'message' => "Le Directeur compte est supprimée avec succès"
        ]);


        // return redirect()->back();
    }
}
