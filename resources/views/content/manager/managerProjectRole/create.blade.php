@extends('layouts/contentLayoutMaster')

@section('title','create project role')

@section('content')
    <div class="container">
        <h2>Create project role</h2>
        <form action="{{route('projectRole.store')}}" method="post">
            @csrf
            <div class="form-group" style="margin-bottom: 10px">
                <label for="projectName">project name:</label>
                <select name="project" id="projectName" class="form-select">
                    @foreach($projects as $project)
                    <option {{ old('projectId') == $project->id ? 'selected' : '' }}  value="{{$project->id}}">{{$project->name}}</option>
                    @endforeach
                </select>
                @error('project')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="userName">user name:</label>
                <select name="user" id="userName" class="form-select">
                    @foreach($users as $user)
                    <option {{ old('userId') == $user->id ? 'selected' : '' }} value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                @error('user')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="positionName">position name:</label>
                <select name="position" id="positionName" class="form-select">
                    @foreach($positions as $position)
                    <option {{ old('positionId') == $position->id ? 'selected' : '' }} value="{{$position->id}}">{{$position->type}}</option>
                    @endforeach
                </select>
                @error('position')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
