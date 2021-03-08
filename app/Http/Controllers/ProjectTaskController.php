<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class ProjectTaskController extends Controller
{
    public function update(Task $task){


      $method= request()->has('completed')? 'complete' : 'incomplete';
      $task->$method();

     /*request()->has('completed')? $task->complete() : $task->incomplete();*/


        /*  if (request()->has('completed')){
            $task->complete();
        }
          else {
              $task->incomplete();
          }*/


       /* $task->complete(request()->has('completed'));*/


      /*  $task->update([
            'completed'=>request()->has('completed')
        ]);*/

        return back();
    }

             public function store(Project $project){

        $attirbute=request()->validate(['description'=>'required']);

        $project->addtask($attirbute);


        /* Task::create([
           'project_id'=> $project->id,
           'description'=>request('description'),*/
                 return back();

                                                    }




}
