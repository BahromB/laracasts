<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
 protected $fillable=[ 'title','description' ,'completed','owner_id'
         ];
 Public function tasks()
 {
     return $this->hasMany(Task::class);

 }
 Public function addtask($description){


     $this->tasks()->create($description);



 }
    public function complete($completed=true)
    {
        $this->update(compact('completed'));
    }
    public function incomplete()
    {
        $this->complete(false);
    }

}
