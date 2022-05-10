@extends('layouts/contentLayoutMaster')

@section('title','report employee')

@section('content')
   <div class="container">
         <a href="{{route('report.create',$userId)}}" class="btn btn-success" style="margin-bottom: 10px">create report</a>
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
                @foreach($reports as $report)
                <tr>
                    <td>{{$report->Project->name}}</td>
                    <td>{{$report->Position->type}}</td>
                    <td>{{$report->workingTime}}</td>
                    <td>{{$report->date}}</td>
                    <td>{{$report->workingType}}</td>
                    <td>{{$report->detail}}</td>
                    <td>
                        <a href="editReport/{{$userId}}/{{$report->id}}" class="btn btn-primary" style="margin-bottom: 10px">Edit</a>
                        <form class="frm-delete" action="{{route('report.delete',$report->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-delete" type="button">delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
             </tbody>
         </table>
   </div>
   <script>
       $(document).ready(function () {
           $('.btn-delete').click(function () {
               let isDelete = confirm('Do you want to delete this report?');
               if (isDelete) {
                   $(this).parents('form').submit();
               }
           });
       })
   </script>
@endsection
