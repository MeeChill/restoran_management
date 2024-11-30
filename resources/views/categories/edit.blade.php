@extends('layouts.app')

@section('content')
<div class="edit-category-container">
    <div class="edit-category-header">
        <h1><i class="fas fa-list"></i> Edit Category</h1>
        <p class="text-muted">Edit the category details</p>
    </div>

    <div class="content-row">
        <div class="col-md-8">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <h5 for="name">Category Name</h5>
                    <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

<style>


.edit-category-container {
    padding: 20px;
    background-color: #f8f9fa;
}

.edit-category-header {
    margin-bottom: 30px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.edit-category-header h1 {
    font-size: 24px;
    color: #333;
}

.edit-category-header h1 i{
    color: #2196F3;
}

.content-row {
    margin-bottom: 30px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
}

.btn {
    width: 150px;
}
</style>
@endsection
