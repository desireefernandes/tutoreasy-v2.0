@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Perfil') }}</div>

                <div class="card-body">
                    {{ __('Name: ') }}
                    {{ Auth::user()->name }}
                    <br>
                    {{ __('Email: ') }}
                    {{ Auth::user()->email }}
                    <form action="{{ route('users.destroy', Auth::user()->id) }}" method="POST">

                        <a class="btn btn-outline-secondary" href="{{ route('users.show',Auth::user()->id) }}">
                            My Tutorials
                        </a>
                        <a class="btn btn-outline-primary" href="{{ route('users.edit',Auth::user()->id) }}">
                            Edit
                        </a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection