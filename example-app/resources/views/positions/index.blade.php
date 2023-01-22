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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <title>Document</title>
</head>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Your Positions</h2>
            </div>
            <div class="pull-right mb-2">
{{--                @if(Auth::user()->role_invalid)--}}

                    <div class="pull-right mb-2">
                        <a class="btn btn-primary" href="{{ route('positions.create') }}"> Create Position</a>
                    </div>
{{--                @else--}}
{{--                    <div class="pull-right mb-2">--}}
{{--                        <button class="btn-secondary" onclick="myFunction()">Create Position</button>--}}
{{--                    </div>--}}

{{--                    <script>--}}
{{--                        function myFunction() {--}}
{{--                            alert("Account is Younger than 1 day");--}}
{{--                        }--}}
{{--                    </script>--}}

{{--                @endif--}}
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
<form action="{{route('position.search')}}" method="post">
    @csrf
    <label for="search">Search:</label>
    <input id="search" type="text" name="search">
    <input name="submit" type="submit" class="btn btn-primary"/>
</form>
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
            <td><form>@csrf
                    <input data-id="{{$position->id}}" class="toggle-class" type="checkbox" data-onstyle="success"
                           data-offstyle="danger" data-toggle="toggle" data-on="Active"
                           data-off="InActive" {{ $position->visibility ? 'checked' : '' }}>
                </form></td>
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
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                const visibility = $(this).prop('checked') === true ? 1 : 0;
                const position_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('positions.visibility-update') }}',
                    data: {'visibility': visibility, 'position_id': position_id},
                    success: function(data){
                        console.log(data.success)
                    }
                });
            })
        });
    </script>
@endsection
</html>
