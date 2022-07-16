@extends('layouts.app')
@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create a new post</h2>
        </div>
    </div>
</div>


@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ops!</strong> There is a problem with the data entered: <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

   
   
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        <div class="col">
            <div class="form-group">


                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required maxlength="255">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <div class="form-group">
                <strong>Body:</strong>
                <textarea  class="form-control" name="body" required>{{ old('body') }}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <strong>Image:</strong>
                <input id="image" type="file" name="image" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <strong>PDF:</strong>
                <input id="pdf" type="file" name="pdf" class="form-control">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col text-center">
            <button type="submit" class="btn col btn-primary">CREATE</button>
        </div>
    </div>
   
</form>



@endsection