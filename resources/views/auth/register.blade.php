@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1 class="text-center">Register</h1>
        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-success btn-block">Register</button>
        </form>
        <p class=" text-center mt-2">Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>
</div>
@endsection
