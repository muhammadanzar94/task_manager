<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="top-banner">
            <h1>Tasks Management System</h1>
        </div>
        <div class="card-container">
            @foreach($tasks as $task)
                <div class="card selectable-card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->name }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
        <button id="delete-all" class="btn btn-danger delete-all-button">Delete All</button>
    </div>
@endsection
