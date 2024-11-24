@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1 class="text-center">Add Category</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" name="category_name" required>
            </div>
            <button type="submit" class="btn btn-success btn-block">Add Category</button>
        </form>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-block mt-2">Back to Category List</a>
    </div>
</div>
@endsection
