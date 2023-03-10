@extends('layouts.app')
@section('title','Create new task')

@section('styles')
    <script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
@endsection

@section('content')
    <div class="d-flex justify-content-between">
        <div>
            <h2>Create task</h2>
        </div>
        <div>
            <a href="{{ route('tasks.index') }}" class='btn btn-lg btn-warning'>Go back</a>
        </div>
    </div>
    @include('particles.errors')
    @include('particles.alert')
    <form name='create_form' method="post" action="{{ route('tasks.store') }}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" maxlength='150' required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description"></textarea>
            <script>
                CKEDITOR.replace('description');
            </script>
        </div>

        <div class="form-group col-md-4">
            <label>Pilih Sistem Kerja</label>
            <br>
            <select class="col-md-12 form-control @error('sistem')is-invalid @enderror" name="sistem" required>
                <option value="" selected>--Pilih sistem kerja--</option>
                @foreach ($sistem as $data)
                    <option value="{{ $data->sistem }}">{{ $data->sistem }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Add Task</button>
        </div>
    </form>
@endsection