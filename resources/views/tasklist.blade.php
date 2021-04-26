@extends('layout.layout')
@section('content')
@if (Session("delete"))   
<div class="alert alert-danger">
  {{Session("delete")}}
</div>
@endif
	    <form action="{{ route('task') }}" method="GET" style="margin-top: 20px;">
      @csrf
    			<select name="price_id" id="input">
    				<option value="0">Select Price</option>
    				@foreach (\App\Models\Project::select('id','project_name')->get() as $price)
    					<option value="{{ $price->id }}" {{ $price->id == $selected_id['project'] ? 'selected' : '' }}>
    					{{ $price['project_name'] }}
    				    </option>
    				@endforeach
    			</select>
    			{{-- <select name="assign" id="input">
    				<option value="0">Select Color</option>
    				@foreach (\App\Models\Assign::select('id','person')->get() as $color)
					<option value="{{ $color->id }}" {{ $color->id == $selected_id['person'] ? 'selected' : '' }}>
					{{ $color['person'] }}
				    </option>
				    @endforeach
    			</select> --}}
	    		<input type="submit" class="btn btn-danger btn-sm" value="Filter">
	    </form>
	    	
    {{-- <div class="col-md-2 ml-3">      
    			<select name="project" id="" class="form-control" >
    				<option value="0">Select Project</option>
    				@foreach ($tasks as $task)
    					<option value="{{ $task->project }}" {{ $task->project == $selected_id['project'] ? 'selected' : '' }}>
    					{{$task->Project->project_name}}
    				    </option>

    				@endforeach
    			</select>
    </div> --}}
    {{-- <div class="col-md-2">    --}}


    {{-- <button id = "buttonLogin" onclick = "displayLoginBox()">LogIn</button> --}}
    			{{-- <select name="task_name" id="" class="form-control">
    				<option value="0">Select task</option>
    				@foreach ($tasks as $task)
					<option value="{{ $task->task_name }}" {{ $task->task_name == $selected_id['task_name'] ? 'selected' : '' }}>
					{{$task->task_name}}
				    </option>
				    @endforeach
    			</select> --}}

  <!--Navbar-->

<!--/.Navbar-->        

    {{-- <input type="submit" class="btn btn-indigo btn-sm" value="Filter" class="form-control">


  </div>     --}}


<div class="table-wrapper-scroll-y my-custom-scrollbar ml-2 mr-2 mt-3">
    <table id="products-table" class="table table-striped table-bordered table-sm table-hover text-center" class="display"  cellspacing="0" width="100%">
        <thead style="background:#A5A5A5;color:white;">                
     
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Input Date</th>
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
            <th scope="col">Edit</th>
            <th scope="col">Comfirm</th>
          </tr>
        </thead>
        <tbody>
         @if ($searching->count() == 0)
        <tr>
            <td colspan="14">No data to display.</td>
        </tr>
        @endif
        @php($i=1)

        @foreach ($searching as $task)              
          <tr>
            <th scope="row">{{$i}}</th>
            <td>{{$task['input_date']}}</td>
            <td>{{$task->Project->project_name}}</td>
            <td>{{$task['task_name']}}</td>
            <td>{{$task['task_detail']}}</td>
            <td>{{$task['type_task']}}</td>                          
           
            @if ($task['weekend'] <> "Na")<td>{{$task['weekend']}}</td>
            @else <td>---</td>     
            @endif             

            @if ($task['start_date'] <> "Na")<td>{{$task['start_date']}}</td> 
            @else <td>---</td>     
            @endif 

            @if ($task['end_date'] <> "Na")<td>{{$task['end_date']}}</td>  
            @else <td>---</td>                   
            @endif
           
            {{-- @if ($task['start_date'] <> "Na" && $task['end_date'] <> "Na")<td>{{$task['type_task']}} [ {{$task['start_date']}} => {{$task['start_date']}} ]</td>                      
            @endif --}}
            
            <td>{{$task->assign->person}}</td>            
            <td>{{$task->assignto->to}}</td>
            <td>{{$task['remark']}}</td>            
            <td><a class="btn btn-sm btn-warning" href='{{route("editTask", $task ->id)}}'>Edit</a></td>
            <td><a class="btn btn-sm btn-danger" href='{{route("deleteTask", $task->id)}}' onclick="return confirm('Are you sure to delete?')">Delete</a></td>
                       
          </tr>
          @php($i++)
          @endforeach  


        </tbody>
      </table>
  </div>
</form>
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="filter_type"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/myform/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="result_filter"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="result_filter"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="result_filter"]').empty();
            }
        });
    });
</script>
@endsection
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<script>


</script>

