<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\Assignto;
use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function index() {
        return view('index');
    }
    function inserts(Request $req) {
        // return view('index');
        $valation=$req->validate([
            'input_date'=>"required",
            'project'=>"required",
            'task_name'=>"required",
            'task_detail'=>"required",
            'type_task'=>"required",
            'assigned_person'=>"required",
            'assigned_to'=>"required"
           
        ]);
        if($valation){
            $task_project = new Task();
            $type=$req->type_task;          
            $week=$req->weekend;
            $start=$req->start_date;
            $end=$req->end_date;

            if($type == "Daily"){
                $work="Daily";$week="Na";$start="Na";$end="Na";
                $task_project->type_task=$type ;
                $task_project->workday="Daily";
                $task_project->monthly="Na";
                $task_project->others="Na";
                $task_project->yearly="Na";
                $task_project->weekend="Na";
                $task_project->start_date="Na";
                $task_project->end_date="Na";
            }
            if($type == "Weekly"){
                $work="Na";$start="Na";$end="Na";
                $task_project->type_task=$type ;
                $task_project->workday="Na";
                $task_project->weekend=$week;
                $task_project->monthly="Na";
                $task_project->others="Na";
                $task_project->yearly="Na";
                $task_project->start_date="Na";
                $task_project->end_date="Na";
            }
            if($type == "Monthly"){
                $work="Na";$week="Na";
                $task_project->type_task=$type ;
                $task_project->workday="Na";
                $task_project->weekend="Na";
                $task_project->monthly="Monthly";
                $task_project->others="Na";
                $task_project->yearly="Na";               
                $task_project->start_date=$req->start_date;
                $task_project->end_date=$req->end_date;               

            }
            if($type == "Others"){
                $work="Na";$week="Na";
                $task_project->type_task=$type ;
                $task_project->workday="Na";
                $task_project->weekend="Na";
                $task_project->others="Others";
                $task_project->monthly="Na";  
                $task_project->yearly="Na";               
                $task_project->start_date=$req->start_date3;
                $task_project->end_date=$req->end_date3;     
            }
            if($type == "Yearly"){
                $work="Na";$week="Na";
                $task_project->type_task=$type ;
                $task_project->workday="Na";
                $task_project->weekend="Na";
                $task_project->yearly="Yearly";
                $task_project->monthly="Na";
                $task_project->others="Na";                            
                $task_project->start_date=$req->start_date4;
                $task_project->end_date=$req->end_date4;     
            }

            $task_project->input_date=$req->input_date;
            $task_project->project=$req->project;
            $task_project->task_name=$req->task_name;
            $task_project->task_detail=$req->task_detail;
            $task_project->assigned_person=$req->assigned_person;
            $task_project->assigned_to=$req->assigned_to;

            $message=$req->message;
            if($message <>''){
                $task_project->message=$message;
                $task_project->remark=$message;
               }
               else{
                $task_project->message="Na";
                $task_project->remark="Na";
               }
           
            $task_project->progress=$req->progress;
            $task_project->status=$req->status;
            $task_project->completedate=$req->completedate;

            $task_project->save();
            return back()->with("success", "Successfully added.");

        }
        else{
            return back()->withErrors($valation);

        }
    } 
    function updateTask($id, Request $req){
        //return $id;
        $updateTask=Task::find($id);

        $updateTask->input_date=$req->input_date;
        $updateTask->project=$req->project;        
        $updateTask->assigned_person=$req->assigned_person;
        $updateTask->assigned_to=$req->assigned_to;

        $updateTask->task_name=$req->task_name;
        $updateTask->task_detail=$req->task_detail;

        
    if ($req->type_task_edit == "" ) {
       
        
        if ($req->monthly = "Monthly") {
            $updateTask->monthly="Monthly";
            $updateTask->start_date=$req->start_date;
            $updateTask->end_date=$req->end_date;
        } 
        elseif ($req->others = "Others") {
            $updateTask->others="Others";
            $updateTask->start_date=$req->start_date;
            $updateTask->end_date=$req->end_date;
        }
        elseif ($req->yearly = "Yearly") {
            $updateTask->yearly="Yearly";
            $updateTask->start_date=$req->start_date;
            $updateTask->end_date=$req->end_date;
        }
        elseif ($req->workday = "Daily") {
            $updateTask->workday="Daily";
        }
        elseif ($req->weekend <> "") {
            $updateTask->weekend=$req->weekend;
        }                       
        else {
            
        }
      
    } else {

        $type=$req->type_task_edit;          
        $week=$req->weekend_edit;
        $start=$req->start_date_edit;
        $end=$req->end_date_edit;

        if($type == "Daily"){
            $work="Daily";$week="Na";$start="Na";$end="Na";
            $updateTask->type_task=$type ;
            $updateTask->workday="Daily";
            $updateTask->monthly="Na";
            $updateTask->others="Na";
            $updateTask->yearly="Na";
            $updateTask->weekend="Na";
            $updateTask->start_date="Na";
            $updateTask->end_date="Na";
        }
        if($type == "Weekly"){
            $work="Na";$start="Na";$end="Na";
            $updateTask->type_task=$type ;
            $updateTask->workday="Na";
            $updateTask->weekend=$week;
            $updateTask->monthly="Na";
            $updateTask->others="Na";
            $updateTask->yearly="Na";
            $updateTask->start_date="Na";
            $updateTask->end_date="Na";
        }
        if($type == "Monthly"){
            $work="Na";$week="Na";
            $updateTask->type_task=$type ;
            $updateTask->workday="Na";
            $updateTask->weekend="Na";
            $updateTask->monthly="Monthly";
            $updateTask->others="Na";
            $updateTask->yearly="Na";               
            $updateTask->start_date=$req->start_date_edit;
            $updateTask->end_date=$req->end_date_edit;               

        }
        if($type == "Others"){
            $work="Na";$week="Na";
            $updateTask->type_task=$type ;
            $updateTask->workday="Na";
            $updateTask->weekend="Na";
            $updateTask->others="Others";
            $updateTask->monthly="Na";  
            $updateTask->yearly="Na";               
            $updateTask->start_date=$req->start_date3_edit;
            $updateTask->end_date=$req->end_date3_edit;     
        }
        if($type == "Yearly"){
            $work="Na";$week="Na";
            $updateTask->type_task=$type ;
            $updateTask->workday="Na";
            $updateTask->weekend="Na";
            $updateTask->yearly="Yearly";
            $updateTask->monthly="Na";
            $updateTask->others="Na";                            
            $updateTask->start_date=$req->start_date4_edit;
            $updateTask->end_date=$req->end_date4_edit;     
        }

        
    } 
    if($req->message_edit <> ''){
        $updateTask->remark=$req->message_edit;
       }
       else{
        $updateTask->remark="Na";
       }
       $updateTask->progress=$req->progress_edit;       
       if($req->progress_edit  == '100'){
        $date = Carbon::now();
        $updateTask->completedate=$date;
        $updateTask->status="complete";       
   
       }elseif($req->progress_edit < '100'){
        $updateTask->status="In Progress";
        $updateTask->completedate="Na";

       }
       elseif($req->progress_edit == '0'){
        $updateTask->status="Not Started";
        $updateTask->completedate="Na";

       }
       else{
        $updateTask->status="On Hold";
        $updateTask->completedate="Na";

       }       

        $updateTask->update();
        return back()->with("success", "Successfully updated.");
    }   
    function deleteTask($id){
        $deleteTask = Task::find($id);
        $deleteTask->delete();
        return back()->with("delete", "$deleteTask->task_name 's Name is deleted");
    }   

    function task(Request $request){
    $searching = Task::all();
            $select_data = Task::where( function($query) use($request){
                             return $request->project ?
                                    $query->from('project')->where('id',$request->project) : '';
                        })
                        ->where(function($query) use($request){
                             return $request->assign ?
                                    $query->from('assign')->where('id',$request->assign) : '';
                        })
                        ->with('project','assign')
                        ->get();
             
            $selected_id = [];
            $selected_id['project'] = $request->project;
            $selected_id['assign'] = $request->assign;
        
            return view('tasklist',compact('select_data','selected_id','searching'));
            // return view('tasklist',['tasks' => $tasks,'searching' => $searching,'selected_id' => $selected_id]);
    // return view('tasklist',['tasks' => $tasks,'searching' => $searching,'selected_id' => $selected_id]);

    }
    function editTask($id){
        // return $id;
        // return view("edit");
         $editTask = Task::find($id);
   
         $projectselect_edit=Project::all();
         $assignselect_edit=Assign::all();
         $assigntoselect_edit=Assignto::all();

        return view("editTask",['editTask'=> $editTask,'projectselect_edit' => $projectselect_edit,'assignselect_edit' => $assignselect_edit,'assigntoselect_edit' => $assigntoselect_edit]);
    }

    function update(){
        $weekMap = [
           
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
        ];
        // $updatetoday=Task::all();        
        $dayOfTheWeek = Carbon::now()->dayOfWeek;
        $weekday = $weekMap[$dayOfTheWeek];
        $updatetoday = Task::where('start_date', '<=', Carbon::now())
        ->Where('end_date', '>=', Carbon::now())
        ->orwhere('workday', '=', "Daily")
        ->orwhere("weekend", "=", $weekday)
        ->get();

        return view("update", ['update' => $updatetoday]);
    }  
   
    function edit($id){
        // return $id;
        // return view("update");
        $comfirm = Task::find($id);
        return view("update",['comfirm'=> $comfirm]);
    }  
  
    function comfirmupdate($id, Request $req){
        // return $id;
        $valation=$req->validate([
            'progress'=>"required"
        ]);
    if($valation){

       $task_project=Task::find($id);
       $task_project->progress=$req->progress;
       $test_progress=$req->progress;
       $remark=$req->remark;

       if($remark <> ''){
        $task_project->remark=$remark;
       }
       else{
        $task_project->remark="Na";
       }

       if($test_progress == '100'){
        $date = Carbon::now();
        $task_project->completedate=$date;
        $task_project->status="complete";
       
        
        $task_project->completedate=$date;
       }elseif($test_progress < '100'){
        $task_project->status="In Progress";
        $task_project->completedate="Na";

       }
       elseif($test_progress == '0'){
        $task_project->status="Not Started";
        $task_project->completedate="Na";

       }
       else{
        $task_project->status="On Hold";
        $task_project->completedate="Na";

       }
        // return $task_project;

        $task_project->update();
        return back()->with("success", "Successfully Comfirmed.");
        // return redirect()->route('complete');
       }
        else{
            return back()->withErrors($valation);

        }
    }
   
    function complete(){      
        $tasklist = Task::where('progress', '=', 100)->get();    
        // return $tasklist;
        return view("completelist", ['complete' => $tasklist]);
    }
    function pending(){      
        $tasklist = Task::where('progress', '<', 100)
        ->where('progress', '!=', "Na")        
        ->get();    
        // return $tasklist;
        return view("pendinglist", ['pending' => $tasklist]);
    }   
    function onhold(){
      
        $tasklist = Task::where('progress', '=', 'OH')->get();    
        // return $tasklist;
        return view("onholdlist", ['onhold' => $tasklist]);
    }  
    function notstarted(){      
        $tasklist = Task::where('progress', '=', 'NS')->get();    
        // return $tasklist;
        return view("notstartedlist", ['notstarted' => $tasklist]);
    }
    function assignPerson() {
        return view('assignPerson');
    }
    
    function assignto() {
        return view('assignto');
    }     
    function project() {
        return view('project');
    }     

    function assignPInsert(Request $reqs) {
        // return view('index');
        
        $valation=$reqs->validate([
            'person'=>"required",
            'id_number'=>"required",
            'position'=>"required"

        ]);
        if($valation){
            $task_projectsss =new Assign();
            $task_projectsss->person=$reqs->person;
            $task_projectsss->id_number=$reqs->id_number;
            $task_projectsss->position=$reqs->position;

            $task_projectsss->save();           
            return back()->with("success", "Successfully added.");

        }
        else{
            return back()->withErrors($valation);

        }
    }  

    function assignToinsert(Request $req) {
        // return view('index');
        $valation=$req->validate([
            'to'=>"required",
            'id_number'=>"required",
            'position'=>"required",

        ]);
        if($valation){
            $task_project = new Assignto();
            $task_project->to=$req->to;
            $task_project->id_number=$req->id_number;
            $task_project->position=$req->position;


            $task_project->save();
            return back()->with("success", "Successfully added.");

        }
        else{
            return back()->withErrors($valation);

        }
    } 
    
    function projectInsert(Request $req) {
        // return view('index');
        $valation=$req->validate([
            'project_name'=>"required"
            

        ]);
        if($valation){
            $task_project = new Project();
            $task_project->project_name=$req->project_name;
            

            $task_project->save();
            return back()->with("success", "Successfully added.");

        }
        else{
            return back()->withErrors($valation);

        }
    }  
    function assignPersonlist(){
        $assignPersonlist=Assign::all();        
        return view("assignPersonlist", ['assignPersonlist' => $assignPersonlist]);
    }
    function assignTolist(){
        $assignTolist=Assignto::all();        
        return view("assignTolist", ['assignTolist' => $assignTolist]);
    }
    function projectList(){
        $projectList=Project::all();        
        return view("projectList", ['projectList' => $projectList]);
    }

    function projectselect(){
        $projectselect=Project::all(); 
        $assignselect=Assign::all();     
        $assignto=Assignto::all();   

        return view("index", ['projectselect' => $projectselect,'assignselect' => $assignselect,'assignto' => $assignto]);
    }  

      

    function editAssignperson($id){
        // return $id;
        // return view("edit");
        $editAssignperson = Assign::find($id);
        return view("editAssignperson",['editAssignperson'=> $editAssignperson]);
    }
    function updateAssignperson($id, Request $req){
        //return $id;
        $updateAssignperson=Assign::find($id);

        $updateAssignperson->person=$req->person;
        $updateAssignperson->id_number=$req->id_number;        
        $updateAssignperson->position=$req->position;

        $updateAssignperson->update();
        return redirect()->route('assignPersonlist');
    }
    function deleteAssignperson($id){
        $delete_Assignperson = Assign::find($id);
        $delete_Assignperson->delete();
        return back()->with("delete", "$delete_Assignperson->person 's Name is deleted");
    }

    function editassignTo($id){
        // return $id;
        // return view("edit");
        $editassignTo = Assignto::find($id);
        return view("editassignTo",['editassignTo'=> $editassignTo]);
    }
    function updateassignTo($id, Request $req){
        //return $id;
        $updateassignTo=Assignto::find($id);

        $updateassignTo->to=$req->to;
        $updateassignTo->id_number=$req->id_number;        
        $updateassignTo->position=$req->position;

        $updateassignTo->update();
        return redirect()->route('assignTolist');
    }
    function deleteassignTo($id){
        $deleteassignTo = Assignto::find($id);
        $deleteassignTo->delete();
        return back()->with("delete", "$deleteassignTo->to 's Name is deleted");
    }
    function editproject($id){
        // return $id;
        // return view("edit");
        $editproject = Project::find($id);
        return view("editproject",['editproject'=> $editproject]);
    }
    function updateproject($id, Request $req){
        //return $id;
        $updateproject=Project::find($id);
        $updateproject->project_name=$req->project_name;
        $updateproject->update();
        return redirect()->route('projectList');
    }
    function deleteproject($id){
        $deleteproject = Project::find($id);
        $deleteproject->delete();
        return back()->with("delete", "$deleteproject->project_name 's Name is deleted");
    }


}
