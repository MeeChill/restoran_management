@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1 class="text-center">Edit Menu</h1>
        <form action="{{ route('menus.update', $menu) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Menu Name</label>
                <input type="text" class="form-control" name="name" value="{{ $menu->name }}" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" value="{{ $menu->price }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description " required>{{ $menu->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $menu->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-warning btn-block">Update Menu</button>
        </form>
        <a href="{{ route('menus.index') }}" class="btn btn-secondary btn-block mt-2">Back to Menu List</a>
    </div>
</div>
@endsection
