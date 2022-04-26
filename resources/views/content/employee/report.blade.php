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
                    <td>other</td>
                    <td>developer</td>
                    <td>8</td>
                    <td>20/11/2021</td>
                    <td>remote</td>
                    <td>I want to work offline</td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">delete</button>
                    </td>
                </tr>
             </tbody>
         </table>
   </div>
@endsection
