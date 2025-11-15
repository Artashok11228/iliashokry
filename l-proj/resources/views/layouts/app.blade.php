<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Laravel App')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
            color: #000000;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .navbar {
            background-color: #000000;
            color: #ffffff;
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ffffff;
            text-decoration: none;
        }

        .navbar-nav {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .navbar-nav a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s;
        }

        .navbar-nav a:hover {
            opacity: 0.8;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #000000;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #333333;
        }

        .btn-secondary {
            background-color: #ffffff;
            color: #000000;
            border: 2px solid #000000;
        }

        .btn-secondary:hover {
            background-color: #f5f5f5;
        }

        .btn-danger {
            background-color: #000000;
            color: #ffffff;
        }

        .btn-danger:hover {
            background-color: #333333;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 4px;
            border-left: 4px solid;
        }

        .alert-error {
            background-color: #f5f5f5;
            border-color: #000000;
            color: #000000;
        }

        .alert-success {
            background-color: #f5f5f5;
            border-color: #000000;
            color: #000000;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #000000;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #000000;
            border-radius: 4px;
            font-size: 1rem;
            background-color: #ffffff;
            color: #000000;
        }

        .form-control:focus {
            outline: none;
            border-color: #333333;
            box-shadow: 0 0 0 3px rgba(0,0,0,0.1);
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .text-center {
            text-align: center;
        }

        .mt-1 { margin-top: 0.5rem; }
        .mt-2 { margin-top: 1rem; }
        .mt-3 { margin-top: 1.5rem; }
        .mt-4 { margin-top: 2rem; }
        .mb-1 { margin-bottom: 0.5rem; }
        .mb-2 { margin-bottom: 1rem; }
        .mb-3 { margin-bottom: 1.5rem; }
        .mb-4 { margin-bottom: 2rem; }

        @media (max-width: 768px) {
            .navbar-nav {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    @auth
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">My App</a>
            <ul class="navbar-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('profile') }}">Profile</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-secondary" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    @endauth

    <main>
        @if(session('success'))
            <div class="container mt-2">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="container mt-2">
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>

