<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\ProjectUser;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = UserController::all();

        return view('content.manager.managerUser.index',
            compact('users'));
    }
    public function add(){
        $roles = Role::all();

        return view('content.manager.managerUser.createUser',
            compact('roles'));
    }
    public function store(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $gender = $request->input('gender');
        $birthday = $request->input('birthday');
        $role = $request->input('role');

        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->gender = $gender;
        $user->birthday = $birthday;
        $user->roleId = $role;
        $user->save();

        return redirect()->route('managerUser.index');
    }
    public function edit($id){
        $user = User::find($id);

        return view('content.manager.managerUser.editUser',
            compact('user'));
    }
    public function update($id, Request $request){
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

        return redirect()->route('managerUser.index');
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

        return redirect()->route('managerUser.index');
    }
}
