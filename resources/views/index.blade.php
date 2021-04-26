@extends('layout.layout')
@section('content')
<!-- Material form contact -->
<div class="container">
    {{-- <h1 class="grey-text mt-4 d-inline">Welcome Task Project</h1> --}}
<div class="card mt-4">
{{-- 
    <h5 class="card-header green white-text text-center py-2">
        <strong>Task Reminder & Recorder</strong>
    </h5> --}}
    @if(Session("success"))
    <div class="alert alert-success">
        {{Session('success')}}
    </div>
    @endif
    <!--Card content-->
    <div class="card-body px-xs-5 pt-3">
        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="{{route("inserts")}}" method="post">
        @csrf

            <div class="md-form mt-4">
            @if (old('input_date') != "")
                <input type="text" id="" class="form-control" name="input_date" value="{{old('input_date')}}">
            @else
                <input type="date" id="" class="form-control" name="input_date" >
            @endif                
            <label for="input date">Input date</label>
                      @error("input_date")     
                     <p class="alert alert-danger">{{$message}}</p>                                  
                     @enderror  
            </div>
            <!--Project Name -->
            <div class="md-form">
               <select class="mdb-select form-control" name="project">
               <option value="">Select Project Name</option>
                    @foreach ($projectselect as $projectselects)   
                    	@if (old('project') == $projectselects->id)
                            <option value="{{ $projectselects->id }}" selected>{{ $projectselects->project_name }}</option>
                        @else
                            <option value="{{ $projectselects->id }}">{{ $projectselects->project_name }}</option>
                        @endif                
                                                 
                    @endforeach
                </select>
                     @error("project")     
                     <p class="alert alert-danger">{{$message}}</p>                                  
                     @enderror  
            </div>
            <div class="md-form">
               <select class="mdb-select form-control" name="assigned_person">
               <option value="" selected>Select Assign Person</option>
                    @foreach ($assignselect as $assignselects)   
                    	@if (old('assigned_person') == $assignselects->id)
                            <option value="{{ $assignselects->id }}" selected>{{ $assignselects->person }}</option>
                        @else
                            <option value="{{ $assignselects->id }}">{{ $assignselects->person }}</option>
                        @endif                

                    @endforeach
                </select>
                    @error("assigned_person")     
                     <p class="alert alert-danger">{{$message}}</p>                                  
                     @enderror 
            </div>
            <div class="md-form">
               <select class="mdb-select form-control" name="assigned_to">
               <option value="" selected>{{old('assigned_to')}}</option>
                    @foreach ($assignto as $assigntos) 
                    	@if (old('assigned_to') == $assigntos->id)
                            <option value="{{ $assigntos->id }}" selected>{{ $assigntos->to }}</option>
                        @else
                            <option value="{{ $assigntos->id }}">{{ $assigntos->to }}</option>
                        @endif                                              
                 
                    @endforeach
                </select>                 
                      @error("assigned_to")     
                     <p class="alert alert-danger">{{$message}}</p>                                  
                     @enderror  
            </div>  
            <!-- Task Name -->
            <div class="md-form">
                <input type="text" id="" class="form-control" name="task_name" value="{{old('task_name')}}">
                <label for="Task Name">Task Name</label>
                     @error("task_name")     
                     <p class="alert alert-danger">{{$message}}</p>                                  
                     @enderror 
            </div>

            <!-- Task Detail -->
            <div class="md-form">
                <textarea class="form-control md-textarea" rows="3" name="task_detail" >{{old('task_detail')}}</textarea>
                <label for="Task detail/Remark">Task detail/Remark</label>
                     @error("task_detail")     
                     <p class="alert alert-danger">{{$message}}</p>                                  
                     @enderror                 
            </div>   
            <div class="md-form ml-5">
                <div class="row" >
                    <div class="col-md-4 ">
                        <label style="color:indigo;font-weight:bold;"><input type="radio" name="type_task" onchange="show(this.value)"  value="Daily" {{ old('type_task') == "Daily" ? 'checked' : '' }}> Daily (Monday to Saturday)</label>
                    </div>
                    <div class="col-md-2">
                        <label  style="color:green;font-weight:bold;"><input type="radio" name="type_task" value="Weekly" onchange="show1()"  value="Weekly" {{ (old('type_task') == 'Weekly') ? 'checked' : ''}}> Weekly</label>
                    </div>
                    <div class="col-md-2">
                        <label style="color:red;font-weight:bold;"><input type="radio" name="type_task" value="Monthly" onchange="show2()"  value="Monthly" {{ (old('type_task') == 'Monthly') ? 'checked' : ''}}> Monthly</label>
                    </div>
                    <div class="col-md-2">
                        <label style="color:#cc0066;font-weight:bold;"><input type="radio" name="type_task" value="Others" onchange="show3()"  value="Others" {{ (old('type_task') == 'Others') ? 'checked' : ''}}> Others</label>
                    </div>
                     <div class="col-md-2">
                        <label style="color:yellow;font-weight:bold;"><input type="radio" name="type_task" value="Yearly" onchange="show4()"  value="Yearly" {{ (old('type_task') == 'Yearly') ? 'checked' : ''}}> Yearly</label>
                    </div>                   

                </div>                
                 
            </div>                    
            <br>  
            @error("type_task")     
                     <p class="alert alert-danger">{{$message}}</p>                                  
            @enderror 


             <input type="hidden" id="" class="form-control" value="everyday" name="workday">
            @if (old('type_task') == "Weekly")
            <div class="md-form" id="show1" style="display:block;">
            @else
            <div class="md-form" id="show1" style="display:none;">
            @endif
            <select class="mdb-select form-control" name="weekend" id="weekend" style="border:1px solid green;color:green;">                
                <option value="" selected>Choose Weekly Day</option>                
                <option value="Monday" {{ old('weekend') == "Monday" ? 'selected' : '' }}>Monday</option>
                <option value="Tuesday" {{ old('weekend') == "Tuesday" ? 'selected' : '' }}>Tuesday</option>
                <option value="Wednesday" {{ old('weekend') == "Wednesday" ? 'selected' : '' }}>Wednesday</option>
                <option value="Thursday" {{ old('weekend') == "Thursday" ? 'selected' : '' }}>Thursday</option>
                <option value="Friday" {{ old('weekend') == "Friday" ? 'selected' : '' }}>Friday</option>
                <option value="Saturday" {{ old('weekend') == "Saturday" ? 'selected' : '' }}>Saturday</option>
            </select>
                     @error("weekend")     
                     <p class="alert alert-danger">{{$message}}</p>                                  
                     @enderror  
            </div>
            @if (old('type_task') == "Monthly")
            <div class="md-form" id="show2" style="display:block;">
            @else
            <div class="md-form" id="show2" style="display:none;">
            @endif            
                <div class="row">            
                    <div class="col-sm-6">
                    <span style="color:red;">Start Date</span>
                        <input type="date" id="" class="form-control" name="start_date" style="border:1px solid red;color:red;" value="{{old('start_date')}}">                
                    </div>               
                     <div class="col-sm-6">
                    <span style="color:red;">End Date</span>
                         <input type="date" id="" class="form-control" name="end_date" style="border:1px solid red;color:red;" value="{{old('end_date')}}">                
                    </div>  
                </div> 
                
            </div> 
            @if (old('type_task') == "Others")
            <div class="md-form" id="show3" style="display:block;">
            @else
            <div class="md-form" id="show3" style="display:none;">
            @endif               
                <div class="row">            
                    <div class="col-sm-6">
                    <span style="color:#cc0066;">Start Date</span>
                        <input type="date" id="" class="form-control" name="start_date3" style="border:1px solid #cc0066;color:#cc0066;" value="{{old('start_date3')}}">                
                    </div>               
                     <div class="col-sm-6">
                    <span style="color:#cc0066;">End Date</span>
                         <input type="date" id="" class="form-control" name="end_date3" style="border:1px solid #cc0066;color:#cc0066;" value="{{old('end_date3')}}">                
                    </div>  
                </div> 
            </div> 
            @if (old('type_task') == "Yearly")
            <div class="md-form" id="show4" style="display:block;">
            @else
            <div class="md-form" id="show4" style="display:none;">
            @endif
                <div class="row">            
                    <div class="col-sm-6">
                    <span style="color:yellow;">Start Date</span>
                        <input type="date" id="" class="form-control" name="start_date4" style="border:1px solid yellow;color:yellow;" value="{{old('start_date4')}}">                
                    </div>               
                     <div class="col-sm-6">
                    <span style="color:yellow;">End Date</span>
                         <input type="date" id="" class="form-control" name="end_date4" style="border:1px solid yellow;color:yellow;" value="{{old('end_date4')}}">                
                    </div>  
                </div> 
            </div> 

            <!--Message-->
            <div class="md-form">
                <textarea id="" class="form-control md-textarea" rows="3" name="message">{{old('message')}}</textarea>
                <label for="Message">Remark</label>
            </div>
            <input type="hidden" id="" class="form-control" name="remark" value="Na">
            <input type="hidden" id="" class="form-control" name="progress" value="Na">
            <input type="hidden" id="" class="form-control" name="status" value="Na">
            <input type="hidden" id="" class="form-control" name="completedate" value="Na">

            <!-- Copy -->
            {{-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="materialContactFormCopy">
                <label class="form-check-label" for="materialContactFormCopy">Send me a copy of this message</label>
            </div> --}}

            <!-- Send button -->
            <button class="btn btn-indigo btn-block z-depth-0 my-4 waves-effect" type="submit">Save</button>

        </form>
        <!-- Form -->

    </div>

</div>
</div>
<!-- Material form contact -->
@endsection

        <script type="text/javascript">
            function show(str){
                document.getElementById('show1').style.display = 'none';
                document.getElementById('show2').style.display = 'none';
                document.getElementById('show3').style.display = 'none';
                document.getElementById('show4').style.display = 'none';
                
            }
            function show1(str){
                document.getElementById('show1').style.display = 'block';
                document.getElementById('show2').style.display = 'none';
                
            }
             function show2(str){
                document.getElementById('show1').style.display = 'none';
                document.getElementById('show2').style.display = 'block';
                
            }
             function show3(str){
                document.getElementById('show1').style.display = 'none';
                document.getElementById('show2').style.display = 'none';
                document.getElementById('show3').style.display = 'block';
                
            }  
             function show4(str){
                document.getElementById('show1').style.display = 'none';
                document.getElementById('show2').style.display = 'none';
                document.getElementById('show3').style.display = 'none';
                document.getElementById('show4').style.display = 'block';
                
            }  

        </script>
