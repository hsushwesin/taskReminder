<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['input_date','project','task_name','task_detail','type_task','workday',
    'weekend','start_date','end_date','assigned_person',
    'assigned_to','message','progress','status','completedate'];
    
    
    public function assign(){
        return $this->belongsTo(Assign::class,"assigned_person");

    }
    public function assignto(){
        return $this->belongsTo(Assignto::class,"assigned_to");
    }
    public function project(){
        return $this->belongsTo(Project::class,"project");
    }         
       



}