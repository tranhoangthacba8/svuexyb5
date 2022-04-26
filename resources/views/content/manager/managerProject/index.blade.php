@extends('layouts/contentLayoutMaster')

@section('title','list project')

@section('content')
<div class="container">
    <a href="#" class="btn btn-success" style="margin-bottom: 10px">create project</a>
    <table class="table">
        <thead>
            <tr>
                <th>project name</th>
                <th>detail</th>
                <th>duration</th>
                <th>revenue</th>
                <th>member list</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
             <tr>
                 <td>the first project</td>
                 <td>cong gang len</td>
                 <td>6 month</td>
                 <td>10000 $</td>
                 <td>
                     <ol>
                         <li>tran viet hoang</li>
                         <li>phan phi hung</li>
                     </ol>
                 </td>
                 <td>
                     <button class="btn btn-primary">Edit</button>
                     <button class="btn btn-danger">delete</button>
                 </td>
             </tr>
        </tbody>
    </table>
</div>
@endsection
