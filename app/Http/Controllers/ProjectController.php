<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }
    public function index()
    {
        $projects=Project::where('owner_id',auth()->id())->get();
        return view('project.index',compact('projects'));
    }


    public function create()
    {
        return view('project.create');
    }


    public function store()

    {
    $attributes=request()->validate([
        'title'=>'required',
        'description'=>'required'

    ]);   $attributes['owner_id']=auth()->id();
          Project::create($attributes);
                return redirect('/project');
    }


    public function show(Project $project)

    {
        abort_if($project->owner_id !== auth()->id(),403);

        return view('project.show',compact('project'));
    }

    public function edit(Project $project)
    {
        abort_if($project->owner_id !== auth()->id(),403);
             return view('project.edit', compact('project'));
    }


    public function update(Project $project)
    {
        if(request()->has('title') || request()->has( 'description') ) {
            $project->update(request(['title', 'description']));
            return redirect('/project');
        }
        else
            {
            $method = request()->has('completed') ? 'complete' : 'incomplete';
            error_log($method);
            $project->$method();
            return redirect('/project');

        }

    }


    public function destroy(Project $project)
    {
       $project->delete();

        return redirect('/project');
    }
    public function alldestroy()
    {
        $projects=Project::all();
        foreach($projects as $project)
        {
            if($project->completed==true)
                $project->delete();}

        return redirect('/project');
    }


}
