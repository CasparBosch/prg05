<?php
?>
    <!doctype html>
<html lang="en">
@extends('layouts.app')

@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Add Position</title>
    </head>

    <body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Position</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('positions.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('positions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Position:</strong>
                        <input type="text" name="position" class="form-control" placeholder="position">
                        @error('position')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Move 1:</strong>
                        <input type="text" name="move 1" class="form-control" placeholder="move 1">
                        @error('move_1')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description 1:</strong>
                        <input type="text" name="description 1" class="form-control" placeholder="Description 1">
                        @error('description_1')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Move 2:</strong>
                        <input type="text" name="move 2" class="form-control" placeholder="move 2">
                        @error('move_2')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description 2:</strong>
                        <input type="text" name="description 2" class="form-control" placeholder="Description 2">
                        @error('description_2')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <label for="category_id" class="form-label">Choose Category:</label>
                <select id="category_id"
                        name="category_id"
                        class="@error('category_id') is-invalid @enderror form-select">
                    <option @if(old('category_id') == '')selected @endif disabled hidden style='display: none'
                            value=''></option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" class="dropdown-item">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="">{{$message}}</span>
                @enderror


                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
    </body>

    @endsection
</html>
