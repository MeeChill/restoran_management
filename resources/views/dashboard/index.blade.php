@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Dashboard</h1>

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Menu</h5>
                    <p class="card-text">Total Menu: {{ $menus->count() }}</p>
                    <a href="{{ route('menus.index') }}" class="btn btn-primary">Lihat Menu</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Kategori</h5>
                    <p class="card-text">Total Kategori: {{ $categories->count() }}</p>
                    <a href="{{ route('categories.index') }}" class="btn btn-primary">Lihat Kategori</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pesanan</h5>
                    <p class="card-text">Total Pesanan: {{ $orders->count() }}</p>
                    <a href="{{ route('orders.index') }}" class="btn btn-primary">Lihat Pesanan</a>
                </div>
            </div>
        </div>
@endsection
