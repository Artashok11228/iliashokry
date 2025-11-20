@extends('layouts.app')

@section('title', 'Home')

@push('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, #ffffff 0%, #f5f5f5 100%);
        padding: 4rem 2rem;
        text-align: center;
        border-bottom: 2px solid #000000;
    }

    .hero-section h1 {
        font-size: 3rem;
        font-weight: 700;
        color: #000000;
        margin-bottom: 1rem;
    }

    .hero-section p {
        font-size: 1.25rem;
        color: #666666;
        max-width: 600px;
        margin: 0 auto;
    }

    .content-section {
        padding: 3rem 2rem;
    }

    .card {
        background-color: #ffffff;
        border: 2px solid #000000;
        border-radius: 8px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 12px rgba(0,0,0,0.15);
    }

    .card h2 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #000000;
        margin-bottom: 1rem;
    }

    .card p {
        color: #666666;
        line-height: 1.8;
    }

    .btn {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background-color: #000000;
        color: #ffffff;
        text-decoration: none;
        border-radius: 4px;
        font-weight: 600;
        transition: all 0.3s;
        margin-top: 1rem;
    }

    .btn:hover {
        background-color: #333333;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .user-info {
        background-color: #f5f5f5;
        border: 1px solid #000000;
        padding: 1.5rem;
        border-radius: 4px;
        margin-bottom: 2rem;
    }

    .user-info h3 {
        color: #000000;
        margin-bottom: 0.5rem;
    }

    .user-info p {
        color: #666666;
        margin: 0.25rem 0;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    @media (max-width: 768px) {
        .hero-section h1 {
            font-size: 2rem;
        }

        .hero-section p {
            font-size: 1rem;
        }

        .grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<div class="hero-section">
    <div class="container">
        <h1>Welcome, {{ Auth::user()->name }}!</h1>
        <p>You are successfully logged in to your account.</p>
    </div>
</div>

<div class="content-section">
    <div class="container">
        <div class="user-info">
            <h3>Your Account Information</h3>
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Member Since:</strong> {{ Auth::user()->created_at->format('F Y') }}</p>
        </div>

        <div class="grid">
            <div class="card">
                <h2>Dashboard</h2>
                <p>View your dashboard and manage your account settings.</p>
                <a href="{{ route('dashboard') }}" class="btn">Go to Dashboard</a>
            </div>

            <div class="card">
                <h2>Profile</h2>
                <p>Update your profile information and preferences.</p>
                <a href="{{ route('profile') }}" class="btn">View Profile</a>
            </div>

            <div class="card">
                <h2>Settings</h2>
                <p>Configure your account settings and preferences.</p>
                <a href="{{ route('profile') }}" class="btn">Manage Settings</a>
            </div>
        </div>
    </div>
</div>
@endsection

