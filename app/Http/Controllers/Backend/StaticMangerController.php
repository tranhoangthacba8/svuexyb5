<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaticMangerController extends Controller
{
    public function sumByRole(){
        $totalTime = DB::table('reports')
            ->selectRaw('sum(workingTime) as sumWork')
            ->whereYear('date', date('Y'))
            ->groupBy(DB::raw("positionId"))
            ->pluck('sumWork');

        $positions = Position::all();
    }
    public function sumTimeByMember(){
        $totalTime = DB::table('reports')
                     ->selectRaw('sum(workingTime) as sumWork')
                     ->whereYear('date', date('Y'))
                     ->groupBy(DB::raw('userId'))
                     ->pluck('sumWork');

        $users = User::all();
    }
}
