@extends('layouts/contentLayoutMaster')

@section('title','create user')

@section('content')
    <div class="container">
        <h2>Create user</h2>
        <form action="" method="">
            <div class="form-group" style="margin-bottom: 10px">
                <label for="name">name</label>
                <input name="name" type="text" class="form-control" value="" id="name" placeholder="Enter name">
            </div>
            <div class="form-group" style="margin-bottom: 10px">
                <label for="email">email:</label>
                <input name="email" type="email" class="form-control" value="" id="email" placeholder="Enter email">
            </div>
            <div class="form-group" style="margin-bottom: 10px">
                <label for="password">password</label>
                <input name="password" type="password" class="form-control" value="" id="password" placeholder="Enter password">
            </div>
            <div class="form-group" style="margin-bottom: 10px">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="nam" value="1" checked>
                    <label class="form-check-label" for="inlineRadio1">Nam</label>
                </div>
                <div class="form-check form-check-inline" >
                    <input class="form-check-input" type="radio" name="gender" id="nu" value="2">
                    <label class="form-check-label" for="inlineRadio2">Nữ</label>
                </div>
            </div>
            <div class="form-group" style="margin-bottom: 10px">
                <label for="birthday">birthday</label>
                <input name="birthday" type="date" class="form-control" value="" id="birthday" placeholder="">
            </div>
            <div class="form-group" style="margin-bottom: 10px">
                <label for="tel">tel</label>
                <input name="tel" type="text" class="form-control" value="" id="tel" placeholder="Enter tel">
            </div>
            <div class="form-group" style="margin-bottom: 10px">
                <label for="roleName">role name:</label>
                <select name="role" id="roleName" class="form-select">
                    <option>Employee</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
