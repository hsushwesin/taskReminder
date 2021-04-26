@extends('layout.layout')
@section('content')
@if (Session("delete"))   
<div class="alert alert-danger">
  {{Session("delete")}}
</div>
@endif

{{-- <div class="container"> --}}
<div class="table-wrapper-scroll-y my-custom-scrollbar ml-1 mr-1">
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm table-hover text-center"  cellspacing="0" width="100%">
        <thead class="text green">    
            
     
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Complete Date</th>
            <th scope="col">Project Name</th>
            <th scope="col">Task Name</th>
            <th scope="col">Task Detail</th>
            <th scope="col">Type of Task</th>           
            <th scope="col">Weekend</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th> 
            <th scope="col">Assigned Person</th>
            <th scope="col">Assigned To</th>
            <th scope="col">Remark</th>        
            
          </tr>

        </thead>
        <tbody>
        @if ($complete->count() == 0)
        <tr>
            <td colspan="12">No data to display.</td>
        </tr>
        @endif   
        @php($i=1)    
           
        @foreach ($complete as $tasks)  
              
      
          <tr>
    
          @csrf
            <th scope="row">{{$i}}</th>
            <td>{{$tasks['completedate']}}</td>
            <td>{{$tasks->Project->project_name}}</td>
            <td>{{$tasks['task_name']}}</td>
            <td>{{$tasks['task_detail']}}</td>
            <td>{{$tasks['type_task']}}</td>                          
           
            @if ($tasks['weekend'] <> "Na")<td>{{$tasks['weekend']}}</td>
            @else <td>---</td>     
            @endif             

            @if ($tasks['start_date'] <> "Na")<td>{{$tasks['start_date']}}</td> 
            @else <td>---</td>     
            @endif 

            @if ($tasks['end_date'] <> "Na")<td>{{$tasks['end_date']}}</td>  
            @else <td>---</td>                   
            @endif
            <td>{{$tasks->assign->person}}</td>            
            <td>{{$tasks->assignto->to}}</td>
            <td>{{$tasks['remark']}}</td>   
 
           </form>            
          </tr>
        @php($i++)
        @endforeach  


        </tbody>
      </table>
      </div>
    

@endsection