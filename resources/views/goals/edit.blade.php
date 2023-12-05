@extends('goals.template.header')

@section('title', 'Update Goal')

@section('form')
    <form class="container" method="POST" action="{{ route('goals.update', $goal->id) }}">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-3 mt-3">
            <label for="title" class="form-label">Title:</label>
            <input maxlength="100" required type="text" class="form-control" id="title" placeholder="Enter title" name="title"
                value="{{ $goal->title }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea maxlength="100" class="form-control" id="description" placeholder="Enter description" name="description">{{ $goal->description }}</textarea>
        </div>
        <div class="mb-3 mt-3">
            <label for="end_date" class="form-label">End date:</label>
            <input required type="date" class="form-control" id="end_date" name="end_date"
                value="{{ $goal->end_date }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
