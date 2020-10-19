@extends('layout.layout')
@section('content')
<!-- Material form contact -->
<div class="container">
    {{-- <h1 class="grey-text mt-4 d-inline">Welcome Task Project</h1> --}}
<div class="card mt-4">

    <h5 class="card-header green white-text text-center py-2">
        <strong>Task Reminder & Recorder</strong>
    </h5>
    @if(Session("success"))
    <div class="alert alert-success">
        {{Session('success')}}
    </div>
    @endif
    <!--Card content-->
    <div class="card-body px-lg-5 pt-3">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="{{route("inserts")}}" method="post">
        @csrf

            <div class="md-form mt-4">
                <input type="date" id="" class="form-control" name="input_date">
                <label for="input date">Input date</label>
            </div>
            <!--Project Name -->
            <div class="md-form">
               <select class="mdb-select form-control" name="project">
               <option value="" selected>Choose Project Name</option>
                    @foreach ($projectselect as $projectselects)                    
                    <option value="{{$projectselects->id}}">{{$projectselects->project_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="md-form">
               <select class="mdb-select form-control" name="assigned_person">
               <option value="" selected>Choose Assign Person</option>
                    @foreach ($assignselect as $assignselects)                    
                    <option value="{{$assignselects->id}}">{{$assignselects->person}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Task Name -->
            <div class="md-form">
                <input type="text" id="" class="form-control" name="task_name">
                <label for="Task Name">Task Name</label>
            </div>

            <!-- Task Detail -->
            <div class="md-form">
                <textarea class="form-control md-textarea" rows="3" name="task_detail"></textarea>
                <label for="Task detail/Remark">Task detail/Remark</label>
            </div>   
            <div class="md-form ml-5">
                <div class="row" >
                    <div class="col-md-4 ">
                        <label style="color:indigo;font-weight:bold;"><input type="radio" name="type_task" value="Daily" onchange="show(this.value)"> Daily (Monday to Saturday)</label>
                    </div>
                    <div class="col-md-2">
                        <label  style="color:green;font-weight:bold;"><input type="radio" name="type_task" value="Weekly" onchange="show1()"> Weekly</label>
                    </div>
                    <div class="col-md-2">
                        <label style="color:red;font-weight:bold;"><input type="radio" name="type_task" value="Monthly" onchange="show2()"> Monthly</label>
                    </div>
                    <div class="col-md-2">
                        <label style="color:#cc0066;font-weight:bold;"><input type="radio" name="type_task" value="Others" onchange="show3()"> Others</label>
                    </div>
                     <div class="col-md-2">
                        <label style="color:yellow;font-weight:bold;"><input type="radio" name="type_task" value="Yearly" onchange="show4()"> Yearly</label>
                    </div>                   

                </div>                
                                       
            </div> <br>  


             <input type="hidden" id="" class="form-control" value="everyday" name="workday">

            <div class="md-form" id="show1" style="display:none;">
            <select class="mdb-select form-control" name="weekend" id="weekend" style="border:1px solid green;color:green;">                
                <option value="" selected>Choose Weekly Day</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
            </select>
            </div>
            <div class="md-form" id="show2" style="display:none;">
                <div class="row">            
                    <div class="col-sm-6">
                    <span style="color:red;">Start Date</span>
                        <input type="date" id="" class="form-control" name="start_date" style="border:1px solid red;color:red;">                
                    </div>               
                     <div class="col-sm-6">
                    <span style="color:red;">End Date</span>
                         <input type="date" id="" class="form-control" name="end_date" style="border:1px solid red;color:red;">                
                    </div>  
                </div> 
            </div> 

            <div class="md-form" id="show3" style="display:none;">
                <div class="row">            
                    <div class="col-sm-6">
                    <span style="color:#cc0066;">Start Date</span>
                        <input type="date" id="" class="form-control" name="start_date3" style="border:1px solid #cc0066;color:#cc0066;">                
                    </div>               
                     <div class="col-sm-6">
                    <span style="color:#cc0066;">End Date</span>
                         <input type="date" id="" class="form-control" name="end_date3" style="border:1px solid #cc0066;color:#cc0066;">                
                    </div>  
                </div> 
            </div> 

            <div class="md-form" id="show4" style="display:none;">
                <div class="row">            
                    <div class="col-sm-6">
                    <span style="color:yellow;">Start Date</span>
                        <input type="date" id="" class="form-control" name="start_date4" style="border:1px solid yellow;color:yellow;">                
                    </div>               
                     <div class="col-sm-6">
                    <span style="color:yellow;">End Date</span>
                         <input type="date" id="" class="form-control" name="end_date4" style="border:1px solid yellow;color:yellow;">                
                    </div>  
                </div> 
            </div> 

            <div class="md-form">
               <select class="mdb-select form-control" name="assigned_to">
               <option value="" selected>Choose Assign To</option>
                    @foreach ($assignto as $assigntos)                    
                    <option value="{{$assigntos->id}}">{{$assigntos->to}}</option>
                    @endforeach
                </select>
            </div>                             

            <!--Message-->
            <div class="md-form">
                <textarea id="" class="form-control md-textarea" rows="3" name="message"></textarea>
                <label for="Message">Remark</label>
            </div>
            <input type="hidden" id="" class="form-control" name="progress" value="NA">
            <input type="hidden" id="" class="form-control" name="status" value="NA">
            <input type="hidden" id="" class="form-control" name="completedate" value="NA">

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
