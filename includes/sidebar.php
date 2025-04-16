<?php
    session_start();
    if($_SESSION['user_name'] == null) {
        header("Location: ../public/index.php");
        exit;
    }

    $current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- Minimalist Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="logo">
        <img src="../assets/images/logo1.svg" alt="DataSync" class="logo-icon">
        <span class="logo-text">DataSync</span>
    </div>
    
    <nav class="nav-menu">
        <a href="../admin/dashboard.php" class="nav-link <?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>">
            <i class="bi bi-grid-1x2"></i>
            <span>Dashboard</span>
        </a>
        <a href="../admin/events.php" class="nav-link <?php echo ($current_page == 'events.php') ? 'active' : ''; ?>">
            <i class="bi bi-bar-chart"></i>
            <span>Event Management</span>
        </a>
        <a href="../admin/score.php" class="nav-link <?php echo ($current_page == 'score.php') ? 'active' : ''; ?>">
            <i class="bi bi-graph-up"></i>
            <span>Score</span>
        </a>
        <a href="../admin/reports.php" class="nav-link <?php echo ($current_page == 'reports.php') ? 'active' : ''; ?>">
            <i class="bi bi-file-earmark-spreadsheet"></i>
            <span>Reports</span>
        </a>
        <a href="../admin/users.php" class="nav-link <?php echo ($current_page == 'users.php') ? 'active' : ''; ?>">
            <i class="bi bi-people"></i>
            <span>User Management </span>
        </a>
        <a href="../admin/settings.php" class="nav-link <?php echo ($current_page == 'settings.php') ? 'active' : ''; ?>">
            <i class="bi bi-gear"></i>
            <span>Settings</span>
        </a>
    </nav>
    
    <div class="user-section">
        <span class="username"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
        <a href="../../includes/logout.php" class="logout">
            
            <i class="bi bi-box-arrow-right"></i>
        </a>
    </div>
</div>

<style>

    :root {
        --sidebar-width: 220px;
        --sidebar-collapsed-width: 60px;
        --primary-color: #2d3748;
        --bg-color: #ffffff;
        --accent-color: #4299e1;
        --text-color: #4a5568;
        --border-color: #f7fafc;
    }
    
  
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    .sidebar {
        width: var(--sidebar-width);
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        background-color: var(--bg-color);
        display: flex;
        flex-direction: column;
        transition: width 0.2s ease;
        border-right: 1px solid #f0f0f0;
    }
    
    .sidebar.collapsed {
        width: var(--sidebar-collapsed-width);
    }
    
    /* Logo section */
    .logo {
        padding: 24px 0;
        display: flex;
        justify-content: center;
        align-items: center;
        border-bottom: 1px solid var(--border-color);
    }
    
    .logo-icon {
        width: 28px;
        height: 28px;
    }
    

    .nav-menu {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding: 16px 0;
    }
    
    .nav-link {
        display: flex;
        align-items: center;
        padding: 12px 16px;
        color: var(--text-color);
        text-decoration: none;
        margin: 4px 8px;
        border-radius: 4px;
        transition: all 0.2s ease;
    }
    
    .nav-link i {
        font-size: 16px;
        min-width: 24px;
        display: flex;
        justify-content: center;
    }
    
    .nav-link span {
        margin-left: 12px;
        font-size: 14px;
        font-weight: 500;
    }
    
    .nav-link:hover {
        background-color: #f7fafc;
    }
    
    .nav-link.active {
        color: var(--accent-color);
        background-color: #ebf8ff;
    }
    

    .user-section {
        padding: 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-top: 1px solid var(--border-color);
    }
    
    .username {
        font-size: 13px;
        color: var(--text-color);
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    .logout {
        color: var(--text-color);
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 4px;
        transition: all 0.2s ease;
    }
    
    .logout:hover {
        background-color: #f7fafc;
        color: #e53e3e;
    }
    
    /* Collapsed state styles */
    .sidebar.collapsed .nav-link span,
    .sidebar.collapsed .username {
        display: none;
    }
    
    .sidebar.collapsed .nav-link {
        justify-content: center;
        padding: 12px 0;
    }
    
    .sidebar.collapsed .user-section {
        justify-content: center;
    }
    

    .main-content {
        margin-left: var(--sidebar-width);
        padding: 16px;
        transition: margin-left 0.2s ease;
    }
    
    .main-content.expanded {
        margin-left: var(--sidebar-collapsed-width);
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .sidebar {
            width: var(--sidebar-collapsed-width);
        }
        
        .sidebar .nav-link span,
        .sidebar .username {
            display: none;
        }
        
        .sidebar .nav-link {
            justify-content: center;
            padding: 12px 0;
        }
        
        .sidebar .user-section {
            justify-content: center;
        }
        
        .main-content {
            margin-left: var(--sidebar-collapsed-width);
        }
        
        .sidebar:hover {
            width: var(--sidebar-width);
            z-index: 1000;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        .sidebar:hover .nav-link {
            justify-content: flex-start;
            padding: 12px 16px;
        }
        
        .sidebar:hover .nav-link span,
        .sidebar:hover .username {
            display: block;
        }
        
        .sidebar:hover .user-section {
            justify-content: space-between;
        }
    }
</style>

