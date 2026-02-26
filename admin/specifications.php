<?php
require_once 'auth.php';
require_once '../assets/include/config.php';
$conn = getConn();

$pageTitle    = 'Specifications';
$pageSubtitle = 'Manage product specifications';
$activePage   = 'specifications';

// If pid given, redirect to edit page specs tab
if (isset($_GET['pid']) && is_numeric($_GET['pid'])) {
    header('Location: product_edit.php?id='.(int)$_GET['pid'].'&tab=specs');
    exit;
}

// List all products with spec count
$products = [];
$res = $conn->query("SELECT p.id, p.name, p.category, p.image, COUNT(ps.id) as spec_count FROM products p LEFT JOIN product_specifications ps ON p.id=ps.product_id WHERE p.is_active=1 GROUP BY p.id ORDER BY p.sort_order");
while($row = $res->fetch_assoc()) $products[] = $row;

include 'header.php';
?>
<div style="padding:24px;">
<div style="background:white;border-radius:16px;border:1.5px solid #e2e8f0;overflow:hidden;">
    <div style="background:#f8fafc;padding:16px 20px;border-bottom:2px solid #e2e8f0;display:flex;align-items:center;justify-content:space-between;">
        <h3 style="font-size:14px;font-weight:800;color:#0a2463;">📐 Product Specifications</h3>
        <span style="font-size:12px;color:#64748b;">Click "Manage" to add/edit specs for a product</span>
    </div>
    <table style="width:100%;border-collapse:collapse;">
        <thead><tr style="background:#f8fafc;border-bottom:1.5px solid #e2e8f0;">
            <th style="padding:12px 16px;text-align:left;font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;">Product</th>
            <th style="padding:12px 16px;text-align:left;font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;">Category</th>
            <th style="padding:12px 16px;text-align:center;font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;">Specs Count</th>
            <th style="padding:12px 16px;text-align:center;font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;">Action</th>
        </tr></thead>
        <tbody>
        <?php foreach($products as $p): ?>
        <tr style="border-bottom:1px solid #f1f5f9;" onmouseover="this.style.background='#f8faff'" onmouseout="this.style.background='white'">
            <td style="padding:12px 16px;">
                <div style="display:flex;align-items:center;gap:10px;">
                    <img src="../<?php echo htmlspecialchars(ltrim($p['image'],'./')); ?>" style="width:40px;height:40px;object-fit:contain;border-radius:6px;border:1px solid #e2e8f0;padding:3px;" onerror="this.style.display='none'">
                    <span style="font-size:13px;font-weight:700;color:#0a2463;"><?php echo htmlspecialchars($p['name']); ?></span>
                </div>
            </td>
            <td style="padding:12px 16px;"><span style="font-size:11px;background:#eff6ff;color:#0a2463;padding:3px 8px;border-radius:6px;font-weight:700;"><?php echo htmlspecialchars($p['category']); ?></span></td>
            <td style="padding:12px 16px;text-align:center;">
                <span style="font-size:14px;font-weight:800;color:<?php echo $p['spec_count']>0?'#16a34a':'#b71c1c'; ?>;"><?php echo $p['spec_count']; ?></span>
            </td>
            <td style="padding:12px 16px;text-align:center;">
                <a href="product_edit.php?id=<?php echo $p['id']; ?>&tab=specs" style="background:#0a2463;color:white;padding:6px 14px;border-radius:7px;font-size:11px;font-weight:700;text-decoration:none;">Manage Specs →</a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
<?php include 'footer.php'; ?>
