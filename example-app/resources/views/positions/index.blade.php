<?php
?>
    <!doctype html>
<html lang="en">
@extends('layouts.app')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Your Positions</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-primary" href="{{ route('positions.create') }}"> Create Position</a>
            </div>
        </div>
    </div>
<body>
<div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
    <form method="GET" action="#">
        <input type="text"  placeholder="Search" class="bg-transparent placeholder-black font-semibold text-sm"></form>
    </form>
</div>
<div>
    <a href="{{route('positions.index')}}" class="btn btn-primary btn-sm">Everything</a>

    @foreach($categories as $category)
        <a href="{{route('positions.index', ['category' => $category->id])}}"
           class="btn btn-primary btn-sm">{{$category->name}}</a>
    @endforeach

</div>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Move 1</th>
        <th>Description 1</th>
        <th>Move 2</th>
        <th>Description 2</th>
        <th>Visibility</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($positions as $position)
        <tr>
            <td>{{ $position->id }}</td>
            <td>{{ $position->position }}</td>
            <td>{{ $position->move_1 }}</td>
            <td>{{ $position->description_1 }}</td>
            <td>{{ $position->move_2 }}</td>
            <td>{{ $position->description_2 }}</td>
            <td>{{ $position->visibility }}</td>
            <td>
                <form action="{{ route('positions.destroy',$position->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('positions.edit',$position->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>


        </tr>
    @endforeach
    </tbody>
</table>
</body>
@endsection
</html>
