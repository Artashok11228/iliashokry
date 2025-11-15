@extends('layouts.app')

@section('title', 'Profile')

@push('styles')
<style>
    .profile-header {
        background-color: #000000;
        color: #ffffff;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .profile-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .profile-header p {
        color: #cccccc;
        font-size: 1.1rem;
    }

    .profile-content {
        padding: 2rem;
    }

    .profile-card {
        background-color: #ffffff;
        border: 2px solid #000000;
        border-radius: 8px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .profile-card h2 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #000000;
        margin-bottom: 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #000000;
    }

    .profile-info {
        display: grid;
        gap: 1.5rem;
    }

    .info-item {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .info-label {
        font-weight: 600;
        color: #000000;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-value {
        color: #666666;
        font-size: 1.1rem;
        padding: 0.75rem;
        background-color: #f5f5f5;
        border: 1px solid #e0e0e0;
        border-radius: 4px;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background-color: #000000;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        font-weight: 700;
        margin: 0 auto 1.5rem;
        border: 4px solid #000000;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        flex-wrap: wrap;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .btn-primary {
        background-color: #000000;
        color: #ffffff;
    }

    .btn-primary:hover {
        background-color: #333333;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .btn-secondary {
        background-color: #ffffff;
        color: #000000;
        border: 2px solid #000000;
    }

    .btn-secondary:hover {
        background-color: #f5f5f5;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .stat-item {
        text-align: center;
        padding: 1rem;
        background-color: #f5f5f5;
        border: 1px solid #e0e0e0;
        border-radius: 4px;
    }

    .stat-item h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #000000;
        margin-bottom: 0.25rem;
    }

    .stat-item p {
        color: #666666;
        font-size: 0.9rem;
    }

    @media (max-width: 768px) {
        .profile-header h1 {
            font-size: 2rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            text-align: center;
        }
    }
</style>
@endpush

@section('content')
<div class="profile-header">
    <div class="container">
        <h1>Profile</h1>
        <p>View and manage your profile information</p>
    </div>
</div>

<div class="profile-content">
    <div class="container">
        <div class="profile-card">
            <div class="profile-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <h2 style="text-align: center;">{{ Auth::user()->name }}</h2>
            
            <div class="profile-info">
                <div class="info-item">
                    <span class="info-label">Full Name</span>
                    <div class="info-value">{{ Auth::user()->name }}</div>
                </div>

                <div class="info-item">
                    <span class="info-label">Email Address</span>
                    <div class="info-value">{{ Auth::user()->email }}</div>
                </div>

                <div class="info-item">
                    <span class="info-label">User ID</span>
                    <div class="info-value">#{{ Auth::user()->id }}</div>
                </div>

                <div class="info-item">
                    <span class="info-label">Member Since</span>
                    <div class="info-value">{{ Auth::user()->created_at->format('F d, Y') }}</div>
                </div>

                <div class="info-item">
                    <span class="info-label">Account Age</span>
                    <div class="info-value">{{ Auth::user()->created_at->diffForHumans() }}</div>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-item">
                    <h3>{{ Auth::user()->id }}</h3>
                    <p>User ID</p>
                </div>
                <div class="stat-item">
                    <h3>Active</h3>
                    <p>Status</p>
                </div>
                <div class="stat-item">
                    <h3>{{ Auth::user()->created_at->format('Y') }}</h3>
                    <p>Joined</p>
                </div>
            </div>

            <div class="action-buttons">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
                <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
                <form action="{{ route('logout') }}" method="POST" style="display: contents;">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Logout</button>
                </form>
            </div>
        </div>

        <div class="profile-card">
            <h2>Account Settings</h2>
            <p style="color: #666666; margin-bottom: 1rem;">Manage your account settings and preferences.</p>
            <p style="color: #999999; font-style: italic;">Account settings feature coming soon. You can update your profile information through the admin panel.</p>
        </div>
    </div>
</div>
@endsection

