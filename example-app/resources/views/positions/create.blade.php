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
                    <h2>Add Build</h2>
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
                        <strong>Position 1:</strong>
                        <input type="text" name="position 1" class="form-control" placeholder="position 1">
                        @error('position_1')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Position 2:</strong>
                        <input type="text" name="position 2" class="form-control" placeholder="position 2">
                        @error('position_2')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <input type="text" name="description" class="form-control" placeholder="Description">
                        @error('description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
    </body>

    @endsection
</html>
