@extends('layouts.app')
@section('content')
<h1>All Projects List</h1>
<a href="/project/create">Create New Projects</a>
 @if($projects->count())
     <div class="box">
         <ul>@foreach($projects as $project)
            <div  class="box">
               <form method="POST" action="/project/{{$project->id}}">
                @method('PATCH')
                @csrf
                   <label class="checkbox" for="completed">
                     <a href="/project/{{$project->id}}">{{$project->title}} </a>
                        <input  type="checkbox" name="completed"  onchange="this.form.submit()" {{$project->completed ? 'checked': ''}}>
                   </label>
                </form>
            </div>
         @endforeach
         </ul>
    </div>
    <form method="POST" action="/alldelete">
                @method('DELETE')
                @csrf
                <div class="field">
                    <div class="control">
                        <button class="button"  type="submit">Delete</button>
                    </div>
                </div>
            </form>
@endif
@endsection

