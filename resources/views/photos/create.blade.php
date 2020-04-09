@extends('layouts.app')

@section('content')

<h1>Upload New Photo</h1>
<hr>
{{ Form:: open( ['action' => 'PhotosController@store', 'method'=>'POST', 'enctype'=>"multipart/form-data"]) }}
    <input type="hidden" name="album-id" value="{{ $album_id }}">

    <div class="form-group">
      <label for="title">Title</label>
      <input name="title" type="text" class="form-control" placeholder="Title of Photo">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <input name="description" type="text" class="form-control" placeholder="Description of Album">
    </div>

    <div class="form-group">
        <label for="photo">Photo</label>
        <input name="photo" type="file">
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>


{{ Form::close() }}

@endsection

