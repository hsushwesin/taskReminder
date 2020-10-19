@extends('layout.layout')
@section('content')
@if (Session("delete"))   
<div class="alert alert-danger">
  {{Session("delete")}}
</div>
@endif

{{-- <div class="container"> --}}

    <table class="table table-hover">
        <thead>    
            
     
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Input Date</th>
            <th scope="col">Project Name</th>
            <th scope="col">Task Name</th>
            <th scope="col">Task Detail</th>
            <th scope="col">Type of Task</th>
            <th scope="col">workday</th>
            <th scope="col">Weekend</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Assigned Person</th>
            <th scope="col">Assigned To</th>
            <th scope="col">Remark</th>        
            
          </tr>

        </thead>
        <tbody>
        @foreach ($complete as $tasks)        
      
          <tr>
    
          @csrf
            <th scope="row">{{$tasks['id']}}</th>
            <td>{{$tasks['input_date']}}</td>
            <td>{{$tasks['project']}}</td>
            <td>{{$tasks['task_name']}}</td>
            <td>{{$tasks['task_detail']}}</td>
            <td>{{$tasks['type_task']}}</td>
            <td>{{$tasks['workday']}}</td>
            <td>{{$tasks['weekend']}}</td>
            <td>{{$tasks['start_date']}}</td>
            <td>{{$tasks['end_date']}}</td>
            <td>{{$tasks['assigned_person']}}</td>  
            <td>{{$tasks['assigned_to']}}</td>
            <td>{{$tasks['message']}}</td>   
 
           </form>            
          </tr>
      
          @endforeach  


        </tbody>
      </table>
    

@endsection