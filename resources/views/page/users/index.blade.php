@extends('layouts/contentLayoutMaster')

@section('title','list user')

@section('content')
    <div class="container">
        <a href="{{route('users.create')}}" class="btn btn-success" style="margin-bottom: 10px">create user</a>
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
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <th>{{$user->email}}</th>
                    <td>{{$user->tel}}</td>
                    <td>{{$user->address}}</td>
                    <td>
                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                        <form class="frm-delete" action="{{route('users.delete',$user->id)}}" method="post">
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
                        title: 'Do you want delete this a user',
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
