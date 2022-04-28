<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(){
        $projects = DB::table('projects')
            ->join('project_users','projects.id','=','project_users.projectId')
            ->join('users','project_users.userId','=','users.id')
            ->select('projects.*','users.name')
            ->get();

        return view('content.manager.managerProject.index'
        ,compact($projects));
    }
    public function add(){
        $users = User::all();

        return view('content.manager.managerProject.createProject',
        compact('users'));
    }
    public function store(Request $request){
        $name = $request->input('name');
        $detail = $request->input('detail');
        $duration = $request->input('duration');
        $revenue = $request->input('revenue');
        $listMemberId = $request->input('listMember', []);

        $project = new Project;
        $project->name = $name;
        $project->detail = $detail;
        $project->duration = $duration;
        $project->revenue = $revenue;
        $project->ProjectUsers()->sync($listMemberId);
        $project->save();

        return redirect()->route();
    }
    public function edit($id){
        $users = User::all();
        $project = Project::find($id);

        return view('content.manager.managerProject.editProject',
            compact('users','project'));
    }
    public function update($id, Request $request){
        $name = $request->input('name');
        $detail = $request->input('detail');
        $duration = $request->input('duration');
        $revenue = $request->input('revenue');
        $listMemberId = $request->input('listMember', []);

        $project = Project::find($id);
        $project->name = $name;
        $project->detail = $detail;
        $project->duration = $duration;
        $project->revenue = $revenue;
        $project->ProjectUsers()->sync($listMemberId);
        $project->save();

        return redirect()->route();
    }
    public function delete($id){
        $project = Project::find($id);
        $project->delete();
        $projectUsers = ProjectUser::all();

        foreach ($projectUsers as $projectUser){
            if($projectUser->projectId == $id){
                $projectUser->delete();
            }
        }

        return redirect()->route();
    }
}
