@extends('layouts.app')
@section('title', 'sistem')
@section('content')
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between">
                <div>
                    <h3>TodoList</h3>
                </div>
            </div>
            <div class="btn-group" role="group">
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">pelaksana</th>
                        <th scope="col">todoApps</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($sistem as $sistem)
                        <tr>
                            <td><a href="{{ route('tasks.show', $sistem->id) }}">{{ $sistem->sistem }}</a></td>
                            <td class='{{ $sistem->is_completed ? 'text-success' : 'text-warning' }}'>
                                {{ $sistem->is_completed ? 'Completed' : 'Pending' }}
                            </td>
                            <td>
                                @foreach ($sistem->task1 as $sistem)
                                    {{ strtoupper($sistem->sistem) }} <br />
                                @endforeach
                            </td>

                            <td>
                                <div class='btn-group'>
                                    {{-- <a href="{{ route('sistem.show', $sistem->id) }}" class='btn btn-info btn-sm'>
                                    <i class="material-icons">view_headline</i>
                                </a> --}}
                                    {{-- <a href="" class="btn {{ $sistem->complete ? 'btn-warning' : 'btn-success' }} btn-sm"
                                   onclick="event.preventDefault(); document.getElementById('complete_form{{ $loop->iteration }}').submit();">
                                    <i class="material-icons">{{ $sistem->complete ? 'cancel' : 'done' }}</i>
                                </a> --}}
                                    {{-- <form action="{{ route('sistem.complete', $sistem->id) }}" method="post"
                                      id='complete_form{{ $loop->iteration }}'>
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                </form> --}}

                                </div>
                            </td>
                        </tr>
                    @empty
                        <p>No sistem</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
