<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaticReportController extends Controller
{
    public function staticByMonth()
    {
        $workingTimes = DB::table('reports')
            ->selectRaw('sum(workingTime) as sumWork')
            ->whereYear('date', date('Y'))
            ->groupBy(DB::raw("workingType"))
            ->pluck('sumWork');

        return view
        (
            'page.statics.workingTimeMonth',
            compact
            (
                'workingTimes'
            )
        );
    }

    public function staticByProject()
    {
        $workingTimes = DB::table('reports')
            ->select(DB::raw('sum(workingTime) as sumWork'))
            ->groupBy(DB::raw("projectId"))
            ->pluck('sumWork');

        $projectNames = Project::all()->pluck('name')->toArray();

        return view
        (
            'page.statics.workingTimeProject',
            compact
            (
                'workingTimes',
                'projectNames'
            )
        );
    }
}
