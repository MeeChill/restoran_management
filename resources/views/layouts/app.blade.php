    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Restoran Management</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .main-container {
                display: flex;
                min-height: 100vh;
            }

            /* Header Styles */
            .header {
                position: fixed;
                top: 0;
                right: 0;
                left: 0;
                background-color: #ffffff;
                padding: 15px 30px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: 1px solid #dee2e6;
                z-index: 3;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
            }

            .logo h1 {
                font-size: 24px;
                font-weight: bold;
                margin: 0;
                color: #333;
            }

            .username {
                font-size: 16px;
                color: #666;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .username i {
                font-size: 20px;
                color: #007bff;
            }

            /* Sidebar Styles */
            .sidebar {
                position: fixed;
                top: 65px; /* Start below header */
                left: 0;
                width: 250px;
                background-color: #ffffff;
                height: calc(100vh - 65px);
                border-right: 1px solid #dee2e6;
                z-index: 2;
                transition: width 0.3s ease;
                box-shadow: 2px 0 4px rgba(0, 0, 0, 0.05);
            }

            .sidebar.collapsed {
                width: 70px;
            }

            .sidebar a {
                padding: 15px 25px;
                display: flex;
                align-items: center;
                color: #333;
                text-decoration: none;
                border-left: 3px solid transparent;
                transition: all 0.3s ease;
            }

            .sidebar a:hover {
                background-color: #f8f9fa;
                padding-left: 28px;
                color: #007bff;
            }

            .sidebar.collapsed a {
                padding: 15px;
                justify-content: center;
            }

            .sidebar.collapsed a:hover {
                padding-left: 15px;
            }

            .sidebar a i {
                margin-right: 10px;
                font-size: 18px;
            }

            .sidebar.collapsed a i {
                margin-right: 0;
            }

            .sidebar.collapsed .nav-text {
                display: none;
            }

            /* Toggle Button Styles */
            #sidebarToggle {
                position: fixed;
                top: 90px; /* Adjust for header */
                left: 235px;
                width: 30px;
                height: 30px;
                background-color: #ffffff;
                border: 2px solid #dee2e6;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                z-index: 4;
                transition: all 0.3s ease;
            }

            #sidebarToggle.collapsed {
                left: 55px;
            }

            #sidebarToggle i {
                transition: transform 0.3s ease;
            }

            /* Content Styles */
            .content {
                margin-top: 65px; /* Offset for header */
                margin-left: 250px; /* Offset for sidebar */
                padding: 20px;
                background-color: #f8f9fa;
                flex-grow: 1;
                transition: margin-left 0.3s ease;
                min-height: calc(100vh - 65px);
            }

            .content.collapsed {
                margin-left: 70px;
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .sidebar {
                    width: 70px;
                    transform: translateX(-70px);
                }

                .sidebar.mobile-active {
                    transform: translateX(0);
                    width: 250px;
                }

                .content {
                    margin-left: 0;
                }

                .content.mobile-active {
                    margin-left: 250px;
                }

                #sidebarToggle {
                    left: 20px;
                    top: 75px;
                }

                #sidebarToggle.mobile-active {
                    left: 235px;
                }
            }
        </style>
    </head>
    <body>
        <div class="main-container">
            <div class="header">
                <div class="logo">
                    <h1>Restoran Management</h1>
                </div>

                <!-- Check if we are on the login or register page -->
                @if(Request::routeIs('login') || Request::routeIs('register'))
                    <div class="auth-links">
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary">Register</a>
                    </div>
                @else
                    <div class="username">
                        <i class="fas fa-user-circle"></i>
                        <span>{{ Auth::user()->username }}</span>
                    </div>
                @endif
            </div>

            @if(!Request::routeIs('login') && !Request::routeIs('register'))
            <button id="sidebarToggle">
                <i class="fas fa-chevron-left"></i>
            </button>

            <div class="sidebar">
                <a href="{{ route('dashboard') }}" class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <a href="{{ route('categories.index') }}" class="{{ Request::routeIs('categories.*') ? 'active' : '' }}">
                    <i class="fas fa-list"></i>
                    <span class="nav-text">Categories</span>
                </a>
                <a href="{{ route('menus.index') }}" class="{{ Request::routeIs('menus.*') ? 'active' : '' }}">
                    <i class="fas fa-utensils"></i>
                    <span class="nav-text">Menus</span>
                </a>
                <a href="{{ route('orders.index') }}" class="{{ Request::routeIs('orders.*') ? 'active' : '' }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="nav-text">Orders</span>
                </a>
                <a href="{{ url('/logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-text">Logout</span>
                </a>
            </div>
            @endif

            <div class="content">
                @yield('content')
            </div>
        </div>

        <script>
            document.getElementById('sidebarToggle').addEventListener('click', function() {
                const sidebar = document.querySelector('.sidebar');
                const content = document.querySelector('.content');
                const toggle = document.getElementById('sidebarToggle');
                const toggleIcon = toggle.querySelector('i');

                // For desktop
                sidebar.classList.toggle('collapsed');
                content.classList.toggle('collapsed');
                toggle.classList.toggle('collapsed');

                // For mobile
                sidebar.classList.toggle('mobile-active');
                content.classList.toggle('mobile-active');
                toggle.classList.toggle('mobile-active');

                // Animate icon rotation
                toggleIcon.style.transform = 'rotate(180deg)';

                setTimeout(() => {
                    if (toggleIcon.classList.contains('fa-chevron-left')) {
                        toggleIcon.classList.replace('fa-chevron-left', 'fa-chevron-right');
                    } else {
                        toggleIcon.classList.replace('fa-chevron-right', 'fa-chevron-left');
                    }
                    toggleIcon.style.transform = 'rotate(0)';
                }, 150);
            });

            const sidebarState = localStorage.getItem('sidebarState');
            if (sidebarState === 'collapsed') {
                document.querySelector('.sidebar').classList.add('collapsed');
                document.querySelector('.content').classList.add('collapsed');
                document.getElementById('sidebarToggle').classList.add('collapsed');
                document.querySelector('#sidebarToggle i').classList.replace('fa-chevron-left', 'fa-chevron-right');
            }

            document.getElementById('sidebarToggle').addEventListener('click', function() {
                const sidebar = document.querySelector('.sidebar');
                localStorage.setItem('sidebarState', sidebar.classList.contains('collapsed') ? 'collapsed' : 'expanded');
            });
        </script>
    </body>
    </html>
