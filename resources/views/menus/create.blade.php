@extends('layouts.app')

@section('content')
<div class="create-menu-container">
    <div class="create-menu-header">
        <h1><i class="fas fa-utensils"></i> Create Menu Item</h1>
        <p class="text-muted">Add a new menu item</p>
    </div>

    <div class="content-row">
        <div class="col-md-8">
            <form action="{{ route('menus.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <h5 for="name">Menu Item Name</h5>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <h5 for="category_id">Select Category</h5>
                    <select class="form-control" id="category_id" name="category_id" required>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <h5 for="price">Price</h5>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="form-group"> <label for="description">Description</label>
                    <textarea class="form-control" name="description" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('menus.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

<style>
.create-menu-container {
    padding: 20px;
    background-color: #f8f9fa;
}

.create-menu-header {
    margin-bottom: 30px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.create-menu-header h1 {
    font-size: 24px;
    color: #333;
}

.create-menu-header h1 i {
    margin-right: 10px;
    color: #4CAF50;
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



