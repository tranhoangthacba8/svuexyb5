@extends('layouts/contentLayoutMaster')

@section('title','create report employee')

@section('content')
<div class="container">
    <h2>Create a report</h2>
    <form action="" method="">
        <div class="form-group" style="margin-bottom: 10px">
            <label for="projectName">Project name</label>
            <select name="projectName" id="projectName" class="form-select">
                <option>Other</option>
            </select>
        </div>
        <div class="form-group" style="margin-bottom: 10px">
            <label for="positionName">Position</label>
            <select name="positionName" id="positionName" class="form-select">
                <option>Developer</option>
            </select>
        </div>
        <div class="form-group" style="margin-bottom: 10px">
            <label for="workingTime">working time</label>
            <input name="workingTime" type="text" class="form-control" value="" id="workingTime" placeholder="Enter time">
        </div>
        <div class="form-group" style="margin-bottom: 10px">
            <label for="date">date</label>
            <input name="date" type="date" class="form-control" value="" id="date" placeholder="Enter date">
        </div>
        <div class="form-group" style="margin-bottom: 10px">
            <label for="workingType">working type</label>
            <select name="workingType" id="workingType" class="form-select">
                <option>offline</option>
            </select>
        </div>
        <div class="form-group" style="margin-bottom: 10px">
            <label for="detail">detail</label>
            <textarea class="form-control" rows="5" id="detail" name="detail"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
