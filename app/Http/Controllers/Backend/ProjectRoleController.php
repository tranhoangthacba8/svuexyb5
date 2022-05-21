<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRole\createRequest;
use App\Http\Requests\ProjectRole\editRequest;
use App\Models\Position;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProjectRoleController extends Controller
{
    public function index()
    {
        if(Gate::denies('project-role.manager')){
            abort(403);
        }

        $projectRoles = ProjectUser::all();

        return view
        (
            'page.projectRoles.index',
            compact
            (
                'projectRoles'
            )
        );
    }

    public function add()
    {
        if(Gate::denies('project-role.manager')){
            abort(403);
        }

        $projects = Project::all();
        $users = User::all();
        $positions = Position::all();

        return view(
            'page.projectRoles.create',
            compact
            (
                'positions',
                'projects',
                'users'
            )
        );
    }

    public function store(createRequest $request)
    {
        if(Gate::denies('project-role.manager')){
            abort(403);
        }

        $projectRole = new ProjectUser();
        $projectRole->fill($request->all());
        $projectRole->save();

        return redirect()->route('project-roles.index');
    }

    public function edit($id)
    {
        if(Gate::denies('project-role.manager')){
            abort(403);
        }

        $projects = Project::all();
        $users = User::all();
        $positions = Position::all();
        $projectUser = ProjectUser::find($id);

        return view(
            'page.projectRoles.edit',
            compact
            (
                'projects',
                'users',
                'positions',
                'projectUser'
            )
        );
    }

    public function update($id, editRequest $request)
    {
        if(Gate::denies('project-role.manager')){
            abort(403);
        }

        $projectUser = ProjectUser::find($id);
        $projectUser->fill($request->all());
        $projectUser->save();

        return redirect()->route('project-roles.index');
    }

    public function delete($id)
    {
        if(Gate::denies('project-role.manager')){
            abort(403);
        }

        $projectUser = ProjectUser::find($id);
        $projectUser->delete($id);

        return redirect()->route('project-roles.index');
    }
}
