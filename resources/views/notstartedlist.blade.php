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
            {{-- <th scope="col">Complete Date</th> --}}
            <th scope="col">Project Name</th>
            <th scope="col">Task Name</th>
            <th scope="col">Task Detail</th>
            <th scope="col">Type of Task</th>
            <th scope="col">Weekend</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>           
            <th scope="col">Progress</th>
            <th scope="col">Remark</th>  
            <th scope="col">Comfirm</th>        

            <th scope="col">Assigned Person</th>
            <th scope="col">Assigned To</th>
            <th scope="col">Remark</th>        
            
          </tr>

        </thead>
        <tbody>
         @if ($notstarted->count() == 0)
        <tr>
            <td colspan="14">No data to display.</td>
        </tr>
        @endif   
        @php($i=1)    
        @foreach ($notstarted as $tasks)        
      
          <tr>
          <form class="text-center" style="color: #757575;" action="{{route("comfirmupdate", $tasks->id)}}'" method="post">  
          @csrf
            <th scope="row">{{$id}}</th>
            {{-- <td>{{$tasks['completedate']}}</td> --}}
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
 
            <td>        
              <select class="mdb-select form-control" name="progress">                
                <option value="{{$tasks['progress']}}" selected>{{$tasks['progress']}}</option>
                <option value="100">100 %</option>
                <option value="80">80 %</option>
                <option value="60">60 %</option>
                <option value="40">40 %</option>
                <option value="20">20 %</option>
                <option value="NS">0 %</option>
                <option value="OH">-</option>
            </select>
  
            </td>  
            <td><textarea type="text" id="" class="form-control" name="remark" rows="1">{{$tasks['remark']}}</textarea></td>
            <td><button class="btn btn-sm btn-success" type="submit">Comfirm</button></td>  

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