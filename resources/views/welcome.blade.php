@extends('layouts.app')
@section('content')

<div class="jumbotron">
    <h1 class="display-4">Hello, world!</h1>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('register') }}">{{ __('Register') }}</a>
    </p>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <center>
                <div class="card-body">
                    <h5 class="card-title">Nosso Objetivo</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, saepe ipsum iusto odit aut in corrupti rerum quam, deserunt sapiente nobis accusamus. Aspernatur inventore esse, sunt a modi quasi aperiam.</p>
                </div>
            </center>
        </div>
        <div class="col-sm">
            <center>
                <div class="card-body">
                    <h5 class="card-title">Como funiona?</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat ad quis eos cumque dolorem labore aliquam, temporibus iste nobis consequatur. Incidunt unde ratione quod quae praesentium. Cum molestias sequi temporibus.</p>
                </div>
            </center>
        </div>
    </div>
</div>
@endsection