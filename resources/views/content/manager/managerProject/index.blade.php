@extends('layouts/contentLayoutMaster')

@section('title','list project')

@section('content')
<div class="container">
    <a href="{{route('project.create')}}" class="btn btn-success" style="margin-bottom: 10px">create project</a>
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
                               <li>{{$projectUser->User->name}}</li>
                           </ul>
                         @endif
                     @endforeach
                 </td>
                 <td>
                     <a href="{{route('project.edit', $project->id)}}" class="btn btn-primary">Edit</a>
                     <form class="frm-delete" action="{{route('project.delete',$project->id)}}" method="post">
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
            let isDelete = confirm('Do you want to delete this Project?');
            if (isDelete) {
                $(this).parents('form').submit();
            }
        });
    })
</script>
@endsection
