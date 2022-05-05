@extends('layouts/contentLayoutMaster')

@section('title','create project')

@section('content')
<div class="container">
    <h2>Create project</h2>
    <form action="{{route('managerProject.store')}}" method="post">
        @csrf
        <div class="form-group" style="margin-bottom: 10px">
            <label for="name">name</label>
            <input name="name" type="text" class="form-control" value="" id="name" placeholder="Enter name">
        </div>

        <div class="form-group" style="margin-bottom: 10px">
            <label for="detail">detail</label>
            <textarea class="form-control" rows="5" id="detail" name="detail"></textarea>
        </div>

        <div class="form-group" style="margin-bottom: 10px">
            <label for="duration">duration</label>
            <input name="duration" type="text" class="form-control" value="" id="duration" placeholder="Enter duration">: month
        </div>

        <div class="form-group" style="margin-bottom: 10px">
            <label for="name">revenue</label>
            <input name="revenue" type="text" class="form-control" value="" id="revenue" placeholder="Enter revenue">
        </div>

        <div class="form-group" style="margin-bottom: 10px">
            @php
               $inputMems = old('listMember',[]);
            @endphp
            <label for="listMember">list member</label>
            <select name="listMember[]" id="listMember" multiple class="form-select">
                @foreach($users as $user)
                <option>{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
