@extends('layouts.app')

@section('content')
<div class="create-category-container">
    <div class="create-category-header">
        <h1><i class="fas fa-list"></i> Create Category</h1>
        <p class="text-muted">Add a new category</p>
    </div>

    <div class="content-row">
        <div class="col-md-8">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <h5 for="name">Category Name</h5>
                    <input type="text" class="form-control" id="category_name" name="category_name" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

<style>



.create-category-container {
    padding: 20px;
    background-color: #f8f9fa;
}

.create-category-header {
    margin-bottom: 30px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.create-category-header h1 {
    font-size: 24px;
    color: #333;
}

.create-category-header h1 i{
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
