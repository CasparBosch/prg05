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
                <h2>All Positions made</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-primary" href="{{ route('positions.create') }}"> Create Position</a>
            </div>
        </div>
    </div>
<body>
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
        <th>position 1</th>
        <th>position 2</th>
        <th>Description</th>
        <th> Visibility</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($positions as $position)
        <tr>
            <td>{{ $position->id }}</td>
            <td>{{ $position->position_1 }}</td>
            <td>{{ $position->position_2 }}</td>
            <td>{{ $position->description }}</td>
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
