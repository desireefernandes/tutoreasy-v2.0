@extends('layouts.app')
@section('content')


    <div class="row">
        <div class="col">
            <div class="pull-left">
                <h2> Show Post</h2>
            </div>
        </div>
    </div>

    @isset($post->image)
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Image:</strong>
          <img src="{{ asset('storage/'.$post->image->path) }}">
        </div>
      </div>
    </div>
    @endisset

    <div class="card ">
          <div class="card-header">
            <h1>{{$post->title}}</h1>
          </div>
          
          <div class="card-body">
            <p class="card-text">{{$post->body}}</p>
          </div>
          <div class="card-footer text-muted">
            <div class="row">                    
                <div class="col-3">Created: {{$post->created_at}} </div>
                <div class="col-3">Updated: {{$post->updated_at}} </div>
            </div>
          </div>
    </div>

    


    

@endsection