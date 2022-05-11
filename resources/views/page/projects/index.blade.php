@extends('layouts/contentLayoutMaster')

@section('title','list project')

@section('content')
    <div class="container">
        <a href="{{route('projects.create')}}" class="btn btn-success" style="margin-bottom: 10px">create project</a>
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
            @foreach($projects as $project)
                <tr>
                    <td>{{$project->name}}</td>
                    <td>{{$project->detail}}</td>
                    <td>{{$project->duration}} :month</td>
                    <td>{{$project->revenue}} $</td>
                    <td>
                        @foreach($projectUsers as $projectUser)
                            @if($projectUser->projectId == $project->id)
                                <ul>
                                    <li>{{$projectUser->user->name}}</li>
                                </ul>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <a href="{{route('projects.edit', $project->id)}}" class="btn btn-primary">Edit</a>
                        <form class="frm-delete" action="{{route('projects.delete',$project->id)}}" method="post">
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
    @section('page-script')
        <script>
            $(document).ready(function () {
                const deleteRole = function (event) {
                    event.preventDefault();

                    Swal.fire({
                        title: 'Do you want delete this a report',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'cancel!',
                        confirmButtonText: 'yes!'
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
