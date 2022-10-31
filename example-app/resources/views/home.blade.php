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

                    <p class="card-text">{{$position->position}}</p>
                    <p class="card-text">{{$position->move_1}}</p>
                    <p class="card-text">{{$position->description_1}}</p>
                    <p class="card-text">{{$position->move_2}}</p>
                    <p class="card-text">{{$position->description_2}}</p>


                </div>
            </div>
    @endforeach
    </body>
@endsection

