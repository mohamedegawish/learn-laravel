<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solvesta CRM - Professional Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            /* === PROFESSIONAL COLOR PALETTE === */
            --primary-color: #2563eb;       /* Vibrant Blue */
            --primary-hover: #1d4ed8;       /* Darker Blue */
            --primary-light: #eff6ff;       /* Very Light Blue */

            --secondary-color: #f97316;     /* Accent Orange */
            --secondary-hover: #ea580c;     /* Darker Orange */

            --text-primary: #1f2937;        /* Rich Dark Gray */
            --text-secondary: #6b7280;      /* Medium Gray */
            --text-on-primary: #ffffff;

            --bg-page: #f8faff;             /* Cooler, lighter page background */
            --bg-card: #ffffff;
            
            --border-color: #e5e7eb;

            /* === STATUS COLORS === */
            --success-bg: #ecfdf5;
            --success-text: #059669;
            --success-icon: #10b981;
            --warning-bg: #fffbeb;
            --warning-text: #b45309;
            --warning-icon: #f59e0b;
            --danger-bg: #fef2f2;
            --danger-text: #dc2626;
            --danger-icon: #ef4444;

            /* === Sizing & Spacing === */
            --sidebar-width: 260px;
            --sidebar-collapsed-width: 88px;
            --header-height: 72px;
            --border-radius: 12px; /* Slightly larger radius for a modern look */

            /* === Shadows (Refined) === */
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.07), 0 2px 4px -2px rgb(0 0 0 / 0.07);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            
            --transition-speed: 0.2s;
            --transition-ease: ease-in-out;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background-color: var(--bg-page);
            color: var(--text-primary);
            display: flex;
            min-height: 100vh;
            transition: padding-left var(--transition-speed) var(--transition-ease);
        }
        
        body.sidebar-collapsed { padding-left: var(--sidebar-collapsed-width); }
        @media (min-width: 769px) { body { padding-left: var(--sidebar-width); } }
        
        h1, h2, h3, h4, h5, h6 { margin-top: 0; font-weight: 700; }
        a { color: var(--primary-color); text-decoration: none; }

        .page-container {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        
        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--bg-card);
            border-right: 1px solid var(--border-color);
            position: fixed;
            top: 0; left: 0; height: 100vh;
            display: flex; flex-direction: column;
            padding: 1.5rem;
            transition: width var(--transition-speed) var(--transition-ease);
            z-index: 1000;
        }
        
        body.sidebar-collapsed .sidebar { width: var(--sidebar-collapsed-width); padding: 1.5rem 1rem; }
        .sidebar-header { display: flex; align-items: center; margin-bottom: 2.5rem; height: 40px; }
        .logo-icon { font-size: 2rem; color: var(--primary-color); }
        .logo { font-size: 1.6rem; font-weight: 800; color: var(--text-primary); margin-left: 0.75rem; opacity: 1; transition: opacity 0.1s ease; white-space: nowrap; }
        body.sidebar-collapsed .logo { opacity: 0; width: 0; pointer-events: none; }
        .sidebar-nav { flex-grow: 1; list-style: none; padding: 0; margin: 0; }
        .sidebar-nav li a {
            display: flex; align-items: center; padding: 0.8rem 1rem; color: var(--text-secondary);
            font-weight: 500; border-radius: var(--border-radius); margin-bottom: 0.5rem;
            transition: all var(--transition-speed) var(--transition-ease); white-space: nowrap;
            overflow: hidden; border-left: 4px solid transparent;
        }
        .sidebar-nav li a:hover { background-color: var(--primary-light); color: var(--primary-hover); }
        .sidebar-nav li a.active {
            background-color: var(--primary-light); color: var(--primary-color);
            font-weight: 600; border-left: 4px solid var(--primary-color);
        }
        .sidebar-nav li a i {
            font-size: 1.25rem; width: 28px; text-align: center; margin-right: 1.25rem;
            flex-shrink: 0; transition: margin-right var(--transition-speed) var(--transition-ease);
        }
        body.sidebar-collapsed .sidebar-nav li a span { opacity: 0; width: 0; }
        body.sidebar-collapsed .sidebar-nav li a { justify-content: center; padding: 0.8rem; }
        body.sidebar-collapsed .sidebar-nav li a i { margin-right: 0; }
        body.sidebar-collapsed .sidebar-nav li a.active { background-color: var(--primary-color); color: var(--text-on-primary); }

        /* Header */
        header.main-header {
            height: var(--header-height); background-color: var(--bg-card);
            box-shadow: 0 1px 3px rgba(0,0,0,0.02), 0 2px 8px rgba(0,0,0,0.04);
            display: flex; justify-content: space-between; align-items: center;
            padding: 0 2.5rem; flex-shrink: 0; z-index: 500;
        }
        .header-left { display: flex; align-items: center; }
        .header-right { display: flex; align-items: center; gap: 1rem; }
        .sidebar-toggle {
            background: none; border: none; font-size: 1.5rem; cursor: pointer;
            color: var(--text-secondary); padding: 0.5rem; border-radius: 50%;
            transition: all var(--transition-speed) var(--transition-ease);
        }
        .sidebar-toggle:hover { background-color: var(--bg-page); color: var(--text-primary); }
        .header-search { position: relative; margin-left: 1.5rem; }
        .header-search input {
            background-color: var(--bg-page); border: 1px solid var(--border-color);
            border-radius: var(--border-radius); padding: 0.65rem 1rem 0.65rem 2.75rem;
            width: 320px; font-size: 0.95rem;
            transition: all var(--transition-speed) var(--transition-ease);
        }
        .header-search input:focus {
            outline: none; border-color: var(--primary-color);
            box-shadow: 0 0 0 3px var(--primary-light);
        }
        .header-search i {
            position: absolute; left: 1rem; top: 50%;
            transform: translateY(-50%); color: var(--text-secondary);
        }
        
        .header-action-btn {
            position: relative; background: transparent; border: 1px solid var(--border-color);
            color: var(--text-secondary); font-size: 1.1rem; cursor: pointer;
            width: 44px; height: 44px; border-radius: 50%; display: flex;
            align-items: center; justify-content: center;
            transition: all var(--transition-speed) var(--transition-ease);
        }
        .header-action-btn:hover { background-color: var(--primary-light); border-color: var(--primary-color); color: var(--primary-color); }
        .notification-badge {
            position: absolute; top: 8px; right: 8px; width: 9px; height: 9px;
            background-color: var(--danger-text); border-radius: 50%;
            border: 2px solid var(--bg-card);
        }

        /* === THIS IS THE FIX === */
        .notification-wrapper {
            position: relative; /* Make this a positioning context for the dropdown */
        }

        .user-profile-dropdown { position: relative; cursor: pointer; }
        .user-profile-pic {
            width: 44px; height: 44px; border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem; color: var(--text-on-primary); font-weight: 600;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .dropdown-panel {
            position: absolute; top: calc(100% + 12px); right: 0;
            background-color: var(--bg-card); border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg); min-width: 240px; list-style: none;
            padding: 0; margin: 0; opacity: 0; visibility: hidden;
            transform: translateY(-10px);
            transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s ease;
            z-index: 1000; border: 1px solid var(--border-color);
        }
        .dropdown-panel.show { opacity: 1; visibility: visible; transform: translateY(0); }
        
        .profile-menu { padding: 0.5rem; }
        .profile-menu li a {
            display: flex; align-items: center; padding: 0.75rem 1rem;
            color: var(--text-primary); border-radius: 8px; font-weight: 500;
        }
        .profile-menu li a:hover { background-color: var(--bg-page); }
        .profile-menu li a i { margin-right: 0.75rem; color: var(--text-secondary); width: 20px; }
        
        .notification-panel { min-width: 360px; }
        .notification-header { padding: 1rem 1.25rem; border-bottom: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center; }
        .notification-header h4 { margin: 0; font-size: 1.1rem; }
        .notification-list { max-height: 350px; overflow-y: auto; padding: 0.5rem; }
        .notification-item { display: flex; gap: 1rem; padding: 0.8rem 1rem; border-radius: 8px; cursor: pointer; }
        .notification-item:hover { background-color: var(--bg-page); }
        .notification-item .icon { font-size: 1.2rem; flex-shrink: 0; width: 24px; text-align: center; margin-top: 4px; }
        .notification-item .content p { margin: 0; font-size: 0.9rem; line-height: 1.4; }
        .notification-item .content .time { font-size: 0.8rem; color: var(--text-secondary); margin-top: 0.25rem; }
        .notification-footer { padding: 0.75rem; text-align: center; border-top: 1px solid var(--border-color); font-weight: 500; }

        /* Main Content */
        main.main-content {
            flex-grow: 1;
            padding: 2.5rem;
            overflow-y: auto;
        }
        .page-title h1 { font-size: 2.25rem; font-weight: 800; margin-bottom: 0.25rem; }
        .page-title p { margin: 0; font-size: 1.1rem; color: var(--text-secondary); }

        .stats-grid {
            display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem; margin: 2.5rem 0;
        }
        .stat-card {
            background-color: var(--bg-card);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
            border-bottom: 4px solid;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .stat-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); }
        .stat-card.blue { border-color: var(--primary-color); }
        .stat-card.green { border-color: var(--success-icon); }
        .stat-card.orange { border-color: var(--secondary-color); }
        .stat-card.red { border-color: var(--danger-icon); }

        .stat-card .info h4 { font-size: 1rem; font-weight: 600; color: var(--text-secondary); margin-bottom: 0.75rem; }
        .stat-card .info .value { font-size: 2.5rem; font-weight: 800; color: var(--text-primary); line-height: 1.1; margin-bottom: 0.75rem; }
        .stat-card .stat-change {
            display: inline-flex; align-items: center; gap: 0.25rem;
            font-size: 0.875rem; font-weight: 600; padding: 0.2rem 0.5rem;
            border-radius: 6px;
        }
        .stat-change.positive { color: var(--success-text); background-color: var(--success-bg); }
        .stat-change.negative { color: var(--danger-text); background-color: var(--danger-bg); }
        
        .stat-card .icon-wrapper { position: absolute; top: 1rem; right: 1rem; font-size: 1.75rem; opacity: 0.15; transform: rotate(-15deg); }

        .content-section {
            background-color: var(--bg-card);
            border-radius: var(--border-radius);
            margin-bottom: 2.5rem;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
        }
        .section-header {
            display: flex; justify-content: space-between; align-items: center;
            border-bottom: 1px solid var(--border-color);
            padding: 1.25rem 2rem;
        }
        .section-header h3 { margin: 0; font-size: 1.25rem; }
        
        .btn {
            display: inline-flex; align-items: center; justify-content: center;
            gap: 0.5rem; padding: 0.7rem 1.4rem; border-radius: 8px;
            font-weight: 600; border: 1px solid transparent; cursor: pointer;
            transition: all var(--transition-speed) var(--transition-ease);
        }
        .btn-primary { background-color: var(--primary-color); color: var(--text-on-primary); }
        .btn-primary:hover { background-color: var(--primary-hover); transform: translateY(-2px); box-shadow: 0 4px 10px rgba(37, 99, 235, 0.3); }

        .table-wrapper { overflow-x: auto; }
        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 600px;
        }
        .data-table th, .data-table td { padding: 1rem 2rem; text-align: left; }
        .data-table thead th {
            background-color: var(--bg-page);
            font-size: 0.8rem; font-weight: 600; color: var(--text-secondary);
            text-transform: uppercase; letter-spacing: 0.05em;
            border-top: 1px solid var(--border-color);
            border-bottom: 1px solid var(--border-color);
        }
        .data-table thead th:first-child { border-top-left-radius: var(--border-radius); border-bottom-left-radius: var(--border-radius); }
        .data-table thead th:last-child { border-top-right-radius: var(--border-radius); border-bottom-right-radius: var(--border-radius); }
        .data-table tbody td { border-bottom: 1px solid var(--border-color); }
        .data-table tbody tr:last-child td { border-bottom: none; }
        .data-table tbody tr:hover { background-color: var(--primary-light); }
        
        .client-info { display: flex; align-items: center; gap: 1rem; }
        .client-avatar {
            width: 40px; height: 40px; border-radius: 50%;
            background-color: var(--primary-light); color: var(--primary-color);
            display: flex; align-items: center; justify-content: center;
            font-weight: 600; font-size: 0.9rem;
        }
        
        .status-tag {
            display: inline-flex; align-items: center; gap: 0.5rem;
            padding: 0.25rem 0.75rem; border-radius: 9999px;
            font-size: 0.8rem; font-weight: 600;
        }
        .status-tag i { font-size: 0.7rem; }
        .status-new { background-color: var(--success-bg); color: var(--success-text); }
        .status-contacted { background-color: var(--warning-bg); color: var(--warning-text); }
        .status-unqualified { background-color: var(--danger-bg); color: var(--danger-text); }
        
        /* Footer */
        .main-footer {
            padding: 1.5rem 2.5rem; background-color: transparent;
            color: var(--text-secondary); font-size: 0.875rem;
            display: flex; justify-content: space-between; align-items: center;
            flex-wrap: wrap; gap: 1rem;
        }
        .footer-links a { color: var(--text-secondary); margin-left: 1.5rem; transition: color var(--transition-speed) ease; }
        .footer-links a:hover { color: var(--primary-color); }

        /* Responsive Design */
        @media (max-width: 768px) {
            body { flex-direction: column; padding-left: 0; }
            .sidebar {
                width: 100%; height: auto; flex-direction: row; justify-content: space-around;
                position: fixed; bottom: 0; top: auto; left: 0; padding: 0.5rem;
                border-top: 1px solid var(--border-color); border-right: none;
            }
            .sidebar-header, .sidebar-toggle { display: none; }
            .sidebar-nav { display: flex; flex-wrap: wrap; justify-content: center; width: 100%; }
            .sidebar-nav li { flex: 1; text-align: center; margin-bottom: 0; }
            .sidebar-nav li a { flex-direction: column; justify-content: center; padding: 0.5rem; height: 100%; border-left: none !important; }
            .sidebar-nav li a.active { background: transparent; color: var(--primary-color); }
            .sidebar-nav li a i { margin: 0 0 0.25rem 0; }
            .sidebar-nav li a span { font-size: 0.7rem; opacity: 1; width: auto; }
            body.sidebar-collapsed { padding-left: 0; }
            main.main-content { padding: 1.5rem 1rem 80px 1rem; }
            header.main-header { padding: 0 1rem; }
            .header-search { display: none; }
            .stats-grid { grid-template-columns: 1fr; }
            .page-title h1 { font-size: 1.8rem; }
            .main-footer { justify-content: center; text-align: center; }
        }
    </style>
</head>
<body>

    <aside class="sidebar" id="sidebar">
        <!-- Sidebar content remains the same -->
        <div class="sidebar-header">
            <i class="fa-solid fa-layer-group logo-icon"></i>
            <span class="logo">Solvesta CRM</span>
        </div>
        <x-nav-link href="/" :active="request()->is('/')">Dasboard </x-nav-link>
    </aside>

    <div class="page-container">
        <header class="main-header">
             <!-- Header content remains the same -->
            <div class="header-left">
                <button class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle Sidebar"><i class="fas fa-bars"></i></button>
                
            </div>
            <div class="header-right">
                <div class="notification-wrapper">
                    <button class="header-action-btn" id="notificationBtn" aria-label="View Notifications">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge"></span>
                    </button>
                    <div class="dropdown-panel notification-panel" id="notificationPanel">
                        <div class="notification-header"><h4>Notifications</h4></div>
                        <div class="notification-list">
                            <div class="notification-item">
                                <i class="icon fas fa-user-plus" style="color: var(--success-icon);"></i>
                                <div class="content"><p><b>New lead assigned:</b> Alex Johnson from TechCorp.</p><div class="time">5 minutes ago</div></div>
                            </div>
                             <div class="notification-item">
                                <i class="icon fas fa-tasks" style="color: var(--primary-color);"></i>
                                <div class="content"><p><b>Task due today:</b> Follow up with Jane Doe.</p><div class="time">1 hour ago</div></div>
                            </div>
                             <div class="notification-item">
                                <i class="icon fas fa-file-invoice-dollar" style="color: var(--warning-icon);"></i>
                                <div class="content"><p><b>Invoice #INV-2023-08 paid</b> by Innovate LLC.</p><div class="time">3 hours ago</div></div>
                            </div>
                        </div>
                        <div class="notification-footer"><a href="#">View All Notifications</a></div>
                    </div>
                </div>
                <div class="user-profile-dropdown" id="userProfileDropdown">
                    <div class="user-profile-pic"><span>JD</span></div>
                    <ul class="dropdown-panel profile-menu" id="profileMenu">
                        <li><a href="#"><i class="fas fa-user"></i> Profile</a></li>
                        <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
                        <li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <main class="main-content">
            <div class="page-title">
                <h1>{{ $title }}</h1>
            </div>
            {{ $slot }}

            
        </main>
        
        <footer class="main-footer">
            <div class="footer-copyright">© 2024 Solvesta CRM. All Rights Reserved.</div>
            <div class="footer-links"><a href="#">About</a><a href="#">Support</a><a href="#">Contact</a></div>
        </footer>
    </div>

    <script>
        // JavaScript logic remains the same
        document.addEventListener('DOMContentLoaded', function() {
            const body = document.body;
            const sidebarToggle = document.getElementById('sidebarToggle');
            const userProfileDropdown = document.getElementById('userProfileDropdown');
            const profileMenu = document.getElementById('profileMenu');
            const notificationBtn = document.getElementById('notificationBtn');
            const notificationPanel = document.getElementById('notificationPanel');

            const toggleSidebar = () => {
                const isCollapsed = body.classList.toggle('sidebar-collapsed');
                localStorage.setItem('sidebarCollapsed', isCollapsed);
            };

            if (window.innerWidth > 768 && localStorage.getItem('sidebarCollapsed') === 'true') {
                body.classList.add('sidebar-collapsed');
            }
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', toggleSidebar);
            }

            notificationBtn.addEventListener('click', function(event) {
                event.stopPropagation();
                profileMenu.classList.remove('show');
                notificationPanel.classList.toggle('show');
            });

            userProfileDropdown.addEventListener('click', function(event) {
                event.stopPropagation();
                notificationPanel.classList.remove('show');
                profileMenu.classList.toggle('show');
            });

            document.addEventListener('click', function(event) {
                if (!userProfileDropdown.contains(event.target)) {
                    profileMenu.classList.remove('show');
                }
                if (!notificationBtn.parentElement.contains(event.target)) {
                    notificationPanel.classList.remove('show');
                }
            });

            const handleResize = () => {
                if (window.innerWidth <= 768) {
                    body.classList.remove('sidebar-collapsed');
                } else {
                    if (localStorage.getItem('sidebarCollapsed') === 'true') {
                        body.classList.add('sidebar-collapsed');
                    }
                }
            };
            window.addEventListener('resize', handleResize);
        });
    </script>
</body>
</html>