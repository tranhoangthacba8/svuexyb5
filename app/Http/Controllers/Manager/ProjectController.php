<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\createRequest;
use App\Http\Requests\Project\editRequest;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(){
        $projects = DB::table('projects')
            ->select('projects.*')
            ->get();
        $projectUsers = ProjectUser::all();

        return view(
            'content.manager.managerProject.index'
        ,compact('projects','projectUsers')
        );
    }
    public function add(){
        $users = User::all();

        return view(
            'content.manager.managerProject.createProject',
        compact('users')
        );
    }
    public function store(createRequest $request){
        $name = $request->input('name');
        $detail = $request->input('detail');
        $duration = $request->input('duration');
        $revenue = $request->input('revenue');

        $project = new Project();
        $project->name = $name;
        $project->detail = $detail;
        $project->duration = $duration;
        $project->revenue = $revenue;

        $project->save();

        return redirect()->route('project.index');
    }
    public function edit($id){
        $users = User::all();
        $project = Project::find($id);

        return view(
            'content.manager.managerProject.editProject',
            compact('users','project')
        );
    }
    public function update($id, editRequest $request){
        $name = $request->input('name');
        $detail = $request->input('detail');
        $duration = $request->input('duration');
        $revenue = $request->input('revenue');

        $project = Project::find($id);
        $project->name = $name;
        $project->detail = $detail;
        $project->duration = $duration;
        $project->revenue = $revenue;

        $project->save();

        return redirect()->route('project.index');
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

        return redirect()->route('project.index');
    }
}
