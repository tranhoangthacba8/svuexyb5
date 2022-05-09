@extends('layouts/contentLayoutMaster')

@section('title','create project')

@section('content')
<div class="container">
    <h2>Create project</h2>
    <form action="{{route('project.store')}}" method="post">
        @csrf
        <div class="form-group" style="margin-bottom: 10px">
            <label for="name">name</label>
            <input name="name" type="text" class="form-control" value="{{old('name')}}" id="name" placeholder="Enter name">
            @error('name')
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

        <div class="form-group" style="margin-bottom: 10px">
            <label for="duration">duration</label>
            <input name="duration" type="text" class="form-control" value="{{old('duration')}}" id="duration" placeholder="Enter duration">: month
            @error('duration')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group" style="margin-bottom: 10px">
            <label for="name">revenue</label>
            <input name="revenue" type="text" class="form-control" value="{{old('revenue')}}" id="revenue" placeholder="Enter revenue">
            @error('revenue')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
