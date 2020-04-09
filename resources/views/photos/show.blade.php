@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <h3 class="page-header">{{ $photo->title }}</h3>
    <p>{{ $photo->description }}</p>

        {{ Form:: open( ['action' => ['PhotosController@destroy',$photo->id], 'method'=>'POST', 'enctype'=>"multipart/form-data"]) }}
        {{ Form::hidden('_method','DELETE') }}
        <div class="btn-group">
            <a class="btn btn-info" href="{{ route('album-show', $photo->album_id) }}">Go Back</a>
            <button class="btn btn-danger" type="submit">Delete</button>
        </div>
        {{ Form::close() }}

    <hr>
    <img src="../storage/albums/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->photo }}" width="100%">
    <small class="text-muted">Size: {{ $photo->size }}</small>
    <hr>
</div>




@endsection
