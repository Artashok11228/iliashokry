@extends('layouts.app')

@section('title', 'Login')

@push('styles')
<style>
    .auth-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #ffffff 0%, #f5f5f5 100%);
        padding: 2rem;
    }

    .auth-card {
        background-color: #ffffff;
        border: 2px solid #000000;
        border-radius: 8px;
        padding: 3rem;
        width: 100%;
        max-width: 450px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .auth-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .auth-header h1 {
        font-size: 2rem;
        font-weight: 700;
        color: #000000;
        margin-bottom: 0.5rem;
    }

    .auth-header p {
        color: #666666;
        font-size: 0.95rem;
    }

    .form-control {
        width: 100%;
        padding: 0.875rem;
        border: 2px solid #000000;
        border-radius: 4px;
        font-size: 1rem;
        background-color: #ffffff;
        color: #000000;
        transition: all 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: #333333;
        box-shadow: 0 0 0 3px rgba(0,0,0,0.1);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #000000;
        font-size: 0.95rem;
    }

    .form-check {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .form-check-input {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: #000000;
    }

    .form-check-label {
        color: #000000;
        font-size: 0.9rem;
        cursor: pointer;
    }

    .btn-login {
        width: 100%;
        padding: 0.875rem;
        background-color: #000000;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        margin-bottom: 1rem;
    }

    .btn-login:hover {
        background-color: #333333;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .auth-footer {
        text-align: center;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e0e0e0;
    }

    .auth-footer a {
        color: #000000;
        text-decoration: none;
        font-weight: 600;
        transition: opacity 0.3s;
    }

    .auth-footer a:hover {
        opacity: 0.7;
        text-decoration: underline;
    }

    .error-message {
        color: #000000;
        background-color: #f5f5f5;
        border: 1px solid #000000;
        padding: 0.75rem;
        border-radius: 4px;
        margin-bottom: 1rem;
        font-size: 0.9rem;
    }

    .error-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .error-list li {
        color: #000000;
        margin-bottom: 0.25rem;
    }
</style>
@endpush

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h1>Login</h1>
            <p>Sign in to your account</p>
        </div>

        @if($errors->any())
            <div class="error-message">
                <ul class="error-list">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus
                    placeholder="Enter your email"
                >
                @error('email')
                    <span style="color: #000000; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    required
                    placeholder="Enter your password"
                >
                @error('password')
                    <span style="color: #000000; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-check">
                <input 
                    type="checkbox" 
                    id="remember" 
                    name="remember" 
                    class="form-check-input"
                >
                <label for="remember" class="form-check-label">Remember me</label>
            </div>

            <button type="submit" class="btn-login">
                Sign In
            </button>
        </form>

        <div class="auth-footer">
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
        </div>
    </div>
</div>
@endsection

