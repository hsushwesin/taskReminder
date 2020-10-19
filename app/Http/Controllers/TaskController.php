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
                $task_project->weekend="Na";
                $task_project->start_date="Na";
                $task_project->end_date="Na";
            }
            if($type == "Weekly"){
                $work="Na";$start="Na";$end="Na";
                $task_project->type_task=$type ;
                $task_project->workday="Na";
                $task_project->weekend=$week;
                $task_project->start_date="Na";
                $task_project->end_date="Na";
            }
            if($type == "Monthly"){
                $work="Na";$week="Na";
                $task_project->type_task=$type ;
                $task_project->workday="Na";
                $task_project->weekend="Na";
               
                $task_project->start_date=$req->start_date;
                $task_project->end_date=$req->end_date;               

            }
            if($type == "Others"){
                $work="Na";$week="Na";
                $task_project->type_task=$type ;
                $task_project->workday="Na";
                $task_project->weekend="Na";
               
                $task_project->start_date=$req->start_date3;
                $task_project->end_date=$req->end_date3;     
            }
            if($type == "Yearly"){
                $work="Na";$week="Na";
                $task_project->type_task=$type ;
                $task_project->workday="Na";
                $task_project->weekend="Na";
               
                $task_project->start_date=$req->start_date4;
                $task_project->end_date=$req->end_date4;     
            }

            $task_project->input_date=$req->input_date;
            $task_project->project=$req->project;
            $task_project->task_name=$req->task_name;
            $task_project->task_detail=$req->task_detail;

            $task_project->assigned_person=$req->assigned_person;
            $task_project->assigned_to=$req->assigned_to;
            $task_project->message=$req->message;

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
    function task(){
        $tasklist=Task::all();       

        // $assignshow =task::table('tasks')
        // ->join('assigns','tasks.assigned_person', '=', 'assigns.id')
        // ->select('tasks.assigned_person', 'assigns.id')
        // ->get();     
                        
        // return view("tasklist", ['task' => $tasklist,'assignshow' => $tasklist]);
        return view("tasklist", ['task' => $tasklist]);

    }
    function update(){

        // $updatetoday=Task::all();        
        
        $updatetoday = Task::where('start_date', '<=', Carbon::now())
        ->where('end_date', '>=', Carbon::now())
        ->where('workday', '=', "Daily")
        ->get();

        // $updatetoday = Task::whereRaw('(now() between start_date and end_date)')
        // ->where('workday', '=', 'Daily')->get();

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

       $task_project=Task::find($id);
       $task_project->progress=$req->progress;
       $test_progress=$req->progress;
       $task_project->progress=$req->progress;
       if($test_progress == '100'){
        $task_project->status="complete";
       
        $date = Carbon::now();
        $task_project->completedate=$date;
       }elseif($test_progress < '100'){
        $task_project->status="In Progress";
        $task_project->completedate="NA";

       }
       elseif($test_progress == '0'){
        $task_project->status="Not Started";
        $task_project->completedate="NA";

       }
       else{
        $task_project->status="On Hold";
        $task_project->completedate="NA";

       }
        // return $task_project;

        $task_project->update();
        return redirect()->route('complete');

    }
   
    function complete(){      
        $tasklist = Task::where('progress', '=', 100)->get();    
        // return $tasklist;
        return view("completelist", ['complete' => $tasklist]);
    }
    function pending(){      
        $tasklist = Task::where('progress', '<', 100)->get();    
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
