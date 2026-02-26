<?php
require_once 'auth.php';
require_once '../assets/include/config.php';
$conn = getConn();

$pageTitle    = 'Edit Product';
$pageSubtitle = 'Update product details';
$activePage   = 'products';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if (!$id) { header('Location: products.php'); exit; }

$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
if (!$product) { header('Location: products.php'); exit; }

$pageTitle = 'Edit: ' . substr($product['name'], 0, 30);

$error = ''; $success = '';

// Handle product update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_product') {
    $name           = trim($_POST['name'] ?? '');
    $slug           = trim($_POST['slug'] ?? '');
    $subtitle       = trim($_POST['subtitle'] ?? '');
    $category       = trim($_POST['category'] ?? '');
    $description    = trim($_POST['description'] ?? '');
    $image          = trim($_POST['image'] ?? '');
    $price_min      = floatval($_POST['price_min'] ?? 0);
    $price_max      = floatval($_POST['price_max'] ?? 0);
    $mrp            = floatval($_POST['mrp'] ?? 0);
    $gst_percent    = floatval($_POST['gst_percent'] ?? 18);
    $in_stock       = isset($_POST['in_stock']) ? 1 : 0;
    $stock_label    = trim($_POST['stock_label'] ?? 'In Stock');
    $best_price     = isset($_POST['best_price']) ? 1 : 0;
    $min_order      = intval($_POST['min_order'] ?? 1);
    $min_order_unit = trim($_POST['min_order_unit'] ?? 'Piece');
    $delivery_days  = trim($_POST['delivery_days'] ?? '5-7 Days');
    $warranty       = trim($_POST['warranty'] ?? 'Mfr. Terms');
    $certification  = trim($_POST['certification'] ?? 'ISO • IBR');
    $ships_within   = trim($_POST['ships_within'] ?? 'Ships within 24 hrs');
    $rating         = floatval($_POST['rating'] ?? 4.5);
    $orders_count   = trim($_POST['orders_count'] ?? '100+ Orders');
    $badge          = trim($_POST['badge'] ?? '');
    $sort_order     = intval($_POST['sort_order'] ?? 0);

    // ===== MAIN IMAGE UPLOAD (Basic tab) =====
    if (isset($_FILES['main_image_file']) && $_FILES['main_image_file']['error'] === UPLOAD_ERR_OK) {
        $file    = $_FILES['main_image_file'];
        $ext     = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','webp','gif'];
        if (in_array($ext, $allowed) && $file['size'] <= 5*1024*1024) {
            $uploadDir = '../assets/images/products/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
            $filename   = $slug . '-main-' . time() . '.' . $ext;
            $uploadPath = $uploadDir . $filename;
            if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                $image = 'assets/images/products/' . $filename;
            }
        }
    }

    $stmt = $conn->prepare("UPDATE products SET name=?,slug=?,subtitle=?,category=?,description=?,image=?,price_min=?,price_max=?,mrp=?,gst_percent=?,in_stock=?,stock_label=?,best_price=?,min_order=?,min_order_unit=?,delivery_days=?,warranty=?,certification=?,ships_within=?,rating=?,orders_count=?,badge=?,sort_order=? WHERE id=?");
    $stmt->bind_param("ssssssddddisissssssdssii",
        $name,$slug,$subtitle,$category,$description,$image,
        $price_min,$price_max,$mrp,$gst_percent,
        $in_stock,$stock_label,$best_price,
        $min_order,$min_order_unit,$delivery_days,$warranty,$certification,$ships_within,
        $rating,$orders_count,$badge,$sort_order,$id
    );
    if ($stmt->execute()) {
        $product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
        $success = 'Product updated successfully!';
    } else {
        $error = 'Update error: ' . $conn->error;
    }
}

// Handle spec add
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_spec') {
    $key = trim($_POST['spec_key'] ?? '');
    $val = trim($_POST['spec_value'] ?? '');
    $ord = intval($_POST['spec_order'] ?? 0);
    if ($key && $val) {
        $stmt = $conn->prepare("INSERT INTO product_specifications (product_id, spec_key, spec_value, sort_order) VALUES (?,?,?,?)");
        $stmt->bind_param("issi", $id, $key, $val, $ord);
        $stmt->execute();
        $success = 'Specification added!';
    }
}
if (isset($_GET['del_spec'])) {
    $conn->query("DELETE FROM product_specifications WHERE id=".(int)$_GET['del_spec']." AND product_id=$id");
    header("Location: product_edit.php?id=$id&tab=specs&msg=deleted"); exit;
}

// Handle feature add
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_feature') {
    $feat = trim($_POST['feature'] ?? '');
    $ord  = intval($_POST['feat_order'] ?? 0);
    if ($feat) {
        $stmt = $conn->prepare("INSERT INTO product_features (product_id, feature, sort_order) VALUES (?,?,?)");
        $stmt->bind_param("isi", $id, $feat, $ord);
        $stmt->execute();
        $success = 'Feature added!';
    }
}
if (isset($_GET['del_feat'])) {
    $conn->query("DELETE FROM product_features WHERE id=".(int)$_GET['del_feat']." AND product_id=$id");
    header("Location: product_edit.php?id=$id&tab=features&msg=deleted"); exit;
}

// Handle application add
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_app') {
    $app = trim($_POST['application'] ?? '');
    $ord = intval($_POST['app_order'] ?? 0);
    if ($app) {
        $stmt = $conn->prepare("INSERT INTO product_applications (product_id, application, sort_order) VALUES (?,?,?)");
        $stmt->bind_param("isi", $id, $app, $ord);
        $stmt->execute();
        $success = 'Application added!';
    }
}
if (isset($_GET['del_app'])) {
    $conn->query("DELETE FROM product_applications WHERE id=".(int)$_GET['del_app']." AND product_id=$id");
    header("Location: product_edit.php?id=$id&tab=applications&msg=deleted"); exit;
}

// ===== GALLERY IMAGE UPLOAD (Images tab) =====
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_image') {
    if (!isset($_FILES['image_file']) || $_FILES['image_file']['error'] !== UPLOAD_ERR_OK) {
        $error = 'Koi file select nahi ki! Pehle image choose karo.';
    } else {
        $file    = $_FILES['image_file'];
        $ext     = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','webp','gif'];
        if (!in_array($ext, $allowed)) {
            $error = 'Sirf JPG, PNG, WEBP, GIF allowed hai!';
        } elseif ($file['size'] > 5*1024*1024) {
            $error = 'File 5MB se badi hai!';
        } else {
            $uploadDir = '../assets/images/products/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
            $filename   = $product['slug'] . '-' . time() . '-' . rand(100,999) . '.' . $ext;
            $uploadPath = $uploadDir . $filename;
            $dbPath     = 'assets/images/products/' . $filename;
            if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                $alt = trim($_POST['alt_text'] ?? '');
                $ord = intval($_POST['img_order'] ?? 0);
                $stmt = $conn->prepare("INSERT INTO product_images (product_id, image_path, alt_text, sort_order) VALUES (?,?,?,?)");
                $stmt->bind_param("issi", $id, $dbPath, $alt, $ord);
                $stmt->execute();
                $success = '✅ Gallery image upload ho gayi!';
            } else {
                $error = 'Upload fail! Folder permissions check karo.';
            }
        }
    }
}

if (isset($_GET['del_img'])) {
    // Delete file too
    $dr = $conn->query("SELECT image_path FROM product_images WHERE id=".(int)$_GET['del_img']." AND product_id=$id")->fetch_assoc();
    if ($dr) {
        $fp = '../' . $dr['image_path'];
        if (file_exists($fp)) unlink($fp);
    }
    $conn->query("DELETE FROM product_images WHERE id=".(int)$_GET['del_img']." AND product_id=$id");
    header("Location: product_edit.php?id=$id&tab=images&msg=deleted"); exit;
}

// Handle offer add
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_offer') {
    $icon = trim($_POST['icon'] ?? '🏷');
    $text = trim($_POST['offer_text'] ?? '');
    $note = trim($_POST['valid_note'] ?? '');
    $ord  = intval($_POST['offer_order'] ?? 0);
    if ($text) {
        $stmt = $conn->prepare("INSERT INTO product_offers (product_id, category, icon, offer_text, valid_note, sort_order, is_active) VALUES (?,?,?,?,?,?,1)");
        $cat = $product['category'];
        $stmt->bind_param("issssi", $id, $cat, $icon, $text, $note, $ord);
        $stmt->execute();
        $success = 'Offer added!';
    }
}
if (isset($_GET['del_offer'])) {
    $conn->query("DELETE FROM product_offers WHERE id=".(int)$_GET['del_offer']." AND product_id=$id");
    header("Location: product_edit.php?id=$id&tab=offers&msg=deleted"); exit;
}

// Fetch related data
$specs = [];
$sr = $conn->query("SELECT * FROM product_specifications WHERE product_id=$id ORDER BY sort_order");
while($row = $sr->fetch_assoc()) $specs[] = $row;

$features = [];
$fr = $conn->query("SELECT * FROM product_features WHERE product_id=$id ORDER BY sort_order");
while($row = $fr->fetch_assoc()) $features[] = $row;

$applications = [];
$ar = $conn->query("SELECT * FROM product_applications WHERE product_id=$id ORDER BY sort_order");
while($row = $ar->fetch_assoc()) $applications[] = $row;

$images = [];
$ir = $conn->query("SELECT * FROM product_images WHERE product_id=$id ORDER BY sort_order");
while($row = $ir->fetch_assoc()) $images[] = $row;

$offers = [];
$or2 = $conn->query("SELECT * FROM product_offers WHERE product_id=$id ORDER BY sort_order");
while($row = $or2->fetch_assoc()) $offers[] = $row;

$activeTab = $_GET['tab'] ?? 'basic';

include 'header.php';
?>

<div style="padding:24px;">

<?php if($error): ?>
<div style="background:#fef2f2;border:1.5px solid #fca5a5;color:#b71c1c;padding:12px 16px;border-radius:10px;margin-bottom:16px;font-size:13px;font-weight:700;">❌ <?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>
<?php if($success || isset($_GET['msg'])): ?>
<div style="background:#f0fdf4;border:1.5px solid #86efac;color:#16a34a;padding:12px 16px;border-radius:10px;margin-bottom:16px;font-size:13px;font-weight:700;">✅ <?php echo $success ?: ($_GET['msg']==='added'?'Added!':'Action completed!'); ?></div>
<?php endif; ?>

<!-- PRODUCT HEADER CARD -->
<div style="background:white;border-radius:16px;padding:20px;border:1.5px solid #e2e8f0;margin-bottom:20px;display:flex;align-items:center;gap:16px;">
    <img src="../<?php echo htmlspecialchars(ltrim($product['image'],'./')); ?>" style="width:64px;height:64px;object-fit:contain;border-radius:10px;border:1.5px solid #e2e8f0;padding:4px;" onerror="this.style.display='none'">
    <div style="flex:1;">
        <h2 style="font-size:16px;font-weight:800;color:#0a2463;"><?php echo htmlspecialchars($product['name']); ?></h2>
        <div style="font-size:12px;color:#64748b;margin-top:2px;"><?php echo htmlspecialchars($product['category']); ?> • slug: <?php echo htmlspecialchars($product['slug']); ?></div>
    </div>
    <div style="text-align:right;">
        <div style="font-size:20px;font-weight:900;color:#b71c1c;">₹<?php echo number_format($product['price_min'],0,'.',','); ?></div>
        <a href="../product_details.php?slug=<?php echo urlencode($product['slug']); ?>" target="_blank" style="font-size:11px;color:#0a2463;font-weight:700;text-decoration:none;">View on site →</a>
    </div>
</div>

<!-- TABS -->
<div style="display:flex;gap:4px;margin-bottom:20px;background:white;padding:6px;border-radius:12px;border:1.5px solid #e2e8f0;overflow-x:auto;">
    <?php
    $tabs = [
        'basic'        => ['icon'=>'📋','label'=>'Basic Info'],
        'specs'        => ['icon'=>'📐','label'=>'Specs ('.count($specs).')'],
        'features'     => ['icon'=>'✅','label'=>'Features ('.count($features).')'],
        'applications' => ['icon'=>'🏭','label'=>'Applications ('.count($applications).')'],
        'images'       => ['icon'=>'🖼️','label'=>'Images ('.count($images).')'],
        'offers'       => ['icon'=>'🏷️','label'=>'Offers ('.count($offers).')'],
    ];
    foreach($tabs as $tk => $tv):
        $isActive = $activeTab === $tk;
    ?>
    <a href="?id=<?php echo $id; ?>&tab=<?php echo $tk; ?>"
       style="padding:8px 16px;border-radius:8px;font-size:12px;font-weight:700;text-decoration:none;white-space:nowrap;<?php echo $isActive?'background:#0a2463;color:white;':'color:#64748b;'; ?>">
        <?php echo $tv['icon']; ?> <?php echo $tv['label']; ?>
    </a>
    <?php endforeach; ?>
</div>

<!-- ===== BASIC INFO TAB ===== -->
<?php if($activeTab === 'basic'): ?>
<form method="POST" enctype="multipart/form-data">
<input type="hidden" name="action" value="update_product">
<div style="display:grid;grid-template-columns:1fr 360px;gap:20px;align-items:start;">
<div style="display:flex;flex-direction:column;gap:16px;">

    <div style="background:white;border-radius:16px;padding:24px;border:1.5px solid #e2e8f0;">
        <h3 style="font-size:14px;font-weight:800;color:#0a2463;margin-bottom:20px;padding-bottom:10px;border-bottom:2px solid #f1f5f9;">📋 Basic Information</h3>
        <div style="display:grid;gap:14px;">
            <div>
                <label style="font-size:11px;font-weight:800;color:#64748b;display:block;margin-bottom:6px;text-transform:uppercase;">Product Name</label>
                <input type="text" name="name" required value="<?php echo htmlspecialchars($product['name']); ?>"
                       style="width:100%;padding:10px 14px;border:2px solid #e2e8f0;border-radius:10px;font-size:14px;font-weight:600;color:#1e293b;outline:none;box-sizing:border-box;">
            </div>
            <div>
                <label style="font-size:11px;font-weight:800;color:#64748b;display:block;margin-bottom:6px;text-transform:uppercase;">Slug</label>
                <input type="text" name="slug" value="<?php echo htmlspecialchars($product['slug']); ?>"
                       style="width:100%;padding:10px 14px;border:2px solid #e2e8f0;border-radius:10px;font-size:13px;font-weight:600;color:#64748b;outline:none;box-sizing:border-box;background:#f8fafc;">
            </div>
            <div>
                <label style="font-size:11px;font-weight:800;color:#64748b;display:block;margin-bottom:6px;text-transform:uppercase;">Subtitle</label>
                <input type="text" name="subtitle" value="<?php echo htmlspecialchars($product['subtitle']??''); ?>"
                       style="width:100%;padding:10px 14px;border:2px solid #e2e8f0;border-radius:10px;font-size:13px;font-weight:600;color:#1e293b;outline:none;box-sizing:border-box;">
            </div>
            <div>
                <label style="font-size:11px;font-weight:800;color:#64748b;display:block;margin-bottom:6px;text-transform:uppercase;">Category</label>
                <select name="category" style="width:100%;padding:10px 14px;border:2px solid #e2e8f0;border-radius:10px;font-size:13px;font-weight:600;color:#1e293b;outline:none;box-sizing:border-box;">
                    <option value="Gate / Globe Valves" <?php echo $product['category']==='Gate / Globe Valves'?'selected':''; ?>>Gate / Globe Valves</option>
                    <option value="Ball / Check Valves" <?php echo $product['category']==='Ball / Check Valves'?'selected':''; ?>>Ball / Check Valves</option>
                    <option value="Pipes & Fittings" <?php echo $product['category']==='Pipes & Fittings'?'selected':''; ?>>Pipes & Fittings</option>
                </select>
            </div>
            <div>
                <label style="font-size:11px;font-weight:800;color:#64748b;display:block;margin-bottom:6px;text-transform:uppercase;">Description</label>
                <textarea name="description" rows="4" style="width:100%;padding:10px 14px;border:2px solid #e2e8f0;border-radius:10px;font-size:13px;color:#1e293b;outline:none;box-sizing:border-box;resize:vertical;"><?php echo htmlspecialchars($product['description']??''); ?></textarea>
            </div>

            <!-- ===== MAIN IMAGE - PROPER UPLOAD ===== -->
            <div>
                <label style="font-size:11px;font-weight:800;color:#64748b;display:block;margin-bottom:6px;text-transform:uppercase;">Main Product Image</label>

                <!-- Current image preview -->
                <div style="background:#f8fafc;border:1.5px solid #e2e8f0;border-radius:10px;padding:12px;margin-bottom:10px;display:flex;align-items:center;gap:12px;">
                    <img id="currentMainImg" src="../<?php echo htmlspecialchars(ltrim($product['image'],'./')); ?>"
                         style="width:72px;height:72px;object-fit:contain;border-radius:8px;border:1.5px solid #e2e8f0;padding:4px;background:white;"
                         onerror="this.style.display='none'">
                    <div>
                        <div style="font-size:11px;font-weight:700;color:#64748b;margin-bottom:3px;">Current Image</div>
                        <div style="font-size:10px;color:#94a3b8;word-break:break-all;"><?php echo htmlspecialchars($product['image']); ?></div>
                    </div>
                </div>

                <!-- Upload zone -->
                <div id="mainUploadZone" onclick="document.getElementById('mainImageFile').click()"
                     style="border:2px dashed #cbd5e1;border-radius:10px;padding:24px;text-align:center;cursor:pointer;background:#f8fafc;transition:all 0.2s;"
                     ondragover="event.preventDefault();this.style.borderColor='#0a2463';this.style.background='#eff6ff';"
                     ondragleave="this.style.borderColor='#cbd5e1';this.style.background='#f8fafc';"
                     ondrop="handleMainDrop(event)">

                    <div id="mainUploadUI">
                        <div style="font-size:28px;margin-bottom:8px;">📁</div>
                        <div style="font-size:13px;font-weight:700;color:#0a2463;margin-bottom:3px;">click or drag any image</div>
                        <div style="font-size:11px;color:#94a3b8;">JPG, PNG, WEBP, GIF • Max 5MB</div>
                        <div style="font-size:10px;color:#94a3b8;margin-top:4px;">upload new image for replacing main image</div>
                    </div>

                    <div id="mainPreviewBox" style="display:none;flex-direction:column;align-items:center;gap:10px;">
                        <img id="mainPreviewImg" style="max-height:120px;max-width:100%;object-fit:contain;border-radius:8px;border:1.5px solid #e2e8f0;padding:8px;background:white;">
                        <div style="display:flex;align-items:center;gap:8px;">
                            <span id="mainPreviewName" style="font-size:12px;font-weight:700;color:#0a2463;"></span>
                            <span id="mainPreviewSize" style="font-size:11px;color:#94a3b8;background:#f1f5f9;padding:2px 8px;border-radius:20px;"></span>
                        </div>
                        <button type="button" onclick="event.stopPropagation();clearMainPreview()"
                                style="font-size:11px;font-weight:700;color:#dc2626;border:1px solid #fca5a5;background:white;padding:4px 12px;border-radius:6px;cursor:pointer;">
                            ✕ Change Image
                        </button>
                    </div>

                    <input type="file" id="mainImageFile" name="main_image_file" accept="image/*" style="display:none;" onchange="showMainPreview(this)">
                </div>

                <!-- Hidden field to keep existing path if no new upload -->
                <input type="hidden" name="image" value="<?php echo htmlspecialchars($product['image']); ?>">
            </div>
        </div>
    </div>

    <div style="background:white;border-radius:16px;padding:24px;border:1.5px solid #e2e8f0;">
        <h3 style="font-size:14px;font-weight:800;color:#0a2463;margin-bottom:20px;padding-bottom:10px;border-bottom:2px solid #f1f5f9;">💰 Pricing</h3>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
            <div><label style="font-size:11px;font-weight:800;color:#64748b;display:block;margin-bottom:6px;text-transform:uppercase;">Min Price (₹)</label>
            <input type="number" name="price_min" step="0.01" value="<?php echo $product['price_min']; ?>" style="width:100%;padding:10px 14px;border:2px solid #e2e8f0;border-radius:10px;font-size:14px;font-weight:700;color:#b71c1c;outline:none;box-sizing:border-box;"></div>
            <div><label style="font-size:11px;font-weight:800;color:#64748b;display:block;margin-bottom:6px;text-transform:uppercase;">Max Price (₹)</label>
            <input type="number" name="price_max" step="0.01" value="<?php echo $product['price_max']; ?>" style="width:100%;padding:10px 14px;border:2px solid #e2e8f0;border-radius:10px;font-size:14px;font-weight:700;color:#b71c1c;outline:none;box-sizing:border-box;"></div>
            <div><label style="font-size:11px;font-weight:800;color:#64748b;display:block;margin-bottom:6px;text-transform:uppercase;">MRP (₹)</label>
            <input type="number" name="mrp" step="0.01" value="<?php echo $product['mrp']??0; ?>" style="width:100%;padding:10px 14px;border:2px solid #e2e8f0;border-radius:10px;font-size:13px;font-weight:600;outline:none;box-sizing:border-box;"></div>
            <div><label style="font-size:11px;font-weight:800;color:#64748b;display:block;margin-bottom:6px;text-transform:uppercase;">GST %</label>
            <input type="number" name="gst_percent" step="0.01" value="<?php echo $product['gst_percent']??18; ?>" style="width:100%;padding:10px 14px;border:2px solid #e2e8f0;border-radius:10px;font-size:13px;font-weight:600;outline:none;box-sizing:border-box;"></div>
        </div>
    </div>

    <div style="background:white;border-radius:16px;padding:24px;border:1.5px solid #e2e8f0;">
        <h3 style="font-size:14px;font-weight:800;color:#0a2463;margin-bottom:20px;padding-bottom:10px;border-bottom:2px solid #f1f5f9;">🚚 Delivery Details</h3>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
            <?php
            $fields = [
                ['min_order','Min Order','number','1'],
                ['min_order_unit','Min Order Unit','text','Piece'],
                ['delivery_days','Delivery Days','text','5-7 Days'],
                ['warranty','Warranty','text','Mfr. Terms'],
                ['certification','Certification','text','ISO • IBR'],
                ['ships_within','Ships Within Text','text','Ships within 24 hrs'],
                ['rating','Rating (0-5)','number','4.5'],
                ['orders_count','Orders Count Text','text','100+ Orders'],
            ];
            foreach($fields as $f):
            ?>
            <div>
                <label style="font-size:11px;font-weight:800;color:#64748b;display:block;margin-bottom:6px;text-transform:uppercase;"><?php echo $f[1]; ?></label>
                <input type="<?php echo $f[2]; ?>" name="<?php echo $f[0]; ?>" value="<?php echo htmlspecialchars($product[$f[0]]??$f[3]); ?>" step="<?php echo $f[2]==='number'?'0.1':''; ?>"
                       style="width:100%;padding:10px 14px;border:2px solid #e2e8f0;border-radius:10px;font-size:13px;font-weight:600;color:#1e293b;outline:none;box-sizing:border-box;">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div style="display:flex;flex-direction:column;gap:16px;">
    <div style="background:white;border-radius:16px;padding:24px;border:1.5px solid #e2e8f0;">
        <h3 style="font-size:14px;font-weight:800;color:#0a2463;margin-bottom:16px;">🏷️ Flags</h3>
        <div style="display:flex;flex-direction:column;gap:10px;">
            <label style="display:flex;align-items:center;gap:10px;cursor:pointer;padding:10px 14px;border:2px solid #e2e8f0;border-radius:10px;">
                <input type="checkbox" name="in_stock" value="1" <?php echo $product['in_stock']?'checked':''; ?> style="width:16px;height:16px;accent-color:#16a34a;">
                <div><div style="font-size:13px;font-weight:700;color:#1e293b;">In Stock</div><div style="font-size:11px;color:#94a3b8;">Green badge on product image</div></div>
            </label>
            <label style="display:flex;align-items:center;gap:10px;cursor:pointer;padding:10px 14px;border:2px solid #e2e8f0;border-radius:10px;">
                <input type="checkbox" name="best_price" value="1" <?php echo $product['best_price']?'checked':''; ?> style="width:16px;height:16px;accent-color:#b71c1c;">
                <div><div style="font-size:13px;font-weight:700;color:#1e293b;">Best Price</div><div style="font-size:11px;color:#94a3b8;">Red "Best Price ✓" badge</div></div>
            </label>
        </div>
        <div style="margin-top:12px;display:grid;gap:10px;">
            <div><label style="font-size:11px;font-weight:800;color:#64748b;display:block;margin-bottom:5px;text-transform:uppercase;">Stock Label</label>
            <input type="text" name="stock_label" value="<?php echo htmlspecialchars($product['stock_label']??'In Stock'); ?>" style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:13px;font-weight:600;outline:none;box-sizing:border-box;"></div>
            <div><label style="font-size:11px;font-weight:800;color:#64748b;display:block;margin-bottom:5px;text-transform:uppercase;">Badge Text</label>
            <input type="text" name="badge" placeholder="HOT, NEW, SALE, IBR..." value="<?php echo htmlspecialchars($product['badge']??''); ?>" style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:13px;font-weight:600;outline:none;box-sizing:border-box;"></div>
            <div><label style="font-size:11px;font-weight:800;color:#64748b;display:block;margin-bottom:5px;text-transform:uppercase;">Sort Order</label>
            <input type="number" name="sort_order" value="<?php echo $product['sort_order']??0; ?>" style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:13px;font-weight:600;outline:none;box-sizing:border-box;"></div>
        </div>
    </div>
    <button type="submit" style="width:100%;background:linear-gradient(135deg,#0a2463,#1a3a7a);color:white;padding:16px;border:none;border-radius:14px;font-size:15px;font-weight:800;cursor:pointer;">💾 Save Changes</button>
</div>
</div>
</form>

<script>
function showMainPreview(input) {
    if (!input.files || !input.files[0]) return;
    const file = input.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('mainPreviewImg').src = e.target.result;
        document.getElementById('mainPreviewName').textContent = file.name;
        document.getElementById('mainPreviewSize').textContent = (file.size/1024/1024).toFixed(2) + ' MB';
        document.getElementById('mainUploadUI').style.display = 'none';
        document.getElementById('mainPreviewBox').style.display = 'flex';
    };
    reader.readAsDataURL(file);
}
function clearMainPreview() {
    document.getElementById('mainImageFile').value = '';
    document.getElementById('mainPreviewBox').style.display = 'none';
    document.getElementById('mainUploadUI').style.display = 'block';
}
function handleMainDrop(event) {
    event.preventDefault();
    document.getElementById('mainUploadZone').style.borderColor = '#cbd5e1';
    document.getElementById('mainUploadZone').style.background = '#f8fafc';
    const files = event.dataTransfer.files;
    if (files.length > 0) {
        const input = document.getElementById('mainImageFile');
        const dt = new DataTransfer();
        dt.items.add(files[0]);
        input.files = dt.files;
        showMainPreview(input);
    }
}
</script>
<?php endif; ?>

<!-- ===== SPECS TAB ===== -->
<?php if($activeTab === 'specs'): ?>
<div style="display:grid;grid-template-columns:1fr 340px;gap:20px;align-items:start;">
<div style="background:white;border-radius:16px;border:1.5px solid #e2e8f0;overflow:hidden;">
    <div style="background:#f8fafc;padding:14px 18px;border-bottom:2px solid #e2e8f0;font-size:13px;font-weight:800;color:#0a2463;">📐 Specifications (<?php echo count($specs); ?>)</div>
    <?php if(empty($specs)): ?>
    <div style="padding:32px;text-align:center;color:#94a3b8;font-size:13px;">No specs yet. Add from the form →</div>
    <?php else: ?>
    <table style="width:100%;border-collapse:collapse;">
        <thead><tr style="background:#f8fafc;"><th style="padding:10px 14px;text-align:left;font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;">Key</th><th style="padding:10px 14px;text-align:left;font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;">Value</th><th style="padding:10px 14px;text-align:center;font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;">Sort</th><th></th></tr></thead>
        <tbody>
        <?php foreach($specs as $spec): ?>
        <tr style="border-top:1px solid #f1f5f9;">
            <td style="padding:12px 14px;font-size:12px;font-weight:700;color:#374151;"><?php echo htmlspecialchars($spec['spec_key']); ?></td>
            <td style="padding:12px 14px;font-size:12px;font-weight:600;color:#1e293b;"><?php echo htmlspecialchars($spec['spec_value']); ?></td>
            <td style="padding:12px 14px;text-align:center;font-size:12px;color:#94a3b8;"><?php echo $spec['sort_order']; ?></td>
            <td style="padding:12px 14px;"><a href="?id=<?php echo $id; ?>&tab=specs&del_spec=<?php echo $spec['id']; ?>" onclick="return confirm('Delete this spec?')" style="font-size:11px;font-weight:700;color:#b71c1c;text-decoration:none;background:#fef2f2;padding:4px 10px;border-radius:6px;">Del</a></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>
<div style="background:white;border-radius:16px;padding:20px;border:1.5px solid #e2e8f0;">
    <h4 style="font-size:13px;font-weight:800;color:#0a2463;margin-bottom:16px;">➕ Add Specification</h4>
    <form method="POST" style="display:flex;flex-direction:column;gap:12px;">
        <input type="hidden" name="action" value="add_spec">
        <div><label style="font-size:11px;font-weight:700;color:#64748b;display:block;margin-bottom:5px;">Key (e.g. MATERIAL)</label>
        <input type="text" name="spec_key" required placeholder="MATERIAL, SIZE, PRESSURE..." style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:13px;font-weight:600;outline:none;box-sizing:border-box;"></div>
        <div><label style="font-size:11px;font-weight:700;color:#64748b;display:block;margin-bottom:5px;">Value</label>
        <input type="text" name="spec_value" required placeholder="Cast Steel / WCB" style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:13px;font-weight:600;outline:none;box-sizing:border-box;"></div>
        <div><label style="font-size:11px;font-weight:700;color:#64748b;display:block;margin-bottom:5px;">Sort Order</label>
        <input type="number" name="spec_order" value="<?php echo count($specs); ?>" style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:13px;outline:none;box-sizing:border-box;"></div>
        <button type="submit" style="background:#0a2463;color:white;padding:10px;border:none;border-radius:8px;font-size:13px;font-weight:700;cursor:pointer;">Add Specification</button>
    </form>
    <div style="margin-top:14px;background:#eff6ff;border-radius:8px;padding:12px;font-size:11px;color:#1e40af;">
        <b>Common Keys:</b> MATERIAL, SIZE, PRESSURE, TEMPERATURE, END CONNECTION, STANDARD, BORE TYPE, BODY, TRIM, CERTIFICATION
    </div>
</div>
</div>
<?php endif; ?>

<!-- ===== FEATURES TAB ===== -->
<?php if($activeTab === 'features'): ?>
<div style="display:grid;grid-template-columns:1fr 340px;gap:20px;align-items:start;">
<div style="background:white;border-radius:16px;border:1.5px solid #e2e8f0;overflow:hidden;">
    <div style="background:#f8fafc;padding:14px 18px;border-bottom:2px solid #e2e8f0;font-size:13px;font-weight:800;color:#0a2463;">✅ Features (<?php echo count($features); ?>)</div>
    <?php if(empty($features)): ?>
    <div style="padding:32px;text-align:center;color:#94a3b8;font-size:13px;">No features yet.</div>
    <?php else: ?>
    <div style="padding:8px;">
    <?php foreach($features as $feat): ?>
    <div style="display:flex;align-items:center;justify-content:space-between;padding:10px 10px;border-bottom:1px solid #f1f5f9;">
        <span style="font-size:13px;color:#1e293b;font-weight:600;">✓ <?php echo htmlspecialchars($feat['feature']); ?></span>
        <a href="?id=<?php echo $id; ?>&tab=features&del_feat=<?php echo $feat['id']; ?>" onclick="return confirm('Delete?')" style="font-size:11px;font-weight:700;color:#b71c1c;text-decoration:none;background:#fef2f2;padding:4px 10px;border-radius:6px;flex-shrink:0;margin-left:10px;">Del</a>
    </div>
    <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
<div style="background:white;border-radius:16px;padding:20px;border:1.5px solid #e2e8f0;">
    <h4 style="font-size:13px;font-weight:800;color:#0a2463;margin-bottom:16px;">➕ Add Feature</h4>
    <form method="POST" style="display:flex;flex-direction:column;gap:12px;">
        <input type="hidden" name="action" value="add_feature">
        <div><label style="font-size:11px;font-weight:700;color:#64748b;display:block;margin-bottom:5px;">Feature Text</label>
        <textarea name="feature" required rows="3" placeholder="e.g. Full bore design for unrestricted flow" style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:13px;font-weight:600;outline:none;box-sizing:border-box;resize:vertical;"></textarea></div>
        <div><label style="font-size:11px;font-weight:700;color:#64748b;display:block;margin-bottom:5px;">Sort Order</label>
        <input type="number" name="feat_order" value="<?php echo count($features); ?>" style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:13px;outline:none;box-sizing:border-box;"></div>
        <button type="submit" style="background:#0a2463;color:white;padding:10px;border:none;border-radius:8px;font-size:13px;font-weight:700;cursor:pointer;">Add Feature</button>
    </form>
</div>
</div>
<?php endif; ?>

<!-- ===== APPLICATIONS TAB ===== -->
<?php if($activeTab === 'applications'): ?>
<div style="display:grid;grid-template-columns:1fr 340px;gap:20px;align-items:start;">
<div style="background:white;border-radius:16px;border:1.5px solid #e2e8f0;overflow:hidden;">
    <div style="background:#f8fafc;padding:14px 18px;border-bottom:2px solid #e2e8f0;font-size:13px;font-weight:800;color:#0a2463;">🏭 Applications (<?php echo count($applications); ?>)</div>
    <?php if(empty($applications)): ?>
    <div style="padding:32px;text-align:center;color:#94a3b8;font-size:13px;">No applications yet.</div>
    <?php else: ?>
    <div style="padding:8px;">
    <?php foreach($applications as $app): ?>
    <div style="display:flex;align-items:center;justify-content:space-between;padding:10px;border-bottom:1px solid #f1f5f9;">
        <span style="font-size:13px;color:#1e293b;font-weight:600;">● <?php echo htmlspecialchars($app['application']); ?></span>
        <a href="?id=<?php echo $id; ?>&tab=applications&del_app=<?php echo $app['id']; ?>" onclick="return confirm('Delete?')" style="font-size:11px;font-weight:700;color:#b71c1c;text-decoration:none;background:#fef2f2;padding:4px 10px;border-radius:6px;flex-shrink:0;margin-left:10px;">Del</a>
    </div>
    <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
<div style="background:white;border-radius:16px;padding:20px;border:1.5px solid #e2e8f0;">
    <h4 style="font-size:13px;font-weight:800;color:#0a2463;margin-bottom:16px;">➕ Add Application</h4>
    <form method="POST" style="display:flex;flex-direction:column;gap:12px;">
        <input type="hidden" name="action" value="add_app">
        <div><label style="font-size:11px;font-weight:700;color:#64748b;display:block;margin-bottom:5px;">Application</label>
        <textarea name="application" required rows="3" placeholder="e.g. Steam & Hot Water Lines, Power Plants" style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:13px;font-weight:600;outline:none;box-sizing:border-box;resize:vertical;"></textarea></div>
        <div><label style="font-size:11px;font-weight:700;color:#64748b;display:block;margin-bottom:5px;">Sort Order</label>
        <input type="number" name="app_order" value="<?php echo count($applications); ?>" style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:13px;outline:none;box-sizing:border-box;"></div>
        <button type="submit" style="background:#0a2463;color:white;padding:10px;border:none;border-radius:8px;font-size:13px;font-weight:700;cursor:pointer;">Add Application</button>
    </form>
</div>
</div>
<?php endif; ?>

<!-- ===== IMAGES TAB ===== -->
<?php if($activeTab === 'images'): ?>
<div style="display:grid;grid-template-columns:1fr 340px;gap:20px;align-items:start;">

<!-- Current gallery images -->
<div style="background:white;border-radius:16px;border:1.5px solid #e2e8f0;overflow:hidden;">
    <div style="background:#f8fafc;padding:14px 18px;border-bottom:2px solid #e2e8f0;font-size:13px;font-weight:800;color:#0a2463;">🖼️ Gallery Images (<?php echo count($images); ?>)</div>

    <!-- Main image (read only) -->
    <div style="padding:14px 18px;border-bottom:1px solid #f1f5f9;background:#f0fdf4;">
        <div style="font-size:10px;font-weight:700;color:#166534;margin-bottom:8px;text-transform:uppercase;letter-spacing:0.05em;">✅ Main Image (from product table  — change in basic tab)</div>
        <div style="display:flex;align-items:center;gap:10px;">
            <img src="../<?php echo htmlspecialchars(ltrim($product['image'],'./')); ?>"
                 style="width:56px;height:56px;object-fit:contain;border-radius:8px;border:1.5px solid #bbf7d0;padding:3px;background:white;">
            <div style="font-size:11px;color:#94a3b8;word-break:break-all;"><?php echo htmlspecialchars($product['image']); ?></div>
            <span style="margin-left:auto;flex-shrink:0;font-size:10px;font-weight:700;background:#bbf7d0;color:#166534;padding:2px 8px;border-radius:20px;">Default</span>
        </div>
    </div>

    <?php if(empty($images)): ?>
    <div style="padding:40px;text-align:center;color:#94a3b8;font-size:13px;">
        <div style="font-size:32px;margin-bottom:10px;">📭</div>
       no gallery images yet . Add form the form on the right ➕
    </div>
    <?php else: ?>
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));gap:12px;padding:16px;">
    <?php foreach($images as $idx => $img): ?>
    <div style="border:1.5px solid #e2e8f0;border-radius:10px;overflow:hidden;text-align:center;">
        <div style="position:relative;background:#f8fafc;height:110px;display:flex;align-items:center;justify-content:center;padding:8px;">
            <img src="../<?php echo htmlspecialchars($img['image_path']); ?>"
                 style="max-width:100%;max-height:100%;object-fit:contain;"
                 onerror="this.style.display='none'">
            <span style="position:absolute;top:6px;left:6px;background:#0a2463;color:white;font-size:9px;font-weight:800;padding:2px 6px;border-radius:4px;">#<?php echo $idx+1; ?></span>
        </div>
        <div style="padding:8px;">
            <div style="font-size:10px;color:#64748b;margin-bottom:6px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                <?php echo $img['alt_text'] ? htmlspecialchars(substr($img['alt_text'],0,18)) : '<span style="color:#cbd5e1;">No alt</span>'; ?>
            </div>
            <div style="font-size:9px;color:#94a3b8;margin-bottom:6px;">Sort: <?php echo $img['sort_order']; ?></div>
            <a href="?id=<?php echo $id; ?>&tab=images&del_img=<?php echo $img['id']; ?>"
               onclick="return confirm('Image delete karni hai bhai?')"
               style="display:block;font-size:11px;font-weight:700;color:#b71c1c;text-decoration:none;background:#fef2f2;padding:5px;border-radius:6px;border:1px solid #fca5a5;">
               🗑️ Delete
            </a>
        </div>
    </div>
    <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<!-- Upload Form -->
<div style="background:white;border-radius:16px;padding:20px;border:1.5px solid #e2e8f0;">
    <h4 style="font-size:13px;font-weight:800;color:#0a2463;margin-bottom:16px;">➕ add gallery image</h4>

    <form method="POST" enctype="multipart/form-data" style="display:flex;flex-direction:column;gap:14px;">
        <input type="hidden" name="action" value="add_image">

        <!-- UPLOAD ZONE -->
        <div id="galleryUploadZone" onclick="document.getElementById('galleryFileInput').click()"
             style="border:2px dashed #cbd5e1;border-radius:10px;padding:28px 16px;text-align:center;cursor:pointer;background:#f8fafc;transition:all 0.2s;"
             ondragover="event.preventDefault();this.style.borderColor='#0a2463';this.style.background='#eff6ff';"
             ondragleave="this.style.borderColor='#cbd5e1';this.style.background='#f8fafc';"
             ondrop="handleGalleryDrop(event)">

            <div id="galleryUploadUI">
                <div style="font-size:32px;margin-bottom:8px;">📁</div>
                <div style="font-size:13px;font-weight:700;color:#0a2463;margin-bottom:3px;">click or drag any images</div>
                <div style="font-size:11px;color:#94a3b8;">JPG, PNG, WEBP, GIF • Max 5MB</div>
            </div>

            <div id="galleryPreviewBox" style="display:none;flex-direction:column;align-items:center;gap:10px;">
                <img id="galleryPreviewImg" style="max-height:130px;max-width:100%;object-fit:contain;border-radius:8px;border:1.5px solid #e2e8f0;padding:8px;background:white;">
                <div style="display:flex;align-items:center;gap:6px;flex-wrap:wrap;justify-content:center;">
                    <span id="galleryPreviewName" style="font-size:11px;font-weight:700;color:#0a2463;"></span>
                    <span id="galleryPreviewSize" style="font-size:10px;color:#94a3b8;background:#f1f5f9;padding:2px 7px;border-radius:20px;"></span>
                </div>
                <button type="button" onclick="event.stopPropagation();clearGalleryPreview()"
                        style="font-size:11px;font-weight:700;color:#dc2626;border:1px solid #fca5a5;background:white;padding:4px 12px;border-radius:6px;cursor:pointer;">
                    ✕ Change Image
                </button>
            </div>

            <input type="file" id="galleryFileInput" name="image_file" accept="image/*" style="display:none;" onchange="showGalleryPreview(this)">
        </div>

        <!-- ALT TEXT -->
        <div>
            <label style="font-size:11px;font-weight:700;color:#64748b;display:block;margin-bottom:5px;text-transform:uppercase;">Alt Text (Optional)</label>
            <input type="text" name="alt_text" placeholder="e.g. Globe Valve Side View"
                   style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:13px;font-weight:600;outline:none;box-sizing:border-box;"
                   onfocus="this.style.borderColor='#0a2463'" onblur="this.style.borderColor='#e2e8f0'">
        </div>

        <!-- SORT ORDER -->
        <div>
            <label style="font-size:11px;font-weight:700;color:#64748b;display:block;margin-bottom:5px;text-transform:uppercase;">Sort Order</label>
            <input type="number" name="img_order" value="<?php echo count($images); ?>" min="0"
                   style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:13px;outline:none;box-sizing:border-box;"
                   onfocus="this.style.borderColor='#0a2463'" onblur="this.style.borderColor='#e2e8f0'">
        </div>

        <!-- SUBMIT -->
        <button type="submit" id="galleryUploadBtn"
                style="width:100%;background:#0a2463;color:white;border:none;border-radius:8px;padding:11px;font-size:13px;font-weight:800;cursor:pointer;opacity:0.45;pointer-events:none;"
                onmouseover="if(this.style.pointerEvents!='none')this.style.background='#1a3a7a'"
                onmouseout="if(this.style.pointerEvents!='none')this.style.background='#0a2463'">
            📤 Iupload the image
        </button>
    </form>

    <div style="margin-top:14px;background:#eff6ff;border-radius:8px;padding:10px 12px;font-size:11px;color:#1e40af;">
        <b>ℹ️ Note:</b> Gallery images appear in the thumbnails on the product detail page.. Sort order 0 = fisrt thumbnail.
    </div>
</div>

</div>

<script>
// Gallery image upload
function showGalleryPreview(input) {
    if (!input.files || !input.files[0]) return;
    const file = input.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('galleryPreviewImg').src = e.target.result;
        document.getElementById('galleryPreviewName').textContent = file.name;
        document.getElementById('galleryPreviewSize').textContent = (file.size/1024/1024).toFixed(2) + ' MB';
        document.getElementById('galleryUploadUI').style.display = 'none';
        document.getElementById('galleryPreviewBox').style.display = 'flex';
        const btn = document.getElementById('galleryUploadBtn');
        btn.style.opacity = '1';
        btn.style.pointerEvents = 'auto';
    };
    reader.readAsDataURL(file);
}
function clearGalleryPreview() {
    document.getElementById('galleryFileInput').value = '';
    document.getElementById('galleryPreviewBox').style.display = 'none';
    document.getElementById('galleryUploadUI').style.display = 'block';
    const btn = document.getElementById('galleryUploadBtn');
    btn.style.opacity = '0.45';
    btn.style.pointerEvents = 'none';
}
function handleGalleryDrop(event) {
    event.preventDefault();
    document.getElementById('galleryUploadZone').style.borderColor = '#cbd5e1';
    document.getElementById('galleryUploadZone').style.background = '#f8fafc';
    const files = event.dataTransfer.files;
    if (files.length > 0) {
        const input = document.getElementById('galleryFileInput');
        const dt = new DataTransfer();
        dt.items.add(files[0]);
        input.files = dt.files;
        showGalleryPreview(input);
    }
}
</script>
<?php endif; ?>

<!-- ===== OFFERS TAB ===== -->
<?php if($activeTab === 'offers'): ?>
<div style="display:grid;grid-template-columns:1fr 360px;gap:20px;align-items:start;">
<div style="background:white;border-radius:16px;border:1.5px solid #e2e8f0;overflow:hidden;">
    <div style="background:#f8fafc;padding:14px 18px;border-bottom:2px solid #e2e8f0;font-size:13px;font-weight:800;color:#0a2463;">🏷️ Offers (<?php echo count($offers); ?>)</div>
    <?php if(empty($offers)): ?>
    <div style="padding:32px;text-align:center;color:#94a3b8;font-size:13px;">No offers yet.</div>
    <?php else: ?>
    <div style="padding:12px;display:flex;flex-direction:column;gap:10px;">
    <?php foreach($offers as $offer): ?>
    <div style="background:#fff7ed;border:1.5px solid #fed7aa;border-radius:10px;padding:12px;display:flex;align-items:flex-start;justify-content:space-between;gap:10px;">
        <div>
            <div style="font-size:14px;font-weight:800;"><?php echo htmlspecialchars($offer['icon']); ?> <?php echo htmlspecialchars($offer['offer_text']); ?></div>
            <?php if($offer['valid_note']): ?><div style="font-size:11px;color:#9a3412;margin-top:4px;"><?php echo htmlspecialchars($offer['valid_note']); ?></div><?php endif; ?>
        </div>
        <a href="?id=<?php echo $id; ?>&tab=offers&del_offer=<?php echo $offer['id']; ?>" onclick="return confirm('Delete offer?')" style="font-size:11px;font-weight:700;color:#b71c1c;text-decoration:none;background:#fef2f2;padding:4px 10px;border-radius:6px;flex-shrink:0;">Del</a>
    </div>
    <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
<div style="background:white;border-radius:16px;padding:20px;border:1.5px solid #e2e8f0;">
    <h4 style="font-size:13px;font-weight:800;color:#0a2463;margin-bottom:16px;">➕ Add Offer</h4>
    <form method="POST" style="display:flex;flex-direction:column;gap:12px;">
        <input type="hidden" name="action" value="add_offer">
        <div><label style="font-size:11px;font-weight:700;color:#64748b;display:block;margin-bottom:5px;">Icon/Emoji</label>
        <input type="text" name="icon" value="🏷" style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:16px;outline:none;box-sizing:border-box;"></div>
        <div><label style="font-size:11px;font-weight:700;color:#64748b;display:block;margin-bottom:5px;">Offer Text</label>
        <textarea name="offer_text" required rows="2" placeholder="e.g. Buy any IBR valve & get free gasket kit worth ₹200" style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:13px;font-weight:600;outline:none;box-sizing:border-box;resize:vertical;"></textarea></div>
        <div><label style="font-size:11px;font-weight:700;color:#64748b;display:block;margin-bottom:5px;">Valid Note (optional)</label>
        <input type="text" name="valid_note" placeholder="e.g. Valid till 31st Dec 2024" style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:13px;font-weight:600;outline:none;box-sizing:border-box;"></div>
        <div><label style="font-size:11px;font-weight:700;color:#64748b;display:block;margin-bottom:5px;">Sort Order</label>
        <input type="number" name="offer_order" value="<?php echo count($offers); ?>" style="width:100%;padding:9px 12px;border:2px solid #e2e8f0;border-radius:8px;font-size:13px;outline:none;box-sizing:border-box;"></div>
        <button type="submit" style="background:#f97316;color:white;padding:10px;border:none;border-radius:8px;font-size:13px;font-weight:700;cursor:pointer;">Add Offer</button>
    </form>
</div>
</div>
<?php endif; ?>

</div>
<?php include 'footer.php'; ?>