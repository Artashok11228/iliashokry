@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
<style>
    .dashboard-header {
        background-color: #000000;
        color: #ffffff;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .dashboard-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .dashboard-header p {
        color: #cccccc;
        font-size: 1.1rem;
    }

    .dashboard-content {
        padding: 2rem;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background-color: #ffffff;
        border: 2px solid #000000;
        border-radius: 8px;
        padding: 1.5rem;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: transform 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-card h3 {
        font-size: 2rem;
        font-weight: 700;
        color: #000000;
        margin-bottom: 0.5rem;
    }

    .stat-card p {
        color: #666666;
        font-size: 0.95rem;
    }

    .dashboard-card {
        background-color: #ffffff;
        border: 2px solid #000000;
        border-radius: 8px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .dashboard-card h2 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #000000;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #000000;
    }

    .dashboard-card p {
        color: #666666;
        line-height: 1.8;
        margin-bottom: 1rem;
    }

    .quick-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .action-btn {
        display: block;
        padding: 1rem;
        background-color: #000000;
        color: #ffffff;
        text-decoration: none;
        border-radius: 4px;
        text-align: center;
        font-weight: 600;
        transition: all 0.3s;
    }

    .action-btn:hover {
        background-color: #333333;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .info-list {
        list-style: none;
        padding: 0;
    }

    .info-list li {
        padding: 0.75rem 0;
        border-bottom: 1px solid #e0e0e0;
        color: #666666;
    }

    .info-list li:last-child {
        border-bottom: none;
    }

    .info-list strong {
        color: #000000;
        margin-right: 0.5rem;
    }

    @media (max-width: 768px) {
        .dashboard-header h1 {
            font-size: 2rem;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .quick-actions {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<div class="dashboard-header">
    <div class="container">
        <h1>Dashboard</h1>
        <p>Welcome back, {{ Auth::user()->name }}! Here's what's happening with your account.</p>
    </div>
</div>

<div class="dashboard-content">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card">
                <h3>{{ Auth::user()->id }}</h3>
                <p>User ID</p>
            </div>
            <div class="stat-card">
                <h3>{{ Auth::user()->created_at->diffForHumans() }}</h3>
                <p>Account Age</p>
            </div>
            <div class="stat-card">
                <h3>Active</h3>
                <p>Account Status</p>
            </div>
        </div>

        <div class="dashboard-card">
            <h2>Account Overview</h2>
            <ul class="info-list">
                <li><strong>Name:</strong> {{ Auth::user()->name }}</li>
                <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
                <li><strong>Registered:</strong> {{ Auth::user()->created_at->format('F d, Y') }}</li>
                <li><strong>Last Login:</strong> {{ now()->format('F d, Y g:i A') }}</li>
            </ul>
        </div>

        <div class="dashboard-card">
            <h2>Quick Actions</h2>
            <p>Manage your account and access important features.</p>
            <div class="quick-actions">
                <a href="{{ route('profile') }}" class="action-btn">View Profile</a>
                <a href="{{ route('home') }}" class="action-btn">Go to Home</a>
                <form action="{{ route('logout') }}" method="POST" style="display: contents;">
                    @csrf
                    <button type="submit" class="action-btn" style="width: 100%; border: none; cursor: pointer;">Logout</button>
                </form>
            </div>
        </div>

        <div class="dashboard-card">
            <h2>Recent Activity</h2>
            <p>Your recent account activity will appear here.</p>
            <p style="color: #999999; font-style: italic;">No recent activity to display.</p>
        </div>
    </div>
</div>
@endsection

