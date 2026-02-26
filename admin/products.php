<?php
require_once 'auth.php';
require_once '../assets/include/config.php';
$conn = getConn();

$pageTitle    = 'All Products';
$pageSubtitle = 'Manage your product catalog';
$activePage   = 'products';

// Handle delete
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $delId = (int)$_GET['delete'];
    $conn->query("DELETE FROM product_specifications WHERE product_id=$delId");
    $conn->query("DELETE FROM product_features WHERE product_id=$delId");
    $conn->query("DELETE FROM product_applications WHERE product_id=$delId");
    $conn->query("DELETE FROM product_images WHERE product_id=$delId");
    $conn->query("DELETE FROM product_offers WHERE product_id=$delId");
    $conn->query("DELETE FROM products WHERE id=$delId");
    header('Location: products.php?msg=deleted');
    exit;
}

// Handle toggle active
if (isset($_GET['toggle']) && is_numeric($_GET['toggle'])) {
    $tid = (int)$_GET['toggle'];
    $conn->query("UPDATE products SET is_active = IF(is_active=1,0,1) WHERE id=$tid");
    header('Location: products.php?msg=updated');
    exit;
}

// Search/filter
$search = trim($_GET['search'] ?? '');
$cat    = trim($_GET['cat'] ?? '');
$where  = "WHERE 1=1";
$params = [];
if ($search) $where .= " AND (name LIKE '%".mysqli_real_escape_string($conn,$search)."%' OR slug LIKE '%".mysqli_real_escape_string($conn,$search)."%')";
if ($cat)    $where .= " AND category='".mysqli_real_escape_string($conn,$cat)."'";

$products = [];
$res = $conn->query("SELECT * FROM products $where ORDER BY sort_order ASC, id DESC");
while($row = $res->fetch_assoc()) $products[] = $row;

// Categories for filter
$catRes = $conn->query("SELECT DISTINCT category FROM products ORDER BY category");
$categories = [];
while($row = $catRes->fetch_assoc()) $categories[] = $row['category'];

include 'header.php';
?>

<div style="padding:24px;">

<?php if(isset($_GET['msg'])): ?>
<div style="background:<?php echo $_GET['msg']==='deleted'?'#fef2f2':'#f0fdf4'; ?>;border:1.5px solid <?php echo $_GET['msg']==='deleted'?'#fca5a5':'#86efac'; ?>;color:<?php echo $_GET['msg']==='deleted'?'#b71c1c':'#16a34a'; ?>;padding:12px 16px;border-radius:10px;margin-bottom:16px;font-size:13px;font-weight:700;">
    <?php echo $_GET['msg']==='deleted'?'✅ Product deleted successfully!':'✅ Product updated successfully!'; ?>
</div>
<?php endif; ?>

<!-- HEADER ROW -->
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;flex-wrap:wrap;gap:12px;">
    <div style="font-size:13px;color:#64748b;font-weight:600;"><?php echo count($products); ?> products found</div>
    <a href="product_add.php" style="background:#0a2463;color:white;padding:10px 20px;border-radius:10px;font-size:13px;font-weight:700;text-decoration:none;display:flex;align-items:center;gap:6px;">
        <svg style="width:14px;height:14px" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Add New Product
    </a>
</div>

<!-- FILTERS -->
<div style="background:white;border-radius:14px;padding:16px;border:1.5px solid #e2e8f0;margin-bottom:20px;">
    <form method="GET" style="display:flex;gap:12px;flex-wrap:wrap;align-items:flex-end;">
        <div style="flex:1;min-width:200px;">
            <label style="font-size:11px;font-weight:700;color:#64748b;display:block;margin-bottom:6px;">SEARCH</label>
            <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search by name or slug..."
                   style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:13px;font-weight:600;color:#374151;outline:none;">
        </div>
        <div style="min-width:180px;">
            <label style="font-size:11px;font-weight:700;color:#64748b;display:block;margin-bottom:6px;">CATEGORY</label>
            <select name="cat" style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:13px;font-weight:600;color:#374151;outline:none;">
                <option value="">All Categories</option>
                <?php foreach($categories as $c): ?>
                <option value="<?php echo htmlspecialchars($c); ?>" <?php echo $cat===$c?'selected':''; ?>><?php echo htmlspecialchars($c); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" style="background:#0a2463;color:white;padding:9px 20px;border:none;border-radius:8px;font-size:13px;font-weight:700;cursor:pointer;">Filter</button>
        <a href="products.php" style="background:#f1f5f9;color:#374151;padding:9px 16px;border-radius:8px;font-size:13px;font-weight:700;text-decoration:none;">Reset</a>
    </form>
</div>

<!-- PRODUCTS TABLE -->
<div style="background:white;border-radius:16px;border:1.5px solid #e2e8f0;overflow:hidden;">
    <div style="overflow-x:auto;">
        <table style="width:100%;border-collapse:collapse;">
            <thead>
                <tr style="background:#f8fafc;border-bottom:2px solid #e2e8f0;">
                    <th style="padding:12px 16px;text-align:left;font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;">Product</th>
                    <th style="padding:12px 16px;text-align:left;font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;">Category</th>
                    <th style="padding:12px 16px;text-align:left;font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;">Price</th>
                    <th style="padding:12px 16px;text-align:center;font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;">Stock</th>
                    <th style="padding:12px 16px;text-align:center;font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;">Status</th>
                    <th style="padding:12px 16px;text-align:center;font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $p): ?>
                <tr style="border-bottom:1px solid #f1f5f9;transition:background 0.15s;" onmouseover="this.style.background='#f8faff'" onmouseout="this.style.background='white'">
                    <td style="padding:14px 16px;">
                        <div style="display:flex;align-items:center;gap:12px;">
                            <img src="../<?php echo htmlspecialchars(ltrim($p['image'],'./')); ?>" alt="" style="width:48px;height:48px;object-fit:contain;border-radius:8px;border:1.5px solid #e2e8f0;padding:4px;background:#f8fafc;" onerror="this.src='https://via.placeholder.com/48x48?text=IMG'">
                            <div>
                                <div style="font-size:13px;font-weight:700;color:#0a2463;line-height:1.3;"><?php echo htmlspecialchars(substr($p['name'],0,35)).(strlen($p['name'])>35?'...':''); ?></div>
                                <div style="font-size:11px;color:#94a3b8;margin-top:1px;">slug: <?php echo htmlspecialchars($p['slug']); ?></div>
                            </div>
                        </div>
                    </td>
                    <td style="padding:14px 16px;">
                        <span style="font-size:11px;font-weight:700;background:#eff6ff;color:#0a2463;padding:4px 8px;border-radius:6px;"><?php echo htmlspecialchars($p['category']); ?></span>
                    </td>
                    <td style="padding:14px 16px;">
                        <div style="font-size:14px;font-weight:800;color:#b71c1c;">₹<?php echo number_format($p['price_min'],0,'.',','); ?></div>
                        <?php if($p['price_max']>0): ?>
                        <div style="font-size:11px;color:#94a3b8;">- ₹<?php echo number_format($p['price_max'],0,'.',','); ?></div>
                        <?php endif; ?>
                    </td>
                    <td style="padding:14px 16px;text-align:center;">
                        <?php if($p['in_stock']): ?>
                        <span style="font-size:11px;font-weight:700;background:#f0fdf4;color:#16a34a;padding:4px 8px;border-radius:6px;border:1px solid #bbf7d0;">✓ In Stock</span>
                        <?php else: ?>
                        <span style="font-size:11px;font-weight:700;background:#fef2f2;color:#b71c1c;padding:4px 8px;border-radius:6px;border:1px solid #fecaca;">✗ Out</span>
                        <?php endif; ?>
                    </td>
                    <td style="padding:14px 16px;text-align:center;">
                        <a href="products.php?toggle=<?php echo $p['id']; ?>" onclick="return confirm('Toggle active status?')"
                           style="font-size:11px;font-weight:700;padding:4px 8px;border-radius:6px;text-decoration:none;<?php echo $p['is_active']?'background:#f0fdf4;color:#16a34a;border:1px solid #bbf7d0;':'background:#f8fafc;color:#94a3b8;border:1px solid #e2e8f0;'; ?>">
                            <?php echo $p['is_active']?'● Active':'○ Hidden'; ?>
                        </a>
                    </td>
                    <td style="padding:14px 16px;text-align:center;">
                        <div style="display:flex;align-items:center;justify-content:center;gap:6px;">
                            <a href="product_edit.php?id=<?php echo $p['id']; ?>" style="background:#eff6ff;color:#0a2463;padding:6px 12px;border-radius:7px;font-size:11px;font-weight:700;text-decoration:none;">Edit</a>
                            <a href="specifications.php?pid=<?php echo $p['id']; ?>" style="background:#fff7ed;color:#f97316;padding:6px 12px;border-radius:7px;font-size:11px;font-weight:700;text-decoration:none;">Specs</a>
                            <a href="products.php?delete=<?php echo $p['id']; ?>" onclick="return confirm('DELETE this product? This cannot be undone!')"
                               style="background:#fef2f2;color:#b71c1c;padding:6px 12px;border-radius:7px;font-size:11px;font-weight:700;text-decoration:none;">Del</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($products)): ?>
                <tr><td colspan="6" style="padding:48px;text-align:center;color:#94a3b8;font-size:14px;font-weight:600;">No products found. <a href="product_add.php" style="color:#0a2463;font-weight:700;">Add one →</a></td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</div>
<?php include 'footer.php'; ?>
