<!doctype html>
@extends('layouts.app')
@section('content')
    <title>prg05</title>


    <body>
    <h1>Welcome</h1>
    <div class="row justify-content-center">
        @foreach($positions as $position)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$position->description}}</h5>
                    <p class="card-text">{{$position->position_1}}</p>
                    <p class="card-text">{{$position->position_2}}</p>

                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
    @endforeach
    </body>
@endsection

