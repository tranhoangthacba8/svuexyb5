<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Report\createRequest;
use App\Http\Requests\Report\editRequest;
use App\Models\Position;
use App\Models\Project;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReportController extends Controller
{
    public function getReportAll()
    {
        if(Gate::denies('report.manager')){
            abort(403);
        }

        $userId = Auth::id();
        $reports = Report::where('userId', $userId)
            ->get();

        return view
        (
            'page.reports.index',
            compact(
                'reports',
                'userId'
            )
        );
    }

    public function add()
    {
        if(Gate::denies('report.manager')){
            abort(403);
        }

        $projects = Project::all();
        $positions = Position::all();
        $reports = Report::all();

        return view
        (
            'page.reports.create',
            compact(
                'projects',
                'positions',
                'reports',
            )
        );
    }

    public function store(createRequest $request)
    {
        $report = new Report();
        $report->fill($request->all());
        $report->userId = Auth::id();
        $report->save();

        return redirect()->route('report.index');
    }

    public function edit($id)
    {
        if(Gate::denies('report.manager')){
            abort(403);
        }

        $projects = Project::all();
        $positions = Position::all();
        $report = Report::find($id);

        return view(
            'page.reports.edit',
            compact
            (
                'projects',
                'positions',
                'report'
            )
        );
    }

    public function update(editRequest $request, $id)
    {
        if(Gate::denies('report.manager')){
            abort(403);
        }

        $report = Report::find($id);
        $report->fill($request->all());
        $report->userId = Auth::id();
        $report->save();

        return redirect()->route('report.index');
    }

    public function delete($id)
    {
        if(Gate::denies('report.manager')){
            abort(403);
        }

        if(Gate::denies('report.manager')){
            abort(403);
        }

        $report = Report::find($id);
        $report->delete();

        return redirect()->route('report.index');
    }
}
