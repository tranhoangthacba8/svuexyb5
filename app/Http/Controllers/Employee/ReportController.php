<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Report\createRequest;
use App\Http\Requests\Report\editRequest;
use App\Models\Position;
use App\Models\Project;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function getReportAll($userId){
        $reports = Report::where('userId',$userId)
            ->get();

        return view('content.employee.report',
            compact('reports','userId'));
    }
    public function add($userId){
        $projects = Project::all();
        $positions = Position::all();
        $reports = Report::all();

        return view(
            'content.employee.createReport',
            compact('projects','userId','positions','reports')
        );
    }
    public function store(createRequest $request, $userId){
         $projectId = $request->input('projectName');
         $positionId = $request->input('positionName');
         $workingTime = $request->input('workingTime');
         $date = $request->input('date');
         $workingType = $request->input('workingType');
         $detail = $request->input('detail');

         $report = new Report();
         $report->projectId = $projectId;
         $report->positionId = $positionId;
         $report->workingTime = $workingTime;
         $report->date = $date;
         $report->workingType = $workingType;
         $report->detail = $detail;
         $report->userId = $userId;
         $report->save();

         return redirect()->route('report.index');
    }
    public function edit($userId, $id){
        $projects = Project::all();
        $positions = Position::all();
        $report = Report::find($id);

        return view(
            'content.employee.editReport',
            compact('projects','userId','positions','report')
        );
    }
    public function update($userId, editRequest $request, $id){
        $report = DB::table('reports')->where('id',$id)->first();

        $projectId = $request->input('projectName');
        $positionId = $request->input('positionName');
        $workingTime = $request->input('workingTime');
        $date = $request->input('date');
        $workingType = $request->input('workingType');
        $detail = $request->input('detail');

        $report->projectId = $projectId;
        $report->positionId = $positionId;
        $report->workingTime = $workingTime;
        $report->date = $date;
        $report->workingType = $workingType;
        $report->detail = $detail;
        $report->userId = $userId;
        $report->save();

        return redirect()->route('report.index');
    }
    public function delete($id){
        $report = Report::find($id);
        $report->delete();

        return redirect()->route('report.index');
    }
}
