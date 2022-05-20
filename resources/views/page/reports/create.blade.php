@extends('layouts/contentLayoutMaster')

@section('title','create report employee')

@section('content')
    <div class="container">
        <h2>Create a report</h2>
        <form action="{{route('report.store')}}" method="post">
            @csrf
            <div class="form-group" style="margin-bottom: 10px">
                <label for="projectId">Project name</label>
                <select name="projectId" id="projectId" class="form-select">
                    @foreach($projects as $project)
                        <option
                            {{ old('projectId') == $project->id ? 'selected' : '' }} value="{{ $project->id }}">{{$project->name}}</option>
                    @endforeach
                </select>
                @error('projectName')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="positionId">Position</label>
                <select name="positionId" id="positionId" class="form-select">
                    @foreach($positions as $position)
                        <option
                            {{ old('positionId') == $position->id ? 'selected' : '' }} value="{{ $position->id }}">{{$position->type}}</option>
                    @endforeach
                </select>
                @error('positionName')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="workingTime">working time</label>
                <input name="workingTime" type="text" class="form-control" value="{{old('workingTime')}}"
                       id="workingTime" placeholder="Enter time">
                @error('workingTime')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="date">date</label>
                <input name="date" type="date" class="form-control" value="{{old('date')}}" id="date"
                       placeholder="Enter date">
                @error('date')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="workingType">working type</label>
                <select name="workingType" id="workingType" class="form-select">
                    <option {{old('workingType') == 1 ? 'selected' : ''}} value="1">offSite</option>
                    <option {{old('workingType') == 2 ? 'selected' : ''}} value="2">Remote</option>
                    <option {{old('workingType') == 3 ? 'selected' : ''}} value="3">Onsite</option>
                    <option {{old('workingType') == 4 ? 'selected' : ''}} value="4">Off</option>
                </select>
                @error('workingType')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 10px">
                <label for="detail">detail</label>
                <textarea class="form-control" rows="5" id="detail" name="detail">{{old('detail')}}</textarea>
                @error('detail')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
