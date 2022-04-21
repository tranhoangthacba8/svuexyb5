@extends('layouts/contentLayoutMaster')

@section('title','report employee')

@section('content')
   <div class="container">
         <a href="#" class="btn btn-success" style="margin-bottom: 10px">create report</a>
         <table class="table">
             <thead>
                <tr>
                    <th>project name</th>
                    <th>position</th>
                    <th>working time</th>
                    <th>date</th>
                    <th>working type</th>
                    <th>detail</th>
                    <th>Action</th>
                </tr>
             </thead>
             <tbody>
                <tr>
                    <th>other</th>
                    <th>developer</th>
                    <th>8</th>
                    <th>20/11/2021</th>
                    <th>remote</th>
                    <th>I want to work offline</th>
                    <th>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">delete</button>
                    </th>
                </tr>
             </tbody>
         </table>
   </div>
@endsection
