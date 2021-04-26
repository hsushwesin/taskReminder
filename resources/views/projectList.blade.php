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
<div class="table-wrapper-scroll-y my-custom-scrollbar ml-1 mr-1">
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm table-hover text-center"  cellspacing="0" width="100%">
        <thead class="text green">              
     
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Project Name</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>

        </thead>
        <tbody>
          @if ($projectList->count() == 0)
        <tr>
            <td colspan="11">No data to display.</td>
        </tr>
        @endif
        @php($i=1)      
        @foreach ($projectList as $projectLists)        
      
          <tr>
            <th scope="row">{{$i}}</th>
            <td>{{$projectLists['project_name']}}</td>


            <td><a class="btn btn-sm btn-warning" href='{{route("editproject", $projectLists ->id)}}'>Edit</a></td>
            <td><a class="btn btn-sm btn-danger" href='{{route("deleteproject", $projectLists->id)}}'>Delete</a></td>
                       
          </tr>
           @php($i++)
          @endforeach  


        </tbody>
      </table>
      </div>
      </div>
    </div>
  </div>

@endsection