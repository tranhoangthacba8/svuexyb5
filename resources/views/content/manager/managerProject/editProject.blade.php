@extends('layouts/contentLayoutMaster')

@section('title','edit project')

@section('content')
    <div class="container">
        <h2>Update project</h2>
        <form action="{{route('managerProject.update')}}" method="post">
            @csrf
            @method('put')
            <div class="form-group" style="margin-bottom: 10px">
                <label for="name">name</label>
                <input name="name" type="text" class="form-control" value="{{old('name', $project->name)}}" id="name" placeholder="Enter name">
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="detail">detail</label>
                <textarea class="form-control" rows="5" id="detail" name="detail">{{old('detail', $project->detail)}}</textarea>
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="duration">duration</label>
                <input name="duration" type="text" class="form-control" value="{{old('duration', $project->duration)}}" id="duration" placeholder="Enter duration">: month
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="name">revenue</label>
                <input name="revenue" type="text" class="form-control" value="{{old('revenue', $project->revenue)}}" id="revenue" placeholder="Enter revenue">
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="workingType">list member</label>
                <select name="listMember[]" id="listMember" multiple class="form-select">
                    @foreach($users as $user)
                        <option {{ in_array($user->id, $userIds) ? 'selected' : '' }} value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
