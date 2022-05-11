@extends('layouts/contentLayoutMaster')

@section('title','create project role')

@section('content')
    <div class="container">
        <h2>Create project role</h2>
        <form action="{{route('project-roles.store')}}" method="post">
            @csrf
            <div class="form-group" style="margin-bottom: 10px">
                <label for="projectId">project name:</label>
                <select name="projectId" id="projectId" class="form-select">
                    @foreach($projects as $project)
                        <option
                            {{ old('projectId') == $project->id ? 'selected' : '' }}  value="{{$project->id}}">{{$project->name}}</option>
                    @endforeach
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
                            {{ old('userId') == $user->id ? 'selected' : '' }} value="{{$user->id}}">{{$user->name}}</option>
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
                            {{ old('positionId') == $position->id ? 'selected' : '' }} value="{{$position->id}}">{{$position->type}}</option>
                    @endforeach
                </select>
                @error('positionId')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
