<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaticMangerController extends Controller
{
    public function totalByRole()
    {
        $totalTime = DB::table('reports')
            ->selectRaw('sum(workingTime) as sumWork')
            ->whereYear('date', date('Y'))
            ->groupBy(DB::raw("positionId"))
            ->pluck('sumWork');

        $positions = Position::all();

        return view
        (
            'page.statics.totalTimeByRole',
            compact
            (
                'totalTime',
                'positions'
            )
        );
    }

    public function totalTimeByMember()
    {
        $totalTime = DB::table('reports')
            ->selectRaw('sum(workingTime) as sumWork')
            ->whereYear('date', date('Y'))
            ->groupBy(DB::raw('userId'))
            ->pluck('sumWork');

        $users = User::all();

        return view
        (
            'page.statics.totalTimeByMember',
            compact
            (
                'totalTime',
                'users'
            )
        );
    }
}
