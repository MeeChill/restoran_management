@extends('layouts.app')

@section('content')
<div class="category-container">
    <div class="page-header">
        <h1><i class="fas fa-list"></i> Category Management</h1>
        @if (Auth::user()->role === 'admin')
        <div class="header-actions">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Add New Category
            </a>
        </div>
        @endif
    </div>

    <div class="card category-list-card">
        <div class="card-header">
            <h3>All Categories</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            @if (Auth::user()->role === 'admin')
                            <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->category_name }}</td>
                            @if (Auth::user()->role === 'admin')
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                <div class="no-data-placeholder">
                                    <i class="fas fa-list"></i>
                                    <p>No categories found</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
.category-container {
    background-color: #f8f9fa;
    padding: 20px;
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.page-header h1 {
    margin: 0;
    color: #333;
    font-size: 24px;
}

.page-header h1 i {
    margin-right: 10px;
    color: #2196F3;
}

.header-actions .btn {
    display: flex;
    align-items: center;
}

.header-actions .btn i {
    margin-right: 5px;
}

.category-list-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.category-list-card .card-header {
    background: linear-gradient(45deg, #2196F3, #64B5F6);
    color: white;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.table-responsive {
    max-height: 600px;
    overflow-y: auto;
}

.no-data-placeholder {
    text-align: center;
    padding: 50px;
    color: #999;
}

.no-data-placeholder i {
    font-size: 64px;
    margin-bottom: 20px;
    color: #ddd;
}

.btn-group .btn {
    padding: 5px 10px;
}
</style>
@endsection
