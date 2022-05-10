@extends('layouts/contentLayoutMaster')

@section('title','report employee')

@section('content')
    <div class="container">
        <a href="{{route('report.create')}}" class="btn btn-success" style="margin-bottom: 10px">create report</a>
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
                        <a href="{{route('report.edit',$report->id)}}" class="btn btn-primary"
                           style="margin-bottom: 10px">Edit</a>
                        <form method="POST" action="{{route('report.delete',$report->id)}}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-delete" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @section('page-script')
        <script>
            $(document).ready(function () {
                const deleteRole = function (event) {
                    event.preventDefault();

                    Swal.fire({
                        title: 'Bạn có muốn xóa Vai Trò này',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Không!',
                        confirmButtonText: 'Có!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(this).parent('form').submit();
                        }
                    });
                }
                // Delete Role
                $(document).on('click', '.btn-delete', deleteRole);
                console.log($);
            });
        </script>
    @endsection
@endsection
