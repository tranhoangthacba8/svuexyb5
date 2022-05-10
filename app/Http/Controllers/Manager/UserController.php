<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManagerUser\createRequest;
use App\Http\Requests\ManagerUser\editRequest;
use App\Models\ProjectUser;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();

        return view(
            'content.manager.managerUser.index',
            compact('users')
        );
    }
    public function add(){
        $roles = Role::all();

        return view(
            'content.manager.managerUser.createUser',
            compact('roles')
        );
    }
    public function store(createRequest $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $gender = $request->input('gender');
        $birthday = $request->input('birthday');
        $tel = $request->input('tel');
        $role = $request->input('role');

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->gender = $gender;
        $user->birthday = $birthday;
        $user->tel = $tel;
        $user->roleId = $role;
        $user->save();

        return redirect()->route('user.index');
    }
    public function edit($id){
        $user = User::find($id);
        $roles = Role::all();

        return view(
            'content.manager.managerUser.editUser',
            compact('user','roles')
        );
    }
    public function update($id, editRequest $request){
        $user = User::find($id);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $gender = $request->input('gender');
        $birthday = $request->input('birthday');
        $role = $request->input('role');

        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->gender = $gender;
        $user->birthday = $birthday;
        $user->roleId = $role;
        $user->save();

        return redirect()->route('user.index');
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        $projectUsers = ProjectUser::all();

        foreach ($projectUsers as $projectUser){
            if($projectUser->userId == $id){
                $projectUser->delete();
            }
        }

        return redirect()->route('user.index');
    }
}
