@extends('layouts.app')
@section('content')
        <h1 class="title">Edit file</h1>
        <form method="POST" action="/project/{{$project->id}}" style="margin-bottom: 1em;">
            {{method_field('PATCH')}}
            {{ csrf_field() }}

            <div class="field">
                <label class="label" for="title">title</label>

                <div class="control">
                    <input type="text" class="input" name="title" palecholder="Title" value="{{$project->title}}">

                </div>
            </div>
            <div class="field">
                <label class="label" for="description">definition</label>
                <div class="control">
                    <textarea name="description" class="textarea">{{$project->description}}</textarea>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link">Update</button>
                </div>
            </div>
        </form>
    @endsection
