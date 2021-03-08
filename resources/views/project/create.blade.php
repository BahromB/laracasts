@extends('layouts.app')
@section('content')
<h1>Create new project</h1>
<form method="Post", action="/project">
    @csrf
    <div class="fiel">
        <label typle="label" for="title" >Project title</label>
        <div class="control">
            <input type="text" class="input {{  $errors->has('title')? 'is-danger' : ''}} "name="title" placeholder="Create title">
        </div>
    </div>
    <div class="fiel">
        <label typle="label" for="description">Project description</label>
        <div class="control">
            <input type="text" class="input" name="description"  placeholder="Create description">
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button class="button" type="button is link">Create</button>
        </div>
    </div>
   @include('errors')
</form>
@endsection
