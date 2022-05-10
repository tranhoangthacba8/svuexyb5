@extends('layouts/contentLayoutMaster')

@section('title','edit report employee')

@section('content')
    <div class="container">
        <h2>Edit a report</h2>
        <form action="{{route('report.update',$userId, $report->id)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group" style="margin-bottom: 10px">
                <label for="projectName">Project name</label>
                <select name="projectName" id="projectName" class="form-select">
                    @foreach($projects as $project)
                        <option {{ $report->projectId == $project->id ? 'selected' : '' }} value="{{ $project->id }}">{{$project->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 10px">
                <label for="positionName">Position</label>
                <select name="positionName" id="positionName" class="form-select">
                    @foreach($positions as $position)
                        <option {{ $report->positionId == $position->id ? 'selected' : '' }} value="{{ $position->id }}">{{$position->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 10px">
                <label for="workingTime">working time</label>
                <input name="title" type="text" class="form-control" value="{{old('workingTime',$report->workingTime)}}" id="workingTime" placeholder="Enter time">
            </div>
            <div class="form-group" style="margin-bottom: 10px">
                <label for="date">date</label>
                <input name="date" type="date" class="form-control" value="{{old('date'), $report->date}}" id="date" placeholder="Enter date">
            </div>
            <div class="form-group" style="margin-bottom: 10px">
                <label for="workingType">working type</label>
                <select name="workingType" id="workingType" class="form-select">
                    <select name="workingType" id="workingType" class="form-select">
                        <option {{$report->workingType == 1 ? 'selected' : ''}} value="1">offSite</option>
                        <option {{$report->workingType == 2 ? 'selected' : ''}} value="2">Remote</option>
                        <option {{$report->workingType == 3 ? 'selected' : ''}} value="3">Onsite</option>
                        <option {{$report->workingType == 4 ? 'selected' : ''}} value="4">Off</option>
                    </select>
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 10px">
                <label for="detail">detail</label>
                <textarea class="form-control" rows="5" id="detail" name="detail"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
