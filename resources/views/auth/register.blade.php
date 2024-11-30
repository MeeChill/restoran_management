```php
@extends('layouts.app')

@section('content')
<div class="register-container">
    <div class="register-wrapper">
        <div class="card register-card">
            <div class="card-content">
                <!-- Left Side - Illustration -->
                <div class="register-illustration">
                    <div class="illustration-overlay"></div>
                    <div class="illustration-content">
                        <h3>Restaurant Management</h3>
                        <p>Streamline Your Restaurant Operations</p>
                        <div class="illustration-icons">
                            <i class="fas fa-utensils"></i>
                            <i class="fas fa-chart-line"></i>
                            <i class="fas fa-cash-register"></i>
                        </div>
                    </div>
                </div>

                <!-- Right Side - register Form -->
                <div class="register-form">
                    <div class="form-header">
                        <div class="logo-container">
                            <i class="fas fa-utensils logo-icon"></i>
                        </div>
                        <h2>Register Your Account</h2>
                        <p>register to your account</p>
                    </div>

                    <form action="{{ url('/register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-icon">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text"
                                       class="form-control"
                                       name="username"
                                       required
                                       placeholder="Username"
                                       autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-icon">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password"
                                       class="form-control"
                                       name="password"
                                       required
                                       placeholder="Password">
                                <span class="input-group-toggle">
                                    <i class="fas fa-eye-slash"></i>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-icon">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password"
                                       class="form-control"
                                       name="confrim-password"
                                       required
                                       placeholder="confrim-password"
                                       autocomplete="off">
                            </div>
                        </div>

                        <button type="submit" class="btn-register">
                            register
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>

                    <div class="register-link">
                        <p>Already Have an Account?
                            <a href="{{ route('login') }}">
                                login Now
                                <i class="fas fa-user-plus"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    :root {
        --primary-color: #4a69bd;
        --secondary-color: #1e90ff;
        --text-color: #2f3542;
        --background-color: #f1f2f6;
    }

    .content {
        margin: 0px;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: var(--background-color);
        line-height: 1.6;
    }

    .register-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 2rem 20px 20px 20px;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }

    .register-wrapper {
        width: 100%;
        max-width: 1000px;
    }

    .register-card {
        display: flex;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        background: white;
    }

    .card-content {
        display: flex;
        width: 100%;
    }

    .register-illustration {
        flex: 1;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        position: relative;
        color: white;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .illustration-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.1);
    }

    .illustration-content {
        position: relative;
        z-index: 1;
        text-align: center;
    }

    .illustration-icons {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        gap: 20px;
    }

    .illustration-icons i {
        font-size: 40px;
        opacity: 0.7;
    }

    .register-form {
        flex: 1;
        padding: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .form-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .logo-icon {
        font-size: 50px;
        color: var(--primary-color);
        margin-bottom: 20px;
    }

    .input-group {
        position: relative;
        margin-bottom: 20px;
    }

    .input-group-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--primary-color);
        z-index: 2;
    }

    .form-control {
        width: 100%;
        padding: 15px 15px 15px 45px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 10px rgba(74, 105, 189, 0.1);
    }

    .input-group-toggle {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: var(--primary-color);
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .custom-checkbox {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .custom-checkbox input {
        margin-right: 10px;
    }

    .forgot-password {
        color: var(--primary-color);
        text-decoration: none;
    }

    .btn-register {
        width: 100%;
        padding: 15px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 18px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-register:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(74, 105, 189, 0.2);
    }

    .social-register {
        margin-top: 30px;
        text-align: center;
    }

    .divider {
        position: relative;
        margin-bottom: 20px;
    }

    .divider span {
        background: white;
        padding: 0 15px;
        position: relative;
        z-index: 1;
        color: #777;
    }

    .divider::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: #e0e0e0;
        z-index: 0;
    }

    .social-buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .btn-social {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-social.google { background-color: #db4437; }
    .btn-social.facebook { background-color: #4267B2; }
    .btn-social.twitter { background-color: #1DA1F2; }

    .btn-social:hover {
        transform: scale(1.1);
    }

    .register-link {
        text-align: center;
        margin-top: 20px;
    }

    .register-link a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: bold;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const passwordToggle = document.querySelector('.input-group-toggle');
    const passwordInput = document.querySelector('input[name="password"]');

    passwordToggle.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye-slash');
        this.querySelector('i').classList.toggle('fa-eye');
    });

    // Optional: Add form submission loading state
    const registerForm = document.querySelector('form');
    const registerButton = registerForm.querySelector('button[type="submit"]');

    registerForm.addEventListener('submit', function() {
        registerButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Logging in...';
        registerButton.disabled = true;
    });
});
</script>
@endsection
