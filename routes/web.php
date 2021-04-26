<?php

use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', [TaskController::class, "index"])->name("home");

Route::post('/inserts',[TaskController::class,"inserts"])->name("inserts");
Route::get('/task-filtering', [TaskController::class,"indexFiltering"])->name("indexFiltering");
Route::get('/tasklist', [TaskController::class, "task"])->name("task");

Route::get('/update', [TaskController::class, "update"])->name("update");

Route::get('/update/edit/{id}', [TaskController::class, "edit"])->name("edit");

Route::post('/complete/comfirmupdate/{id}',[TaskController::class, 'comfirmupdate'])->name("comfirmupdate");

Route::get('/completelist', [TaskController::class, "complete"])->name("complete");

Route::get('/pendinglist', [TaskController::class, "pending"])->name("pending");

Route::get('/onhold', [TaskController::class, "onhold"])->name("onhold");

Route::get('/notstarted', [TaskController::class, "notstarted"])->name("notstarted");


Route::get('/assignPerson', [TaskController::class, "assignPerson"])->name("assignPerson");
Route::post('/assignPInsert',[TaskController::class,"assignPInsert"])->name("assignPInsert");
Route::get('/assignPersonlist', [TaskController::class, "assignPersonlist"])->name("assignPersonlist");
Route::get('/updateAssignperson/edit/{id}', [TaskController::class, "editAssignperson"])->name("editAssignperson");
Route::post('/assignPerson/update/{id}',[TaskController::class, 'updateAssignperson'])->name("updateAssignperson");
Route::get('/assignPerson/{id}', [TaskController::class,"deleteAssignperson"])->name("deleteAssignperson");


Route::get('/assignTo', [TaskController::class, "assignTo"])->name("assignTo");
Route::post('/assignToinsert',[TaskController::class,"assignToinsert"])->name("assignToinsert");
Route::get('/assignTolist', [TaskController::class, "assignTolist"])->name("assignTolist");
Route::get('/updateassignTo/edit/{id}', [TaskController::class, "editassignTo"])->name("editassignTo");
Route::post('/assignTo/update/{id}',[TaskController::class, 'updateassignTo'])->name("updateassignTo");
Route::get('/assignTo/{id}', [TaskController::class,"deleteassignTo"])->name("deleteassignTo");


Route::get('/project', [TaskController::class, "project"])->name("project");
Route::post('/',[TaskController::class,"projectInsert"])->name("projectInsert");
Route::get('/projectList', [TaskController::class, "projectList"])->name("projectList");
Route::get('/updateproject/edit/{id}', [TaskController::class, "editproject"])->name("editproject");
Route::post('/project/update/{id}',[TaskController::class, 'updateproject'])->name("updateproject");
Route::get('/project/{id}', [TaskController::class,"deleteproject"])->name("deleteproject");

Route::get('/', [TaskController::class, "projectselect"])->name("home");

Route::get('/update/editTask/{id}', [TaskController::class, "editTask"])->name("editTask");
Route::post('/update/update/{id}',[TaskController::class, 'updateTask'])->name("updateTask");
Route::get('/delete/deleteTask/{id}', [TaskController::class, "deleteTask"])->name("deleteTask");





