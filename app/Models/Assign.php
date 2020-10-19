<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    use HasFactory;
    protected $fillable = ['person','id_number','position'];
    // public function Task()
    // {
    //     return $this->hasMany('App\Models\Task');
    // }
}
