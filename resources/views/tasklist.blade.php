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
        @foreach ($task as $tasks)        
      
          <tr>
            <th scope="row">{{$tasks['id']}}</th>
            <td>{{$tasks['input_date']}}</td>
            <td>{{$tasks['project']}}</td>
            <td>{{$tasks['task_name']}}</td>
            <td>{{$tasks['task_detail']}}</td>
            <td>{{$tasks['type_task']}}</td>

            @if ($tasks['workday'] <> "Na")<td>{{$tasks['workday']}}</td>                      
            @endif
            @if ($tasks['workday'] == "Na")<td>-----</td>                 
            @endif
            @if ($tasks['weekend'] <> "Na")<td>{{$tasks['weekend']}}</td>                      
            @endif
            @if ($tasks['weekend'] == "Na")<td>-----</td>                 
            @endif            
            @if ($tasks['start_date'] <> "Na")<td>{{$tasks['start_date']}}</td>                      
            @endif
            @if ($tasks['start_date'] == "Na")<td>-----</td>                 
            @endif   
            @if ($tasks['end_date'] <> "Na")<td>{{$tasks['end_date']}}</td>                      
            @endif
            @if ($tasks['end_date'] == "Na")<td>-----</td>                 
            @endif  

            {{-- @foreach ($assignshow as $assignshows)
            <td>{{$assignshows->a_person}}</td>  
            @endforeach --}}
            <td>{{$tasks['assigned_person']}}</td>
            
            <td>{{$tasks['assigned_to']}}</td>
            <td>{{$tasks['message']}}</td>            

            {{-- <td><a class="btn btn-sm btn-warning" href='{{route("edit", $tasks ->id)}}'>Edit Order</a></td>
            <td><a class="btn btn-sm btn-success" href='{{route("delete", $tasks->id)}}'>Order Comfirm</a></td> --}}
                       
          </tr>
          @endforeach  


        </tbody>
      </table>

@endsection