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
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection