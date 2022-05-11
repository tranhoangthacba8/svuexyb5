<?php

namespace App\Http\Controllers\Backend;

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
    public function index()
    {
        $projects = DB::table('projects')
            ->select('projects.*')
            ->get();
        $projectUsers = ProjectUser::all();

        return view
        (
            'page.projects.index'
            , compact(
                'projects',
                'projectUsers'
            )
        );
    }

    public function add()
    {
        $users = User::all();

        return view(
            'page.projects.create',
            compact(
                'users'
            )
        );
    }

    public function store(createRequest $request)
    {
        $project = new Project();
        $project->fill($request->all());
        $project->save();

        return redirect()->route('projects.index');
    }

    public function edit($id)
    {
        $users = User::all();
        $project = Project::find($id);

        return view
        (
            'page.projects.edit',
            compact(
                'users',
                'project'
            )
        );
    }

    public function update($id, editRequest $request)
    {
        $project = Project::find($id);
        $project->fill($request->all());
        $project->save();

        return redirect()->route('projects.index');
    }

    public function delete($id)
    {
        $project = Project::find($id);
        $project->delete();
        $projectUsers = ProjectUser::all();

        foreach ($projectUsers as $projectUser) {
            if ($projectUser->projectId == $id) {
                $projectUser->delete();
            }
        }

        return redirect()->route('projects.index');
    }
}
