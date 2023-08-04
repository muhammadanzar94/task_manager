@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($tasks as $task)
                @include('tasks.task_card', ['task' => $task])
            @endforeach
        </div>
    </div>
@endsection
