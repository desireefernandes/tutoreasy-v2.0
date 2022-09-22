@extends('layouts.app')
@section('content')


<div class="row">
    <div class="col">
        <div class="pull-left">
            <h2>Tutorials Index</h2>
        </div>
    </div>
</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@foreach ($posts as $post)
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('storage/'.$post->image->path) }}">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ url("/posts/{$post->id}")  }}">
                            {{$post->title}}
                        </a></h5>
                    <p class="card-text">{{$post->body}}</p>
                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                        <a class="btn btn-outline-secondary" href="{{ route('posts.show',$post->id) }}">
                            Show
                        </a>

                        <a class="btn btn-outline-primary" href="{{ route('posts.edit',$post->id) }}">
                            Edit
                        </a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            Delete
                        </button>
                        <a onclick="curtirPost()" href="{{ route('post.like', $post->id) }}" class="btn btn-outline-danger" id="like" name="like">
                            <i class="bi bi-heart-fill"></i>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<script>
    function curtirPost() {
        document.getElementById('like').classList.remove("btn-outilne-danger");
        document.getElementById('like').classList.add("btn-danger");
        document.getElementById('like').style.color = 'white';
    };
</script>

@endsection