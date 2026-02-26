<?php
require_once 'auth.php';
require_once '../assets/include/config.php';
$conn = getConn();

$pageTitle = 'Dashboard';
$pageSubtitle = 'Overview of your store';
$activePage = 'dashboard';

// Stats
$totalProducts = $conn->query("SELECT COUNT(*) as c FROM products WHERE is_active=1")->fetch_assoc()['c'];
$totalAll      = $conn->query("SELECT COUNT(*) as c FROM products")->fetch_assoc()['c'];
$totalSpecs    = $conn->query("SELECT COUNT(*) as c FROM product_specifications")->fetch_assoc()['c'];
$totalOffers   = $conn->query("SELECT COUNT(*) as c FROM product_offers")->fetch_assoc()['c'];
$totalImages   = $conn->query("SELECT COUNT(*) as c FROM product_images")->fetch_assoc()['c'];
$totalFeats    = $conn->query("SELECT COUNT(*) as c FROM product_features")->fetch_assoc()['c'];

// Category breakdown
$cats = $conn->query("SELECT category, COUNT(*) as cnt FROM products WHERE is_active=1 GROUP BY category ORDER BY cnt DESC");
$catData = [];
while($row = $cats->fetch_assoc()) $catData[] = $row;

// Recent products
$recent = $conn->query("SELECT id, name, category, price_min, in_stock, created_at FROM products ORDER BY id DESC LIMIT 6");
$recentProducts = [];
while($row = $recent->fetch_assoc()) $recentProducts[] = $row;

include 'header.php';
?>

<div style="padding:24px;">

<!-- STATS GRID -->
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-bottom:24px;">

    <div style="background:white;border-radius:16px;padding:20px;border:1.5px solid #e2e8f0;box-shadow:0 1px 8px rgba(0,0,0,0.04);">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;">
            <div style="width:44px;height:44px;background:#eff6ff;border-radius:12px;display:flex;align-items:center;justify-content:center;">
                <svg style="width:22px;height:22px;color:#0a2463" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
            <span style="font-size:11px;font-weight:700;color:#16a34a;background:#f0fdf4;padding:3px 8px;border-radius:6px;">Active</span>
        </div>
        <div style="font-size:32px;font-weight:900;color:#0a2463;"><?php echo $totalProducts; ?></div>
        <div style="font-size:12px;font-weight:600;color:#64748b;margin-top:2px;">Active Products</div>
    </div>

    <div style="background:white;border-radius:16px;padding:20px;border:1.5px solid #e2e8f0;box-shadow:0 1px 8px rgba(0,0,0,0.04);">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;">
            <div style="width:44px;height:44px;background:#fef2f2;border-radius:12px;display:flex;align-items:center;justify-content:center;">
                <svg style="width:22px;height:22px;color:#b71c1c" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </div>
        </div>
        <div style="font-size:32px;font-weight:900;color:#0a2463;"><?php echo $totalSpecs; ?></div>
        <div style="font-size:12px;font-weight:600;color:#64748b;margin-top:2px;">Specifications</div>
    </div>

    <div style="background:white;border-radius:16px;padding:20px;border:1.5px solid #e2e8f0;box-shadow:0 1px 8px rgba(0,0,0,0.04);">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;">
            <div style="width:44px;height:44px;background:#fff7ed;border-radius:12px;display:flex;align-items:center;justify-content:center;">
                <svg style="width:22px;height:22px;color:#f97316" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
            </div>
        </div>
        <div style="font-size:32px;font-weight:900;color:#0a2463;"><?php echo $totalOffers; ?></div>
        <div style="font-size:12px;font-weight:600;color:#64748b;margin-top:2px;">Offers</div>
    </div>

    <div style="background:white;border-radius:16px;padding:20px;border:1.5px solid #e2e8f0;box-shadow:0 1px 8px rgba(0,0,0,0.04);">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;">
            <div style="width:44px;height:44px;background:#f0fdf4;border-radius:12px;display:flex;align-items:center;justify-content:center;">
                <svg style="width:22px;height:22px;color:#16a34a" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
        </div>
        <div style="font-size:32px;font-weight:900;color:#0a2463;"><?php echo $totalImages; ?></div>
        <div style="font-size:12px;font-weight:600;color:#64748b;margin-top:2px;">Product Images</div>
    </div>

</div>

<!-- QUICK ACTIONS -->
<div style="background:linear-gradient(135deg,#0a2463,#1a3a7a);border-radius:16px;padding:24px;margin-bottom:24px;">
    <h3 style="font-size:15px;font-weight:800;color:white;margin-bottom:16px;">⚡ Quick Actions</h3>
    <div style="display:flex;flex-wrap:wrap;gap:10px;">
        <a href="product_add.php" style="background:rgba(255,255,255,0.15);color:white;padding:10px 20px;border-radius:10px;font-size:13px;font-weight:700;text-decoration:none;display:flex;align-items:center;gap:6px;border:1.5px solid rgba(255,255,255,0.2);">
            <svg style="width:14px;height:14px" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add New Product
        </a>
        <a href="products.php" style="background:rgba(255,255,255,0.15);color:white;padding:10px 20px;border-radius:10px;font-size:13px;font-weight:700;text-decoration:none;display:flex;align-items:center;gap:6px;border:1.5px solid rgba(255,255,255,0.2);">
            <svg style="width:14px;height:14px" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
            Manage Products
        </a>
        <a href="offers.php" style="background:rgba(255,255,255,0.15);color:white;padding:10px 20px;border-radius:10px;font-size:13px;font-weight:700;text-decoration:none;display:flex;align-items:center;gap:6px;border:1.5px solid rgba(255,255,255,0.2);">
            <svg style="width:14px;height:14px" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
            Manage Offers
        </a>
        <a href="images.php" style="background:rgba(255,255,255,0.15);color:white;padding:10px 20px;border-radius:10px;font-size:13px;font-weight:700;text-decoration:none;display:flex;align-items:center;gap:6px;border:1.5px solid rgba(255,255,255,0.2);">
            <svg style="width:14px;height:14px" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            Manage Images
        </a>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:24px;">

<!-- CATEGORY BREAKDOWN -->
<div style="background:white;border-radius:16px;padding:20px;border:1.5px solid #e2e8f0;">
    <h3 style="font-size:14px;font-weight:800;color:#0a2463;margin-bottom:16px;">📦 Products by Category</h3>
    <?php foreach($catData as $cat): ?>
    <div style="margin-bottom:12px;">
        <div style="display:flex;justify-content:space-between;margin-bottom:4px;">
            <span style="font-size:12px;font-weight:600;color:#374151;"><?php echo htmlspecialchars($cat['category']); ?></span>
            <span style="font-size:12px;font-weight:800;color:#0a2463;"><?php echo $cat['cnt']; ?></span>
        </div>
        <div style="background:#f1f5f9;border-radius:4px;height:6px;">
            <div style="background:#0a2463;border-radius:4px;height:6px;width:<?php echo ($totalProducts>0?round($cat['cnt']/$totalProducts*100):0); ?>%"></div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- RECENT PRODUCTS -->
<div style="background:white;border-radius:16px;padding:20px;border:1.5px solid #e2e8f0;">
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;">
        <h3 style="font-size:14px;font-weight:800;color:#0a2463;">🆕 Recent Products</h3>
        <a href="products.php" style="font-size:11px;font-weight:700;color:#0a2463;text-decoration:none;">View All →</a>
    </div>
    <?php foreach($recentProducts as $rp): ?>
    <div style="display:flex;align-items:center;justify-content:space-between;padding:8px 0;border-bottom:1px solid #f1f5f9;">
        <div>
            <div style="font-size:12px;font-weight:700;color:#1e293b;"><?php echo htmlspecialchars(substr($rp['name'],0,30)).(strlen($rp['name'])>30?'...':''); ?></div>
            <div style="font-size:11px;color:#94a3b8;"><?php echo htmlspecialchars($rp['category']); ?></div>
        </div>
        <div style="text-align:right;">
            <div style="font-size:12px;font-weight:800;color:#b71c1c;">₹<?php echo number_format($rp['price_min'],0,'.',','); ?></div>
            <span style="font-size:10px;font-weight:700;padding:2px 6px;border-radius:4px;<?php echo $rp['in_stock']?'background:#f0fdf4;color:#16a34a;':'background:#fef2f2;color:#b71c1c;'; ?>">
                <?php echo $rp['in_stock']?'In Stock':'Out'; ?>
            </span>
        </div>
    </div>
    <?php endforeach; ?>
</div>

</div>

</div>

<?php include 'footer.php'; ?>
