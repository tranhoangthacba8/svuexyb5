@extends('layouts/contentLayoutMaster')

@section('title','edit project role')

@section('content')
    <div class="container">
        <h2>Edit project role</h2>
        <form action="{{route('projectRoles.update',$projectUser->id)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group" style="margin-bottom: 10px">
                <label for="projectId">project name:</label>
                <select name="projectId" id="projectId" class="form-select">
                    @foreach($projects as $project)
                        <option
                            {{ $projectUser->projectId == $project->id ? 'selected' : '' }}  value="{{$project->id}}">{{$project->name}}</option>
                    @endforeach>
                </select>
                @error('projectId')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="userId">user name:</label>
                <select name="userId" id="userId" class="form-select">
                    @foreach($users as $user)
                        <option
                            {{ $projectUser->userId == $user->id ? 'selected' : '' }} value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                @error('userId')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="positionId">position name:</label>
                <select name="positionId" id="positionId" class="form-select">
                    @foreach($positions as $position)
                        <option
                            {{ $projectUser->positionId == $position->id ? 'selected' : '' }} value="{{$position->id}}">{{$position->type}}</option>
                    @endforeach
                </select>
                @error('positionId')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
