@extends('layouts.app')
@section('content')



	<div class="row">
        <div class="col">
            <div class="pull-left">
                <h2>Posts Index</h2>
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
   

   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Created</th>
            <th>Updated</th>            
            <th>Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>
                <a href="{{ url("/posts/{$post->id}")  }}">
                    {{$post->title}}
                </a>
            </td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->updated_at }}</td>            
            
            <td>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a> 
                       
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection