<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;
use Carbon\Carbon;
use App\Models\School;

class DashboardController extends Controller
{
    public function admin()
    {
        $lastWeek = Carbon::now()->subWeek();
    
        // $schools = School::with('profs.absences')->get();
        // $organizedData = [];
        // foreach ($schools as $school) {
        //     $profAbsences = [];
        //     foreach ($school->profs as $prof) {
        //         array_push($profAbsences, [...$prof->absences]);
        //     }
        //     $organizedData[$school->id] = [...$profAbsences];
        // }
        $schools = School::with('profs.absences')->get();

        $allAbsences = [];

        foreach ($schools as $school) {
            $absences = $school->profs->flatMap(function ($prof) {
                return $prof->absences->filter(function ($absence) {
                    return $absence->created_at->isCurrentMonth();
                });
            });
        
            $allAbsences[$school->id] = $absences;
        }

        $maxAbsenceCount = 0;
        $minAbsenceCount = PHP_INT_MAX;
        $schoolWithMaxAbsences = null;
        $schoolWithMinAbsences = null;

        foreach ($allAbsences as $schoolId => $absences) {
            $absenceCount = $absences->count();

            if ($absenceCount > $maxAbsenceCount) {
                $maxAbsenceCount = $absenceCount;
                $schoolWithMaxAbsences = [
                    'school' => School::find($schoolId),
                    'absences' => $absences
                ];
            }

            if ($absenceCount < $minAbsenceCount) {
                $minAbsenceCount = $absenceCount;
                $schoolWithMinAbsences = [
                    'school' => School::find($schoolId),
                    'absences' => $absences
                ];
            }
        }
        // dd($schoolWithMaxAbsences, $schoolWithMinAbsences);

        return view('admin.dashboard', [
            'schools' => School::all(),
            'weekDays' => Absence::whereBetween('created_at', [$lastWeek, Carbon::now()])->get(),
            'today' => Absence::whereDate('created_at', Carbon::today())->get(),
            'this_month' => Absence::whereBetween('created_at', [Carbon::now()->subDays(30)->startOfDay(), Carbon::now()->endOfDay()])->get(),
            'this_week' => Absence::whereBetween('created_at', [Carbon::now()->subDays(7)->startOfDay(), Carbon::now()->endOfDay()])->get(),
            'this_year' => Absence::whereBetween('created_at', [Carbon::now()->subYear()->endOfDay(), Carbon::now()->startOfDay()])->get(),
            'schoolWithMaxAbsences' => $schoolWithMaxAbsences,
            'schoolWithMinAbsences' => $schoolWithMinAbsences
        ]);
    }

    public function director()
    {
        return view('director.dashboard');
    }
}
