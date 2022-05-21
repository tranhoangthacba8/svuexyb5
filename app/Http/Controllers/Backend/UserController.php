<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\createRequest;
use App\Http\Requests\User\editRequest;
use App\Models\ProjectUser;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        if(Gate::denies('user.manager')){
            abort(403);
        }

        $users = User::all();

        return view(
            'page.users.index',
            compact('users')
        );
    }

    public function add()
    {
        if(Gate::denies('user.manager')){
            abort(403);
        }

        $roles = Role::all();

        return view(
            'page.users.create',
            compact(
                'roles'
            )
        );
    }

    public function store(createRequest $request)
    {
        if(Gate::denies('user.manager')){
            abort(403);
        }

        $user = new User();
        $user->fill($request->all());
        $user->save();

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        if(Gate::denies('user.manager')){
            abort(403);
        }

        $user = User::find($id);
        $roles = Role::all();

        return view(
            'page.users.edit',
            compact(
                'user',
                'roles'
            )
        );
    }

    public function update($id, editRequest $request)
    {
        if(Gate::denies('user.manager')){
            abort(403);
        }

        $user = User::find($id);

        $user->fill($request->all());
        $user->save();

        return redirect()->route('users.index');
    }

    public function delete($id)
    {
        if(Gate::denies('user.manager')){
            abort(403);
        }

        $user = User::find($id);
        $user->delete();
        $projectUsers = ProjectUser::all();

        foreach ($projectUsers as $projectUser) {
            if ($projectUser->userId == $id) {
                $projectUser->delete();
            }
        }

        return redirect()->route('users.index');
    }
}
