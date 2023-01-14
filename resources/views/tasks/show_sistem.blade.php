@extends('layouts.app')
@section('title', $sistem->name . ' - task app')
@section('content')
    <div>
        <div class="d-flex justify-content-between">
            <h1>{{$sistem->sistem}}</h1>
            <div>
                <a href="{{ route('tasks.sistem')}} " class='btn btn-lg btn-warning'>Go back</a>
            </div>
        </div>
        <br> pelaksana
        <b>{{ $sistem->sistem }}</b>
    </div>
@endsection