@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1 class="text-center">Edit Category</h1>
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}" required>
            </div>
            <button type="submit" class="btn btn-warning btn-block">Update Category</button>
        </form>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-block mt-2">Back to Category List</a>
    </div>
</div>
@endsection
