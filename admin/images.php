<?php
require_once 'auth.php';
require_once '../assets/include/config.php';
$conn = getConn();

$pageTitle    = 'Product Images';
$pageSubtitle = 'Manage product image galleries';
$activePage   = 'images';

// ===== IMAGE UPLOAD HANDLE =====
$uploadMsg = '';
$uploadErr = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {

    // --- ADD IMAGE ---
    if ($_POST['action'] === 'add_image') {
        $product_id = (int)$_POST['product_id'];
        $alt_text   = trim($_POST['alt_text'] ?? '');
        $sort_order = (int)($_POST['sort_order'] ?? 0);

        if (!isset($_FILES['image_file']) || $_FILES['image_file']['error'] !== UPLOAD_ERR_OK) {
            $uploadErr = 'no image selected . Please select image';
        } else {
            $file     = $_FILES['image_file'];
            $ext      = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $allowed  = ['jpg','jpeg','png','webp','gif'];

            if (!in_array($ext, $allowed)) {
                $uploadErr = 'Sirf JPG, PNG, WEBP, GIF only allowed !';
            } elseif ($file['size'] > 5 * 1024 * 1024) {
                $uploadErr = 'File size 5MB se zyada hai bhai!';
            } else {
                // Get product slug for filename
                $pStmt = $conn->prepare("SELECT slug FROM products WHERE id = ?");
                $pStmt->bind_param("i", $product_id);
                $pStmt->execute();
                $pRow = $pStmt->get_result()->fetch_assoc();
                $slug = $pRow ? $pRow['slug'] : 'product-' . $product_id;

                $uploadDir = '../assets/images/products/';
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

                $filename   = $slug . '-' . time() . '-' . rand(100,999) . '.' . $ext;
                $uploadPath = $uploadDir . $filename;
                $dbPath     = 'assets/images/products/' . $filename;

                if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                    $ins = $conn->prepare("INSERT INTO product_images (product_id, image_path, alt_text, sort_order) VALUES (?, ?, ?, ?)");
                    $ins->bind_param("issi", $product_id, $dbPath, $alt_text, $sort_order);
                    $ins->execute();
                    $uploadMsg = '✅ Image successfully uploaded!';
                } else {
                    $uploadErr = 'Upload fail ho gaya! Folder permissions check karo.';
                }
            }
        }
    }

    // --- DELETE IMAGE ---
    if ($_POST['action'] === 'delete_image') {
        $img_id = (int)$_POST['img_id'];
        $delStmt = $conn->prepare("SELECT image_path FROM product_images WHERE id = ?");
        $delStmt->bind_param("i", $img_id);
        $delStmt->execute();
        $delRow = $delStmt->get_result()->fetch_assoc();
        if ($delRow) {
            $filePath = '../' . $delRow['image_path'];
            if (file_exists($filePath)) unlink($filePath);
            $conn->prepare("DELETE FROM product_images WHERE id = ?")->bind_param("i", $img_id) && $conn->prepare("DELETE FROM product_images WHERE id = ?")->execute();
            $d = $conn->prepare("DELETE FROM product_images WHERE id = ?");
            $d->bind_param("i", $img_id);
            $d->execute();
            $uploadMsg = '🗑️ Image deleted!';
        }
    }
}

// ===== FETCH ALL PRODUCTS WITH IMAGE COUNT =====
$products = [];
$res = $conn->query("SELECT p.id, p.name, p.slug, p.category, p.image, COUNT(pi2.id) as img_count FROM products p LEFT JOIN product_images pi2 ON p.id=pi2.product_id WHERE p.is_active=1 GROUP BY p.id ORDER BY p.sort_order");
while($row = $res->fetch_assoc()) $products[] = $row;

// ===== FETCH GALLERY IMAGES FOR SELECTED PRODUCT =====
$selectedProduct = null;
$galleryImages   = [];
$selectedId = isset($_GET['product_id']) ? (int)$_GET['product_id'] : 0;
if ($selectedId) {
    $sp = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $sp->bind_param("i", $selectedId);
    $sp->execute();
    $selectedProduct = $sp->get_result()->fetch_assoc();

    $gi = $conn->prepare("SELECT * FROM product_images WHERE product_id = ? ORDER BY sort_order, id");
    $gi->bind_param("i", $selectedId);
    $gi->execute();
    $giRes = $gi->get_result();
    while($row = $giRes->fetch_assoc()) $galleryImages[] = $row;
}

include 'header.php';
?>

<div style="padding:24px;">

<?php if ($uploadMsg): ?>
<div style="background:#f0fdf4;border:1.5px solid #86efac;border-radius:10px;padding:12px 18px;margin-bottom:16px;font-size:13px;color:#166534;font-weight:700;">
    <?= $uploadMsg ?>
</div>
<?php endif; ?>

<?php if ($uploadErr): ?>
<div style="background:#fef2f2;border:1.5px solid #fca5a5;border-radius:10px;padding:12px 18px;margin-bottom:16px;font-size:13px;color:#dc2626;font-weight:700;">
    ⚠️ <?= $uploadErr ?>
</div>
<?php endif; ?>

<!-- INFO BOX -->
<div style="background:#eff6ff;border:1.5px solid #bfdbfe;border-radius:12px;padding:14px 18px;margin-bottom:20px;font-size:13px;color:#1e40af;">
    <b>ℹ️ Info:</b> Har product ka <b>main image</b> products table se aata hai. Extra images yahan add karo — product detail page pe <b>gallery/thumbnails</b> mein dikhenge.
</div>

<div style="display:grid;grid-template-columns:340px 1fr;gap:20px;align-items:start;">

    <!-- LEFT: PRODUCTS LIST -->
    <div style="background:white;border-radius:16px;border:1.5px solid #e2e8f0;overflow:hidden;position:sticky;top:20px;">
        <div style="background:#f8fafc;padding:14px 18px;border-bottom:2px solid #e2e8f0;">
            <h3 style="font-size:13px;font-weight:800;color:#0a2463;margin:0;">📦 Products</h3>
        </div>
        <div style="max-height:70vh;overflow-y:auto;">
            <?php foreach($products as $p): ?>
            <a href="?product_id=<?= $p['id'] ?>" style="display:flex;align-items:center;gap:10px;padding:12px 16px;border-bottom:1px solid #f1f5f9;text-decoration:none;<?= $selectedId===$p['id'] ? 'background:#eff6ff;border-left:3px solid #0a2463;' : '' ?>"
               onmouseover="if(<?= $selectedId ?>!=<?= $p['id'] ?>)this.style.background='#f8faff'"
               onmouseout="if(<?= $selectedId ?>!=<?= $p['id'] ?>)this.style.background='white'">
                <img src="../<?= htmlspecialchars(ltrim($p['image'], './')) ?>" style="width:36px;height:36px;object-fit:contain;border-radius:6px;border:1px solid #e2e8f0;padding:2px;flex-shrink:0;" onerror="this.style.display='none'">
                <div style="flex:1;min-width:0;">
                    <div style="font-size:12px;font-weight:700;color:#0a2463;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?= htmlspecialchars($p['name']) ?></div>
                    <div style="font-size:10px;color:#94a3b8;margin-top:1px;"><?= htmlspecialchars($p['category']) ?></div>
                </div>
                <span style="background:<?= $p['img_count']>0?'#dbeafe':'#f1f5f9' ?>;color:<?= $p['img_count']>0?'#1d4ed8':'#94a3b8' ?>;font-size:10px;font-weight:800;padding:2px 7px;border-radius:20px;flex-shrink:0;">
                    <?= $p['img_count'] ?>
                </span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- RIGHT: GALLERY MANAGER -->
    <div>
        <?php if (!$selectedProduct): ?>
        <!-- No product selected -->
        <div style="background:white;border-radius:16px;border:1.5px solid #e2e8f0;padding:60px;text-align:center;">
            <div style="font-size:48px;margin-bottom:16px;">🖼️</div>
            <div style="font-size:16px;font-weight:700;color:#64748b;margin-bottom:8px;">no product selected</div>
            <div style="font-size:13px;color:#94a3b8;">click any product on left side to manage images</div>
        </div>

        <?php else: ?>

        <!-- PRODUCT HEADER -->
        <div style="background:white;border-radius:16px;border:1.5px solid #e2e8f0;padding:16px 20px;margin-bottom:16px;display:flex;align-items:center;gap:14px;">
            <img src="../<?= htmlspecialchars(ltrim($selectedProduct['image'],'./')) ?>" style="width:56px;height:56px;object-fit:contain;border-radius:8px;border:1.5px solid #e2e8f0;padding:4px;">
            <div>
                <div style="font-size:15px;font-weight:800;color:#0a2463;"><?= htmlspecialchars($selectedProduct['name']) ?></div>
                <div style="font-size:12px;color:#64748b;margin-top:2px;"><?= htmlspecialchars($selectedProduct['category']) ?> &nbsp;•&nbsp; <?= count($galleryImages) ?> gallery images + 1 main image</div>
            </div>
        </div>

        <!-- UPLOAD FORM -->
        <div style="background:white;border-radius:16px;border:1.5px solid #e2e8f0;overflow:hidden;margin-bottom:16px;">
            <div style="background:#f8fafc;padding:14px 18px;border-bottom:2px solid #e2e8f0;display:flex;align-items:center;gap:8px;">
                <span style="font-size:13px;font-weight:800;color:#0a2463;">➕ New Image Add Karo</span>
            </div>
            <div style="padding:20px;">
                <form method="POST" enctype="multipart/form-data" action="?product_id=<?= $selectedId ?>">
                    <input type="hidden" name="action" value="add_image">
                    <input type="hidden" name="product_id" value="<?= $selectedId ?>">

                    <!-- FILE UPLOAD ZONE -->
                    <div id="uploadZone" onclick="document.getElementById('imageFileInput').click()"
                         style="border:2px dashed #cbd5e1;border-radius:12px;padding:32px;text-align:center;cursor:pointer;background:#f8fafc;transition:all 0.2s;margin-bottom:16px;"
                         ondragover="event.preventDefault();this.style.borderColor='#0a2463';this.style.background='#eff6ff';"
                         ondragleave="this.style.borderColor='#cbd5e1';this.style.background='#f8fafc';"
                         ondrop="handleDrop(event)">

                        <!-- Preview (hidden initially) -->
                        <div id="previewBox" style="display:none;flex-direction:column;align-items:center;gap:12px;">
                            <img id="previewImg" style="max-height:160px;max-width:100%;object-fit:contain;border-radius:8px;border:1.5px solid #e2e8f0;padding:8px;background:white;">
                            <div style="display:flex;align-items:center;gap:8px;">
                                <span id="previewName" style="font-size:12px;font-weight:700;color:#0a2463;"></span>
                                <span id="previewSize" style="font-size:11px;color:#94a3b8;background:#f1f5f9;padding:2px 8px;border-radius:20px;"></span>
                            </div>
                            <button type="button" onclick="event.stopPropagation();clearPreview()" style="font-size:11px;font-weight:700;color:#dc2626;border:1px solid #fca5a5;background:white;padding:4px 12px;border-radius:6px;cursor:pointer;">
                                ✕ Change Image
                            </button>
                        </div>

                        <!-- Default upload UI -->
                        <div id="uploadUI">
                            <div style="font-size:40px;margin-bottom:10px;">📁</div>
                            <div style="font-size:14px;font-weight:700;color:#0a2463;margin-bottom:4px;">click or drag any images here</div>
                            <div style="font-size:12px;color:#94a3b8;">JPG, PNG, WEBP, GIF • Max 5MB</div>
                        </div>

                        <input type="file" id="imageFileInput" name="image_file" accept="image/*" style="display:none;" onchange="showPreview(this)">
                    </div>

                    <!-- ALT TEXT + SORT -->
                    <div style="display:grid;grid-template-columns:1fr 120px;gap:12px;margin-bottom:16px;">
                        <div>
                            <label style="display:block;font-size:11px;font-weight:700;color:#64748b;margin-bottom:6px;text-transform:uppercase;letter-spacing:0.05em;">Alt Text (Optional)</label>
                            <input type="text" name="alt_text" placeholder="e.g. Bronze Globe Valve Front View"
                                   style="width:100%;border:1.5px solid #e2e8f0;border-radius:8px;padding:9px 12px;font-size:13px;outline:none;box-sizing:border-box;"
                                   onfocus="this.style.borderColor='#0a2463'" onblur="this.style.borderColor='#e2e8f0'">
                        </div>
                        <div>
                            <label style="display:block;font-size:11px;font-weight:700;color:#64748b;margin-bottom:6px;text-transform:uppercase;letter-spacing:0.05em;">Sort Order</label>
                            <input type="number" name="sort_order" value="<?= count($galleryImages) ?>" min="0"
                                   style="width:100%;border:1.5px solid #e2e8f0;border-radius:8px;padding:9px 12px;font-size:13px;outline:none;box-sizing:border-box;"
                                   onfocus="this.style.borderColor='#0a2463'" onblur="this.style.borderColor='#e2e8f0'">
                        </div>
                    </div>

                    <button type="submit" id="uploadBtn"
                            style="width:100%;background:#0a2463;color:white;border:none;border-radius:10px;padding:12px;font-size:13px;font-weight:800;cursor:pointer;opacity:0.5;pointer-events:none;"
                            onmouseover="if(this.style.pointerEvents!='none')this.style.background='#1a3a7a'"
                            onmouseout="if(this.style.pointerEvents!='none')this.style.background='#0a2463'">
                        📤 upload the image
                    </button>
                </form>
            </div>
        </div>

        <!-- GALLERY IMAGES -->
        <div style="background:white;border-radius:16px;border:1.5px solid #e2e8f0;overflow:hidden;">
            <div style="background:#f8fafc;padding:14px 18px;border-bottom:2px solid #e2e8f0;">
                <span style="font-size:13px;font-weight:800;color:#0a2463;">🖼️ Gallery Images (<?= count($galleryImages) ?>)</span>
            </div>

            <?php if(empty($galleryImages)): ?>
            <div style="padding:40px;text-align:center;color:#94a3b8;">
                <div style="font-size:32px;margin-bottom:10px;">📭</div>
                <div style="font-size:13px;font-weight:600;">No gallery images available</div>
                <div style="font-size:12px;margin-top:4px;">Upload images from above!</div>
            </div>

            <?php else: ?>
            <!-- MAIN IMAGE (read-only) -->
            <div style="padding:14px 18px;border-bottom:1px solid #f1f5f9;background:#f0fdf4;">
                <div style="font-size:11px;font-weight:700;color:#166534;margin-bottom:10px;text-transform:uppercase;letter-spacing:0.05em;">✅ Main Image (products table se)</div>
                <div style="display:flex;align-items:center;gap:12px;">
                    <img src="../<?= htmlspecialchars(ltrim($selectedProduct['image'],'./')) ?>"
                         style="width:64px;height:64px;object-fit:contain;border-radius:8px;border:1.5px solid #bbf7d0;padding:4px;background:white;">
                    <div>
                        <div style="font-size:12px;font-weight:700;color:#166534;">Main Product Image</div>
                        <div style="font-size:11px;color:#94a3b8;margin-top:2px;"><?= htmlspecialchars($selectedProduct['image']) ?></div>
                    </div>
                    <span style="margin-left:auto;font-size:10px;font-weight:700;background:#bbf7d0;color:#166534;padding:3px 10px;border-radius:20px;">Default</span>
                </div>
            </div>

            <!-- GALLERY IMAGES LIST -->
            <div style="padding:14px 18px;">
                <div style="font-size:11px;font-weight:700;color:#64748b;margin-bottom:12px;text-transform:uppercase;letter-spacing:0.05em;">Gallery Images</div>
                <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(160px,1fr));gap:14px;">
                    <?php foreach($galleryImages as $idx => $img): ?>
                    <div style="border:1.5px solid #e2e8f0;border-radius:12px;overflow:hidden;background:#f8fafc;">
                        <div style="position:relative;background:white;height:120px;display:flex;align-items:center;justify-content:center;padding:8px;">
                            <img src="../<?= htmlspecialchars($img['image_path']) ?>"
                                 style="max-width:100%;max-height:100%;object-fit:contain;"
                                 onerror="this.src='';this.style.display='none'">
                            <span style="position:absolute;top:6px;left:6px;background:#0a2463;color:white;font-size:9px;font-weight:800;padding:2px 6px;border-radius:4px;">#<?= $idx+1 ?></span>
                        </div>
                        <div style="padding:8px 10px;">
                            <div style="font-size:10px;color:#64748b;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;margin-bottom:6px;" title="<?= htmlspecialchars($img['alt_text'] ?? '') ?>">
                                <?= $img['alt_text'] ? htmlspecialchars($img['alt_text']) : '<span style="color:#cbd5e1;">No alt text</span>' ?>
                            </div>
                            <div style="display:flex;align-items:center;justify-content:space-between;font-size:9px;color:#94a3b8;margin-bottom:8px;">
                                <span>Sort: <?= $img['sort_order'] ?></span>
                                <span>ID: <?= $img['id'] ?></span>
                            </div>
                            <form method="POST" action="?product_id=<?= $selectedId ?>" onsubmit="return confirm('Pakka delete karna hai bhai?')">
                                <input type="hidden" name="action" value="delete_image">
                                <input type="hidden" name="img_id" value="<?= $img['id'] ?>">
                                <button type="submit" style="width:100%;background:#fef2f2;color:#dc2626;border:1px solid #fca5a5;border-radius:6px;padding:5px;font-size:10px;font-weight:700;cursor:pointer;">
                                    🗑️ Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <?php endif; ?>
    </div>
</div>
</div>

<script>
function showPreview(input) {
    if (!input.files || !input.files[0]) return;
    const file = input.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('previewImg').src = e.target.result;
        document.getElementById('previewName').textContent = file.name;
        document.getElementById('previewSize').textContent = (file.size/1024/1024).toFixed(2) + ' MB';
        document.getElementById('uploadUI').style.display = 'none';
        document.getElementById('previewBox').style.display = 'flex';
        // Enable upload button
        const btn = document.getElementById('uploadBtn');
        btn.style.opacity = '1';
        btn.style.pointerEvents = 'auto';
    };
    reader.readAsDataURL(file);
}

function clearPreview() {
    document.getElementById('imageFileInput').value = '';
    document.getElementById('previewBox').style.display = 'none';
    document.getElementById('uploadUI').style.display = 'block';
    const btn = document.getElementById('uploadBtn');
    btn.style.opacity = '0.5';
    btn.style.pointerEvents = 'none';
}

function handleDrop(event) {
    event.preventDefault();
    document.getElementById('uploadZone').style.borderColor = '#cbd5e1';
    document.getElementById('uploadZone').style.background = '#f8fafc';
    const files = event.dataTransfer.files;
    if (files.length > 0) {
        const input = document.getElementById('imageFileInput');
        // Transfer dropped file to input
        const dt = new DataTransfer();
        dt.items.add(files[0]);
        input.files = dt.files;
        showPreview(input);
    }
}
</script>

<?php include 'footer.php'; ?>