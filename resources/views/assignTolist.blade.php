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
        @foreach ($assignTolist as $assignTolists)        
      
          <tr>
            <th scope="row">{{$assignTolists['id']}}</th>
            <td>{{$assignTolists['to']}}</td>
            <td>{{$assignTolists['id_number']}}</td>
            <td>{{$assignTolists['position']}}</td>

            <td><a class="btn btn-sm btn-warning" href='{{route("editassignTo", $assignTolists ->id)}}'>Edit</a></td>
            <td><a class="btn btn-sm btn-danger" href='{{route("deleteassignTo", $assignTolists->id)}}'>Delete</a></td>
                       
          </tr>
          @endforeach  


        </tbody>
      </table>
      </div>
    </div>
  </div>

@endsection