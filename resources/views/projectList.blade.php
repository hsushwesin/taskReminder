@extends('layout.layout')
@section('content')


<div class="container">
    <div class="card mt-4">
    @if (Session("delete"))   
    <div class="alert alert-danger">
    {{Session("delete")}}
    </div>
    @endif
    <h5 class="card-header blue white-text text-center py-2">
        <strong>Project Name</strong>
    </h5>
    <div class="card-body px-lg-3 pt-10">

    <table class="table table-hover">
        <thead>              
     
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Project Name</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>

        </thead>
        <tbody>
        @foreach ($projectList as $projectLists)        
      
          <tr>
            <th scope="row">{{$projectLists['id']}}</th>
            <td>{{$projectLists['project_name']}}</td>


            <td><a class="btn btn-sm btn-warning" href='{{route("editproject", $projectLists ->id)}}'>Edit</a></td>
            <td><a class="btn btn-sm btn-danger" href='{{route("deleteproject", $projectLists->id)}}'>Delete</a></td>
                       
          </tr>
          @endforeach  


        </tbody>
      </table>
      </div>
    </div>
  </div>

@endsection