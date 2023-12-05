@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="container-fluid text-center py-4">
                <h1>YourGoals</h1>
                <p>
                    "Achieve your goals with ease and joy. YourGoals is your friendly achievement manager. Make every day
                    count and celebrate your successes!"
                </p>
                <a href="{{ route('goals.create') }}" class="btn btn-info">
                    New Goal
                </a>
                <a href="{{ route('goals.completed') }}" class="btn btn-secondary">
                    Goals completed
                </a>
            </div>

            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 100px;">title</th>
                        <th>description</th>
                        <th>end_date</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($goals as $goal)
                        <tr>
                            <td>{{ $goal->title }}</td>
                            <td>
                                {{ $goal->description }}
                            </td>
                            <td>{{ $goal->end_date }}</td>
                            <td>
                                <a class="btn btn-info my-1" href="{{ route('goals.edit', $goal->id) }}" style="width: 100px">update</a> <br>
                                <a class="btn btn-success my-1" href="{{ route('goals.complete', $goal->id) }}"
                                    style="width: 100px">complete</a> <br>
                                <!-- Metodo delete desde boton -->
                                <form action="{{ route('goals.destroy', $goal->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger my-1" style="width: 100px">delete</button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
