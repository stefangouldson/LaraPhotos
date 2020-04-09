@extends('layouts.app')

@section('content')

<h1>Create new To-Do</h1>
<hr>
{{ Form:: open( ['action' => 'AlbumsController@store', 'method'=>'POST', 'enctype'=>"multipart/form-data"]) }}

    <div class="form-group">
      <label for="name">Name</label>
      <input name="name" type="text" class="form-control" placeholder="Name Album">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <input name="description" type="text" class="form-control" placeholder="Description of Album">
    </div>

    <div class="form-group">
        <label for="cover-image">Cover Image</label>
        <input name="cover-image" type="file">
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>


{{ Form::close() }}

@endsection

