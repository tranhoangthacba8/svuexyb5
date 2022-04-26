@extends('layouts/contentLayoutMaster')

@section('title','list user')

@section('content')
    <div class="container">
        <a href="#" class="btn btn-success" style="margin-bottom: 10px">create report</a>
        <table class="table">
            <thead>
                 <tr>
                     <th>name</th>
                     <th>Email</th>
                     <th>tel</th>
                     <th>address</th>
                     <th>Action</th>
                 </tr>
            </thead>
            <tbody>
                 <tr>
                     <td>tran viet hoang</td>
                     <th>hoangtv@beetsoft.com.vn</th>
                     <td>0326915328</td>
                     <td>Yen Bai</td>
                     <td>
                         <button class="btn btn-primary">Edit</button>
                         <button class="btn btn-danger">delete</button>
                     </td>
                 </tr>
            </tbody>
        </table>
    </div>
@endsection
