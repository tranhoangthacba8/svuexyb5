<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaticReportController extends Controller
{
    public function staticByMonth(){
         $workingTimes = DB::table('reports')
         ->selectRaw('sum(workingTime) as sumWork')
         ->whereYear('date', date('Y'))
         ->groupBy(DB::raw("Month(date)"))
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
    public function staticByProject(){
        $workingTime = DB::table('reports')
            ->selectRaw('sum(workingTime) as sumWork')
            ->whereYear('date', date('Y'))
            ->groupBy(DB::raw("projectId"))
            ->pluck('sumWork');

       $projects = Project::all();

       return view(

       );
    }
}
