@extends('layout.layout')
@section('content')
    @if(Session("success"))
    <div class="alert alert-success">
        {{Session('success')}}
    </div>
    @endif
     @error("progress")
      <div class="alert alert-danger">
        {{$message}}
    </div>                  
     @enderror  
{{-- <div class="container"> --}}
{{-- @if($update->count > 0) --}}
<div class="table-wrapper-scroll-y my-custom-scrollbar ml-1 mr-1">
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm table-hover text-center"  cellspacing="0" width="100%">
        <thead class="text green">                
     
          <tr>
            <th scope="col">No.</th>            
            <th scope="col">Project Name</th>
            <th scope="col">Task Name</th>            
            <th scope="col">Type of Task</th>
            <th scope="col">Weekend</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>           
            <th scope="col">Progress</th> 
            <th scope="col">Complete Remark</th>  
            <th scope="col">Comfirm</th>           
            
          </tr>

        </thead>
        <tbody>
           @if ($update->count() == 0)
        <tr>
            <td colspan="10">No data to display.</td>
        </tr>
        @endif   
        @php($i=1)    
        @foreach ($update as $updates)      
      
          <tr>
          <form class="text-center" style="color: #757575;" action="{{route("comfirmupdate", $updates->id)}}'" method="post">
          @csrf
            <th scope="row">{{$i}}</th>
            <td>{{$updates->Project->project_name}}</td>
            <td>{{$updates['task_name']}}</td>
            <td>{{$updates['type_task']}}</td>                          
           
            @if ($updates['weekend'] <> "Na")<td>{{$tupdatesask['weekend']}}</td>
            @else <td>---</td>     
            @endif             

            @if ($updates['start_date'] <> "Na")<td>{{$updates['start_date']}}</td> 
            @else <td>---</td>     
            @endif 

            @if ($updates['end_date'] <> "Na")<td>{{$updates['end_date']}}</td>  
            @else <td>---</td>                   
            @endif    
            <td>        
              <select class="mdb-select form-control" name="progress">                
                <option value="" selected>{{$updates['progress']}}</option>
                <option value="100">100 %</option>
                <option value="80">80 %</option>
                <option value="60">60 %</option>
                <option value="40">40 %</option>
                <option value="20">20 %</option>
                <option value="NS">0 %</option>
                <option value="OH">-</option>
            </select>
  
            </td>  
            <td><textarea type="text" id="" class="form-control" name="remark" rows="1">{{$updates['remark']}}</textarea></td>
            <td><button class="btn btn-sm btn-success" type="submit">Comfirm</button></td>  

           </form>            
          </tr>
          @php($i++)
      
          @endforeach  


        </tbody>
      </table>
      </div>
  {{-- @else
  <p> No users found..</p>
@endif   --}}

@endsection