@extends('layouts.app')
@section('content')
    <h1>Show Project</h1>
    <h1><a href="/project">Home</a></h1>
    <h1><a href="/project/{{$project->id}}/edit">Edit</a></h1>

    <ul>
        <li>
            <h1>{{$project->title}}</h1>
        </li>
        <li>
            <div>{{$project->description}}</div>
        </li>
    </ul>
    <form method="POST" action="/project/{{$project->id}}">
        @method('DELETE')
        @csrf
        <div class="field">
            <div class="control">
                <button class="button"  type="submit">Delete</button>
            </div>
        </div>
    </form>
    <h1>Tasks</h1>

    @if($project->tasks->count())
        <div class="box">
            <ul>  @foreach($project->tasks as $task)
                    <div  class="box">
                        <form method="POST" action="/tasks/{{$task->id}}">
                            @method('PATCH')
                            @csrf
                            <label class="checkbox {{$task->completed ? 'is-complete': ''}}" for="completed">
                                <input type="checkbox" name="completed"  onchange="this.form.submit()" {{$task->completed? 'checked': ''}}>
                                {{$task->description}}
                            </label>
                        </form>          </div>

                @endforeach
            </ul> </div>
    @endif

    <form  method="POST" action="/project/{{$project->id}}/tasks">
        @csrf
        <div>
            <label class="label" for="description">New Task</label>
            <div>
                <input class="input" type="text" name="description" placeholder="new Task">
            </div>
        </div>
        <div>
            <div>
                <button type="submit" class="button is-link">Add task</button>
            </div>
        </div>
    </form>

    @include('errors')



@endsection
