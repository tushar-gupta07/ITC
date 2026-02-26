<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Admin Panel'; ?> - ITC Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { colors: { primary: '#b71c1c', secondary: '#0a2463' } } }
        }
    </script>
    <style>
        .sidebar { width: 260px; min-height: 100vh; background: linear-gradient(180deg, #0a2463 0%, #0d2d7a 100%); }
        .sidebar-link { display:flex; align-items:center; gap:10px; padding:10px 16px; border-radius:10px; color:rgba(255,255,255,0.7); font-weight:600; font-size:13px; transition:all 0.2s; text-decoration:none; margin-bottom:2px; }
        .sidebar-link:hover, .sidebar-link.active { background:rgba(255,255,255,0.12); color:white; }
        .sidebar-link.active { background:rgba(255,255,255,0.15); border-left:3px solid #f59e0b; padding-left:13px; color:white; }
        .badge { background:#b71c1c; color:white; font-size:10px; font-weight:800; padding:1px 6px; border-radius:10px; margin-left:auto; }
        .main-content { flex:1; background:#f1f5f9; min-height:100vh; overflow-x:hidden; }
        .topbar { background:white; border-bottom:2px solid #e2e8f0; padding:0 24px; height:64px; display:flex; align-items:center; justify-content:space-between; position:sticky; top:0; z-index:30; box-shadow:0 1px 8px rgba(0,0,0,0.06); }
        .sidebar-section { font-size:10px; font-weight:800; color:rgba(255,255,255,0.3); letter-spacing:0.1em; text-transform:uppercase; padding:16px 16px 6px; }
        @media(max-width:768px) { .sidebar { display:none; } .sidebar.open { display:flex; flex-direction:column; position:fixed; z-index:50; } }
    </style>
</head>
<body class="bg-gray-100">
<div style="display:flex;">

<!-- SIDEBAR -->
<div class="sidebar flex flex-col" id="sidebar">
    <!-- Logo -->
    <div style="padding:20px 16px; border-bottom:1px solid rgba(255,255,255,0.1);">
        <div style="display:flex; align-items:center; gap:10px;">
            <div style="width:40px;height:40px;background:rgba(255,255,255,0.15);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <svg style="width:22px;height:22px;color:white;" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div>
                <div style="font-weight:800;color:white;font-size:14px;line-height:1.2;">Indian Traders</div>
                <div style="font-size:10px;color:rgba(255,255,255,0.5);font-weight:600;">Admin Panel</div>
            </div>
        </div>
    </div>

    <!-- Nav Links -->
    <nav style="flex:1;padding:12px 10px;overflow-y:auto;">
        <div class="sidebar-section">Main</div>
        <a href="index.php" class="sidebar-link <?php echo ($activePage??'')==='dashboard'?'active':''; ?>">
            <svg style="width:16px;height:16px;flex-shrink:0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
            Dashboard
        </a>

        <div class="sidebar-section">Products</div>
        <a href="products.php" class="sidebar-link <?php echo ($activePage??'')==='products'?'active':''; ?>">
            <svg style="width:16px;height:16px;flex-shrink:0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            All Products
        </a>
        <a href="product_add.php" class="sidebar-link <?php echo ($activePage??'')==='product_add'?'active':''; ?>">
            <svg style="width:16px;height:16px;flex-shrink:0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add Product
        </a>

        <div class="sidebar-section">Details</div>
        <a href="specifications.php" class="sidebar-link <?php echo ($activePage??'')==='specifications'?'active':''; ?>">
            <svg style="width:16px;height:16px;flex-shrink:0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            Specifications
        </a>
        <a href="features.php" class="sidebar-link <?php echo ($activePage??'')==='features'?'active':''; ?>">
            <svg style="width:16px;height:16px;flex-shrink:0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            Features
        </a>
        <a href="applications.php" class="sidebar-link <?php echo ($activePage??'')==='applications'?'active':''; ?>">
            <svg style="width:16px;height:16px;flex-shrink:0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            Applications
        </a>
        <a href="offers.php" class="sidebar-link <?php echo ($activePage??'')==='offers'?'active':''; ?>">
            <svg style="width:16px;height:16px;flex-shrink:0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
            Offers
        </a>
        <a href="images.php" class="sidebar-link <?php echo ($activePage??'')==='images'?'active':''; ?>">
            <svg style="width:16px;height:16px;flex-shrink:0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            Product Images
        </a>

        <div class="sidebar-section">System</div>
        <a href="../index.php" target="_blank" class="sidebar-link">
            <svg style="width:16px;height:16px;flex-shrink:0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            View Website
        </a>
        <a href="logout.php" class="sidebar-link" style="color:rgba(255,150,150,0.8);">
            <svg style="width:16px;height:16px;flex-shrink:0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
            Logout
        </a>
    </nav>

    <!-- User Info -->
    <div style="padding:12px 16px;border-top:1px solid rgba(255,255,255,0.1);display:flex;align-items:center;gap:10px;">
        <div style="width:32px;height:32px;background:#b71c1c;border-radius:8px;display:flex;align-items:center;justify-content:center;font-weight:800;color:white;font-size:13px;">A</div>
        <div>
            <div style="font-size:12px;font-weight:700;color:white;"><?php echo htmlspecialchars($_SESSION['admin_user'] ?? 'Admin'); ?></div>
            <div style="font-size:10px;color:rgba(255,255,255,0.4);">Administrator</div>
        </div>
    </div>
</div>

<!-- MAIN -->
<div class="main-content">
    <!-- TOPBAR -->
    <div class="topbar">
        <div style="display:flex;align-items:center;gap:12px;">
            <button onclick="document.getElementById('sidebar').classList.toggle('open')" style="display:none;background:none;border:none;cursor:pointer;padding:4px;" id="menuBtn">
                <svg style="width:20px;height:20px;color:#0a2463" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <div>
                <h1 style="font-size:16px;font-weight:800;color:#0a2463;"><?php echo $pageTitle ?? 'Dashboard'; ?></h1>
                <p style="font-size:11px;color:#94a3b8;font-weight:500;"><?php echo $pageSubtitle ?? 'Welcome to Admin Panel'; ?></p>
            </div>
        </div>
        <div style="display:flex;align-items:center;gap:12px;">
            <a href="../product_details.php" target="_blank" style="font-size:12px;font-weight:700;color:#0a2463;border:2px solid #0a2463;padding:6px 14px;border-radius:8px;text-decoration:none;">View Site</a>
            <a href="logout.php" style="font-size:12px;font-weight:700;color:white;background:#b71c1c;padding:6px 14px;border-radius:8px;text-decoration:none;">Logout</a>
        </div>
    </div>
    <!-- PAGE CONTENT STARTS HERE -->
