@extends('layout.layout')
@section('content')
<div class="container">
 
    @if(Session("success"))
    <div class="alert alert-success">
        {{Session('success')}}
    </div>
    @endif
    
    <!-- Material form register -->
<div class="card mt-4">

    <h5 class="card-header green white-text text-center py-2">
        <strong>Update Task</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" action="{{route("updateTask", $editTask->id)}}" method="post">
        @csrf

            <div class="md-form mt-4">
                <input type="text" id="" class="form-control" name="input_date" value="{{$editTask->input_date}}">
                <label for="input date">Input date</label>
                      @error("input_date")     
                     <p class="alert alert-danger">{{$message}}</p>                                  
                     @enderror  
            </div>
            <!--Project Name -->
            <div class="md-form">
               <select class="mdb-select form-control" name="project">
               <option value="{{$editTask->project}}" selected>{{$editTask->Project->project_name}}</option>
                    @foreach ($projectselect_edit as $projectselects)                    
                    <option value="{{$projectselects->id}}">{{$projectselects->project_name}}</option>
                    @endforeach
                </select>
                     @error("project")     
                     <p class="alert alert-danger">{{$message}}</p>                                  
                     @enderror  
            </div>
            <div class="md-form">
               <select class="mdb-select form-control" name="assigned_person" value="{{$editTask->assigned_person}}">
               <option value="{{$editTask->assigned_person}}" selected>{{$editTask->assign->person}}</option>
                    @foreach ($assignselect_edit as $assignselects)                    
                    <option value="{{$assignselects->id}}">{{$assignselects->person}}</option>
                    @endforeach
                </select>
                    @error("assigned_person")     
                     <p class="alert alert-danger">{{$message}}</p>                                  
                     @enderror 
            </div>

            <!-- Task Name -->
            <div class="md-form">
                <input type="text" id="" class="form-control" name="task_name" value="{{$editTask->task_name}}">
                <label for="Task Name">Task Name</label>
                     @error("task_name")     
                     <p class="alert alert-danger">{{$message}}</p>                                  
                     @enderror 
            </div>

            <!-- Task Detail -->
            <div class="md-form">
                <input class="form-control md-textarea" rows="3" name="task_detail" value="{{$editTask->task_detail}}">
                
            </div>   
          
            <div class="md-form">
            @if ($editTask->workday != "Na")
            <input class="form-control md-textarea" rows="3" name="task_detail" value="{{$editTask->workday}}">

            @elseif($editTask->weekend != "Na")
            <select class="mdb-select form-control" name="weekend" id="weekend" style="border:1px solid green;color:green;">                
                <option value="{{$editTask->weekend}}" selected>{{$editTask->weekend}}</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
            </select>
            @elseif ($editTask->start_date != "Na" && $editTask->end_date != "Na")
            <div class="row">
            @if ($editTask->monthly != "Na")
            <div class="col-md-3">
            <input class="form-control md-textarea" rows="3" name="monthly" value="{{$editTask->monthly}}">
            </div> 
            @elseif ($editTask->others != "Na")
            <div class="col-md-3">
            <input class="form-control md-textarea" rows="3" name="others" value="{{$editTask->others}}">
            </div> 
            @elseif ($editTask->yearly != "Na")
            <div class="col-md-3">
            <input class="form-control md-textarea" rows="3" name="yearly" value="{{$editTask->yearly}}">
            </div>                                         
            @endif


            <div class="col-md-3">
            <input class="form-control md-textarea" rows="3" name="task_detail" value="{{$editTask->start_date}}">
            </div>
            <div class="col-md-3">
            <input class="form-control md-textarea" rows="3" name="task_detail" value="{{$editTask->end_date}}">
            </div>
            </div>
            
            @endif               
                
            </div>   
            <div class="md-form">
               <select class="mdb-select form-control" name="assigned_to" value="{{$editTask->assigned_to}}">
               <option value="{{$editTask->assigned_to}}" selected>{{$editTask->assignto->to}}</option>
                    @foreach ($assigntoselect_edit as $assigntos)                    
                    <option value="{{$assigntos->id}}">{{$assigntos->to}}</option>
                    @endforeach
                </select>
                      @error("assigned_to")     
                     <p class="alert alert-danger">{{$message}}</p>                                  
                     @enderror  
            </div>                             

            <!--Message-->
            <div class="md-form">
                <input type="text" id="" class="form-control md-textarea" rows="3" name="message_edit"  value="{{$editTask->remark}}">
                
            </div>

            <div class="md-form">
            <div class="row">
            <div class="col-md-4">
            Progress     <select class="mdb-select form-control" name="progress_edit">                
                            <option value="{{$editTask->progress}}" selected>{{$editTask->progress}}</option>
                            <option value="100">100 %</option>
                            <option value="80">80 %</option>
                            <option value="60">60 %</option>
                            <option value="40">40 %</option>
                            <option value="20">20 %</option>
                            <option value="NS">0 %</option>
                            <option value="OH">-</option>
                        </select>
            </div>
            <div class="col-md-4">
            @if ($editTask->progress = "100")
            Status<input type="text" id="" class="form-control indigo-text" name="status_edit" value="{{$editTask->status}}" style="border:none;" readonly/>
            @elseif($editTask->progress <"100")
            Status<input type="text" id="" class="form-control green-text" name="status_edit" value="{{$editTask->status}}" style="border:none;" readonly/>
            @elseif($editTask->progress = "0")
            Status<input type="text" id="" class="form-control orange-text" name="status_edit" value="{{$editTask->status}}" style="border:none;" readonly/>
            @elseif($editTask->progress = "On Hold")
            Status<input type="text" id="" class="form-control orange-text" name="status_edit" value="Na" style="border:none;" readonly/>
            @endif
            </div>
            @if ($editTask->status == "complete")
            <div class="col-md-4">
            Completedate<input type="text" id="" class="form-control" name="completedate_edit" value="{{$editTask->completedate}}">
            </div>
    
            @endif

            </div>

             <div class="md-form">
                
                <label style="color:indigo;font-weight:bold;">Edit Task Type             
                <input type="checkbox" onchange="showing(this.value)" value="check" ></label>
                
            </div> <br>       

            <div class="md-form ml-5" id="showing" style="display:none;">
                <div class="row" >
                    <div class="col-md-4 ">
                        <label style="color:indigo;font-weight:bold;"><input type="radio" name="type_task_edit" value="Daily" onchange="show(this.value)"> Daily (Monday to Saturday)</label>
                    </div>
                    <div class="col-md-2">
                        <label  style="color:green;font-weight:bold;"><input type="radio" name="type_task_edit" value="Weekly" onchange="show1()"> Weekly</label>
                    </div>
                    <div class="col-md-2">
                        <label style="color:red;font-weight:bold;"><input type="radio" name="type_task_edit" value="Monthly" onchange="show2()"> Monthly</label>
                    </div>
                    <div class="col-md-2">
                        <label style="color:#cc0066;font-weight:bold;"><input type="radio" name="type_task_edit" value="Others" onchange="show3()"> Others</label>
                    </div>
                     <div class="col-md-2">
                        <label style="color:yellow;font-weight:bold;"><input type="radio" name="type_task_edit" value="Yearly" onchange="show4()"> Yearly</label>
                    </div>                   

                </div>                
                      @error("task_detail")     
                     <p class="alert alert-danger">{{$message}}</p>                                  
                     @enderror                   
            </div> <br>  


             <input type="hidden" id="" class="form-control" value="everyday" name="workday_edit">

            <div class="md-form" id="show1" style="display:none;">
            <select class="mdb-select form-control" name="weekend_edit" id="weekend" style="border:1px solid green;color:green;">                
                <option value="" selected>Choose Weekly Day</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
            </select>
                     @error("weekend")     
                     <p class="alert alert-danger">{{$message}}</p>                                  
                     @enderror  
            </div>
            <div class="md-form" id="show2" style="display:none;">
                <div class="row">            
                    <div class="col-sm-6">
                    <span style="color:red;">Start Date</span>
                        <input type="date" id="" class="form-control" name="start_date_edit" style="border:1px solid red;color:red;">                
                    </div>               
                     <div class="col-sm-6">
                    <span style="color:red;">End Date</span>
                         <input type="date" id="" class="form-control" name="end_date_edit" style="border:1px solid red;color:red;">                
                    </div>  
                </div> 
                
            </div> 

            <div class="md-form" id="show3" style="display:none;">
                <div class="row">            
                    <div class="col-sm-6">
                    <span style="color:#cc0066;">Start Date</span>
                        <input type="date" id="" class="form-control" name="start_date3_edit" style="border:1px solid #cc0066;color:#cc0066;">                
                    </div>               
                     <div class="col-sm-6">
                    <span style="color:#cc0066;">End Date</span>
                         <input type="date" id="" class="form-control" name="end_date3_edit" style="border:1px solid #cc0066;color:#cc0066;">                
                    </div>  
                </div> 
            </div> 

            <div class="md-form" id="show4" style="display:none;">
                <div class="row">            
                    <div class="col-sm-6">
                    <span style="color:yellow;">Start Date</span>
                        <input type="date" id="" class="form-control" name="start_date4_edit" style="border:1px solid yellow;color:yellow;">                
                    </div>               
                     <div class="col-sm-6">
                    <span style="color:yellow;">End Date</span>
                         <input type="date" id="" class="form-control" name="end_date4_edit" style="border:1px solid yellow;color:yellow;">                
                    </div>  
                </div> 
            </div> 


            <!-- Copy -->
            {{-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="materialContactFormCopy">
                <label class="form-check-label" for="materialContactFormCopy">Send me a copy of this message</label>
            </div> --}}

            <!-- Send button -->
            <button class="btn btn-green btn-block z-depth-0 my-4 waves-effect" type="submit">Save</button>

        </form>
        <!-- Form -->

    </div>

</div>
</div>

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
            function showing(str){
                document.getElementById('showing').style.display = 'block';
                
            }              

        </script>
