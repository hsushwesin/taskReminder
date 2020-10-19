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
        <strong>Assign Person Name List</strong>
    </h5>
    <div class="card-body px-lg-3 pt-10">

    <table class="table table-hover">
        <thead>              
     
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Assign Person</th>
            <th scope="col">ID Number</th>
            <th scope="col">Position</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>

        </thead>
        <tbody>
        @foreach ($assignPersonlist as $assignPersonlists)        
      
          <tr>
            <th scope="row">{{$assignPersonlists['id']}}</th>
            <td>{{$assignPersonlists['person']}}</td>
            <td>{{$assignPersonlists['id_number']}}</td>
            <td>{{$assignPersonlists['position']}}</td>

            <td><a class="btn btn-sm btn-warning" href='{{route("editAssignperson", $assignPersonlists ->id)}}'>Edit</a></td>
            <td><a class="btn btn-sm btn-danger" href='{{route("deleteAssignperson", $assignPersonlists->id)}}'>Delete</a></td>
                       
          </tr>
          @endforeach  


        </tbody>
      </table>
      </div>
    </div>
  </div>

@endsection