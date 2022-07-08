@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col">
        <div class="pull-left">
            <h2>Edit post</h2>
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


<form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

     <div class="row">
        <div class="col">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}" required maxlength="255">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <strong>Body:</strong>
                <textarea class="form-control" name="body" required>{{ $post->body }}</textarea>
            </div>
        </div>
    </div>

    

      
    
    
	<div class="col text-center">
		<button type="submit" class="btn btn-primary col">Updade</button>
	</div>
    

</form>





@endsection