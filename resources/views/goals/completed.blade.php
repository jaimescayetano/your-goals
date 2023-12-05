@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="container-fluid text-center py-4">
                <h1>Goals Completed</h1>
                <p>
                    Congratulations on reaching your goals! Your dedication and effort are inspiring. May this achievement
                    be just the beginning of a journey filled with success and accomplishments. We are very proud of you! 🌟
                </p>
                <a href="{{ route('home') }}" class="btn btn-info">
                    Goal List
                </a>
            </div>

            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>title</th>
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
                                <a class="btn btn-secondary" href="{{ route('goals.complete', $goal->id) }}"
                                    style="width: 100px">discard</a>
                                <br>
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
