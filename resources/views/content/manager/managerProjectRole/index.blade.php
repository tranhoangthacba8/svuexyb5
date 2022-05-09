@extends('layouts/contentLayoutMaster')

@section('title','list project role')

@section('content')
    <div class="container">
        <a href="{{route('projectRole.create')}}" class="btn btn-success" style="margin-bottom: 10px">create</a>
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
                    <td>{{$projectRole->User->name}}</td>
                    <td>{{$projectRole->Project->name}}</td>
                    <td>{{$projectRole->Position->type}}</td>
                    <td>
                        <a href="{{route('projectRole.edit',$projectRole->id)}}" class="btn btn-primary">Edit</a>
                        <form class="frm-delete" action="{{route('projectRole.delete',$projectRole->id)}}" method="post">
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
                let isDelete = confirm('Do you want to delete this Project role?');
                if (isDelete) {
                    $(this).parents('form').submit();
                }
            });
        })
    </script>
@endsection
