<!doctype html>
@extends('layouts.app')
@section('content')
    <title>prg05</title>


    <body>
    <h1>Welcome</h1>

    <form action="{{route('home.search')}}" method="post">
        @csrf
        <label for="search">Search:</label>
        <input id="search" type="text" name="search">
        <input name="submit" type="submit" class="btn btn-primary"/>
    </form>

    <div>
    <a href="{{route('home')}}" class="btn btn-primary btn-sm">Everything</a>
    @foreach($categories as $category)
        <a href="{{route('home', ['category' => $category->id])}}"
           class="btn btn-primary btn-sm">{{$category->name}}</a>
    @endforeach
    </div>
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

    <div class="m-auto">

        {{$positions ->links()}}

    </div>

@endsection

