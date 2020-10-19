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
            <th scope="col">Project Name</th>
            <th scope="col">Task Name</th>            
            <th scope="col">Type of Task</th>
            <th scope="col">Progress</th> 
            <th scope="col">Complete Remark</th>            
            
          </tr>

        </thead>
        <tbody>
        @foreach ($onhold as $updates)        
      
          <tr>
          <form class="text-center" style="color: #757575;" action="{{route("comfirmupdate", $updates->id)}}'" method="post">
          @csrf
            <th scope="row">{{$updates['id']}}</th>
            <td>{{$updates['project']}}</td>
            <td>{{$updates['task_name']}}</td>
            <td>{{$updates['type_task']}}</td>
            <td>            
            <select class="mdb-select form-control" name="progress">                
                <option value="" selected>Choose Progress</option>
                <option value="100">100 %</option>
                <option value="80">80 %</option>
                <option value="60">60 %</option>
                <option value="40">40 %</option>
                <option value="20">20 %</option>
                <option value="0">0 %</option>
                <option value="-">-</option>
            </select>
            </td>  
            <td><input type="text" id="" class="form-control" name="complete_remark"></td>
            <td><button class="btn btn-sm btn-success" type="submit">Comfirm</button></td>
           </form>            
          </tr>
      
          @endforeach  


        </tbody>
      </table>
    

@endsection