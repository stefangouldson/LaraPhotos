@extends('layouts.app')

@section('content')
<br>
@if (count($albums) > 0)

    <div class="row">
        @foreach($albums as $album)
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="./storage/album_covers/{{ $album->cover_image }}" alt="{{ $album->cover_image }}" height="200px">
            <div class="card-body">
              <p class="card-text">{{ $album->name }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a class="btn btn-sm btn-outline-secondary" href="{{ route('album-show', $album->id) }}">View</a>
                  {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                </div>
                <small class="text-muted">Album</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
@else
<h3>No Albums Yet</h3>
@endif

@endsection
