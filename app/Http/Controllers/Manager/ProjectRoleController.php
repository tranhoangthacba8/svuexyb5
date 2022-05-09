<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManagerProjectRole\createRequest;
use App\Http\Requests\ManagerProjectRole\editRequest;
use App\Models\Position;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectRoleController extends Controller
{
    public function index(){
       $projectRoles = ProjectUser::all();

       return view(
           'content.manager.managerProjectRole.index',
       compact('projectRoles')
       );
    }
    public function add(){
       $projects = Project::all();
       $users = User::all();
       $positions = Position::all();

       return view(
           'content.manager.managerProjectRole.create',
       compact('positions','projects','users')
       );
    }
    public function store(createRequest $request){
        $projectId = $request->input('project');
        $userId = $request->input('user');
        $positionId = $request->input('position');

        $projectRole = new ProjectUser();
        $projectRole->projectId = $projectId;
        $projectRole->userId = $userId;
        $projectRole->positionId = $positionId;
        $projectRole->save();

        return redirect()->route('projectRole.index');
    }
    public function edit($id){
        $projects = Project::all();
        $users = User::all();
        $positions = Position::all();
        $projectUser = ProjectUser::find($id);

        return view(
            'content.manager.managerProjectRole.edit',
        compact('projects','users','positions','projectUser')
        );
    }
    public function update($id, editRequest $request){
        $projectId = $request->input('project');
        $userId = $request->input('user');
        $positionId = $request->input('position');

        $projectUser = ProjectUser::find($id);
        $projectUser->projectId = $projectId;
        $projectUser->userId = $userId;
        $projectUser->positionId = $positionId;

        return redirect()->route('projectRole.index');
    }
    public function delete($id){
        $projectUser = ProjectUser::find($id);
        $projectUser->delete($id);

        return redirect()->route('projectRole.index');
    }
}
