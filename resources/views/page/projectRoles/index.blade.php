@extends('layouts/contentLayoutMaster')

@section('title','list project role')

@section('content')
    <div class="container">
        <a href="{{route('projectRoles.create')}}" class="btn btn-success" style="margin-bottom: 10px">create</a>
        <table class="table">
            <thead>
            <tr>
                <th>name project</th>
                <th>name user</th>
                <th>name position</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projectRoles as $projectRole)
                <tr>
                    <td>{{$projectRole->user->name}}</td>
                    <td>{{$projectRole->project->name}}</td>
                    <td>{{$projectRole->position->type}}</td>
                    <td>
                        <a href="{{route('projectRoles.edit',$projectRole->id)}}" class="btn btn-primary">Edit</a>
                        <form class="frm-delete" action="{{route('projectRoles.delete',$projectRole->id)}}"
                              method="post">
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
                        title: 'Do you want delete this a project role',
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
