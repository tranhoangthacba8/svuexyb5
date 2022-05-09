@extends('layouts/contentLayoutMaster')

@section('title','edit user')

@section('content')
    <div class="container">
        <h2>Edit user</h2>
        <form action="{{route('user.update',$user->id)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group" style="margin-bottom: 10px">
                <label for="name">name</label>
                <input name="name" type="text" class="form-control" value="{{old('name',$user->name)}}" id="name" placeholder="Enter name">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="email">email:</label>
                <input name="email" type="email" class="form-control" value="{{old('email',$user->email)}}" id="email" placeholder="Enter email">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="password">password</label>
                <input name="password" type="password" class="form-control" value="{{old('password',$user->password)}}" id="password" placeholder="Enter password">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="nam"  {{ $user->gender == 1 ? 'checked' : '' }} value="1" checked>
                    <label class="form-check-label" for="inlineRadio1">Nam</label>
                </div>
                <div class="form-check form-check-inline" >
                    <input class="form-check-input" type="radio" name="gender" id="nu"  {{ $user->gender == 2 ? 'checked' : '' }} value="2">
                    <label class="form-check-label" for="inlineRadio2">Nữ</label>
                </div>
                @error('gender')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="birthday">birthday</label>
                <input name="birthday" type="date" class="form-control" value="{{old('birthday',$user->birthday)}}" id="birthday" placeholder="">
                @error('birthday')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="tel">tel</label>
                <input name="tel" type="text" class="form-control" value="{{old('tel',$user->tel)}}" id="tel" placeholder="Enter tel">
                @error('tel')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="roleName">role name:</label>
                <select name="roleName" id="roleName" class="form-select">
                    @foreach($roles as $role)
                        <option {{ $user->roleId == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{$role->name}}</option>
                    @endforeach
                </select>
                @error('roleName')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
