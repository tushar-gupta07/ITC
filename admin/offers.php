<?php
require_once 'auth.php';
require_once '../assets/include/config.php';
$conn = getConn();

$pageTitle    = 'Offers';
$pageSubtitle = 'Manage product offers';
$activePage   = 'offers';

$products = [];
$res = $conn->query("SELECT p.id, p.name, p.category, p.image, COUNT(po.id) as offer_count FROM products p LEFT JOIN product_offers po ON p.id=po.product_id WHERE p.is_active=1 GROUP BY p.id ORDER BY p.sort_order");
while($row = $res->fetch_assoc()) $products[] = $row;

include 'header.php';
?>
<div style="padding:24px;">
<div style="background:white;border-radius:16px;border:1.5px solid #e2e8f0;overflow:hidden;">
    <div style="background:#f8fafc;padding:16px 20px;border-bottom:2px solid #e2e8f0;">
        <h3 style="font-size:14px;font-weight:800;color:#0a2463;">🏷️ Product Offers</h3>
    </div>
    <table style="width:100%;border-collapse:collapse;">
        <thead><tr style="background:#f8fafc;border-bottom:1.5px solid #e2e8f0;">
            <th style="padding:12px 16px;text-align:left;font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;">Product</th>
            <th style="padding:12px 16px;text-align:center;font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;">Offers</th>
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
            <td style="padding:12px 16px;text-align:center;font-size:14px;font-weight:800;color:<?php echo $p['offer_count']>0?'#f97316':'#94a3b8'; ?>;"><?php echo $p['offer_count']; ?></td>
            <td style="padding:12px 16px;text-align:center;">
                <a href="product_edit.php?id=<?php echo $p['id']; ?>&tab=offers" style="background:#f97316;color:white;padding:6px 14px;border-radius:7px;font-size:11px;font-weight:700;text-decoration:none;">Manage →</a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
<?php include 'footer.php'; ?>
