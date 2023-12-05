@extends('goals.template.header')

@section('title', 'New Goal')

@section('form')
    <form class="container" method="POST">
        @csrf
        <div class="mb-3 mt-3">
            <label for="title" class="form-label">Title:</label>
            <input maxlength="100" required type="text" class="form-control" id="title" placeholder="Enter title" name="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea maxlength="200" class="form-control" id="description" placeholder="Enter description" name="description"></textarea>
        </div>
        <div class="mb-3 mt-3">
            <label for="end_date" class="form-label">End date:</label>
            <input required type="date" class="form-control" id="end_date" name="end_date">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
