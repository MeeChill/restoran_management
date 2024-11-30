@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <div class="dashboard-header">
        <h1><i class="fas fa-tachometer-alt"></i> Dashboard Overview</h1>
        <p class="text-muted">Welcome back, {{ Auth::user()->username }}!</p>
    </div>

    <div class="row">
        <!-- Menu Card -->
        <div class="col-md-4">
            <div class="dashboard-card menu-card">
                <div class="card-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <div class="card-info">
                    <h3>Total Menu</h3>
                    <div class="stat-value">{{ $menus->count() }}</div>
                    <div class="stat-label">Active Items</div>
                </div>
                <a href="{{ route('menus.index') }}" class="card-action">
                    View Details <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Category Card -->
        <div class="col-md-4">
            <div class="dashboard-card category-card">
                <div class="card-icon">
                    <i class="fas fa-list"></i>
                </div>
                <div class="card-info">
                    <h3>Categories</h3>
                    <div class="stat-value">{{ $categories->count() }}</div>
                    <div class="stat-label">Active Categories</div>
                </div>
                <a href="{{ route('categories.index') }}" class="card-action">
                    View Details <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="col-md-4">
            <div class="dashboard-card order-card">
                <div class="card-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="card-info">
                    <h3>Total Orders</h3>
                    <div class="stat-value">{{ $orders->count() }}</div>
                    <div class="stat-label">Active Orders</div>
                </div>
                <a href="{{ route('orders.index') }}" class="card-action">
                    View Details <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="recent-activity mt-4">
        <h2 class="section-title"><i class="fas fa-clock"></i> Recent Activity</h2>
        <div class="row">
            <!-- Recent Orders -->
            <div class="col-md-6">
                <div class="activity-card">
                    <h3>Latest Orders</h3>
                    <div class="activity-list">
                        @forelse($orders->take(5) as $order)
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-receipt"></i>
                            </div>
                            <div class="activity-details">
                                <span class="activity-title">Order #{{ $order->id }}</span>
                                <span class="activity-time">{{ $order->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="activity-status">
                                @switch($order->status)
                                    @case('pending')
                                        <span class="badge badge-warning">Pending</span>
                                        @break
                                    @case('completed')
                                        <span class="badge badge-success">Completed</span>
                                        @break
                                    @case('cancelled')
                                        <span class="badge badge-danger">Cancelled</span>
                                        @break
                                    @default
                                        <span class="badge badge-secondary">{{ $order->status }}</span>
                                @endswitch
                            </div>
                        </div>
                        @empty
                        <div class="no-activity">
                            <i class="fas fa-inbox"></i>
                            <p>No recent orders</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Popular Items -->
            <div class="col-md-6">
                <div class="activity-card">
                    <h3>Popular Items</h3>
                    <div class="activity-list">
                        @forelse($menus->take(5) as $menu)
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="activity-details">
                                <span class="activity-title">{{ $menu->name }}</span>
                                <span class="activity-price">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="activity-category">
                                <span class="badge badge-info">{{ $menu->category->name ?? 'Uncategorized' }}</span>
                            </div>
                        </div>
                        @empty
                        <div class="no-activity">
                            <i class="fas fa-utensils"></i>
                            <p>No menu items available</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.dashboard-container {
    padding: 20px;
    background-color: #f8f9fa;
}

.dashboard-header {
    margin-bottom: 30px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.dashboard-header h1 {
    font-size: 24px;
    color: #333;
    margin: 0;
}

.dashboard-header h1 i {
    margin-right: 10px;
    color: #007bff;
}

.dashboard-card {
    background: white;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.dashboard-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.card-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
}

.card-icon i {
    font-size: 24px;
    color: white;
}

.menu-card .card-icon {
    background: linear-gradient(45deg, #4CAF50, #81C784);
}

.category-card .card-icon {
    background: linear-gradient(45deg, #2196F3, #64B5F6);
}

.order-card .card-icon {
    background: linear-gradient(45deg, #F44336, #E57373);
}

.card-info h3 {
    font-size: 18px;
    color: #333;
    margin-bottom: 10px;
}

.stat-value {
    font-size: 32px;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
}

.stat-label {
    color: #666;
    font-size: 14px;
}

.card-action {
    display: block;
    margin-top: 15px;
    color: #007bff;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
}

.card-action:hover {
    color: #0056b3;
    text-decoration: none;
}

.card-action i {
    margin-left: 5px;
    transition: all 0.3s ease;
}

.card-action:hover i {
    transform: translateX(5px);
}

.section-title {
    font-size: 20px;
    color: #333;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #eee;
}

.section-title i {
    margin-right: 10px;
    color: #007bff;
}

.activity-card {
    background: white;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.activity-card h3 {
    font-size: 18px;
    color: #333;
    margin-bottom: 20px;
}

.activity-list {
    max-height: 400px;
    overflow-y: auto;
}

.activity-item {
    display: flex;
    align-items: center;
    padding: 15px;
    border-bottom: 1px solid #eee;
    transition: all 0.3s ease;
}

.activity-item:hover {
    background-color: #f8f9fa;
}

.activity-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
}

.activity-icon i {
    font-size: 16px;
    color: #007bff;
}

.activity-details {
    flex-grow: 1;
}

.activity-title {
    display: block;
    font-weight: 500;
    color: #333;
}

.activity-time, .activity-price {
    display: block;
    font-size: 12px;
    color: #666;
}

.activity-status, .activity-category {
    margin-left: 15px;
}

.badge {
    padding: 5px 10px;
    border-radius: 15px;
    font-weight: 500;
}

.no-activity {
    text-align: center;
    padding: 40px 20px;
    color: #666;
}

.no-activity i {
    font-size: 48px;
    color: #ddd;
    margin-bottom: 10px;
}

/* Custom Scrollbar */
.activity-list::-webkit-scrollbar {
    width: 6px;
}

.activity-list::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

.activity-list::-webkit-scrollbar-thumb {
    background: #ccc;
    border-radius: 3px;
}

.activity-list::-webkit-scrollbar-thumb:hover {
    background: #999;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .dashboard-container {
        padding: 10px;
    }

    .stat-value {
        font-size: 24px;
    }

    .activity-item {
        flex-direction: column;
        text-align: center;
    }

    .activity-icon {
        margin-right: 0;
        margin-bottom: 10px;
    }

    .activity-status, .activity-category {
        margin-left: 0;
        margin-top: 10px;
    }
}
</style>

<script>
// Animasi untuk nilai statistik
document.addEventListener('DOMContentLoaded', function() {
    const statValues = document.querySelectorAll('.stat-value');

    statValues.forEach(value => {
        const finalValue = parseInt(value.innerText);
        let currentValue = 0;
        const duration = 1000; // 1 detik
        const increment = finalValue / (duration / 16); // 60fps

        function updateValue() {
            if (currentValue < finalValue) {
                currentValue = Math.min(currentValue + increment, finalValue);
                value.innerText = Math.round(currentValue);
                requestAnimationFrame(updateValue);
            }
        }

        updateValue();
    });

    // Tambahkan class untuk animasi fade in
    const cards = document.querySelectorAll('.dashboard-card');
    cards.forEach((card, index) => {
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
});
</script>
@endsection
