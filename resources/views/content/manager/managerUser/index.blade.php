@extends('layouts/contentLayoutMaster')

@section('title','list user')

@section('content')
    <div class="container">
        <a href="{{route('user.create')}}" class="btn btn-success" style="margin-bottom: 10px">create user</a>
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
                         <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                         <form class="frm-delete" action="{{route('user.delete',$user->id)}}" method="post">
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
                let isDelete = confirm('Do you want to delete this User?');
                if (isDelete) {
                    $(this).parents('form').submit();
                }
            });
        })
    </script>
@endsection
