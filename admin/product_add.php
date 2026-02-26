<?php
require_once 'auth.php';
require_once '../assets/include/config.php';
$conn = getConn();

$pageTitle    = 'Add New Product';
$pageSubtitle = 'Create a new product listing';
$activePage   = 'product_add';

$error   = '';
$success = '';

function generateSlug($name) {
    $slug = strtolower(trim($name));
    $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
    $slug = preg_replace('/[\s-]+/', '-', $slug);
    $slug = trim($slug, '-');
    return $slug;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name           = trim($_POST['name'] ?? '');
    $slug           = trim($_POST['slug'] ?? '');
    $subtitle       = trim($_POST['subtitle'] ?? '');
    $category       = trim($_POST['category'] ?? '');
    $description    = trim($_POST['description'] ?? '');
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

    if (!$slug) $slug = generateSlug($name);

    // ─── Handle image upload ───────────────────────────────────────────────
    $image = '';
    if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../assets/images/products/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $tmpName  = $_FILES['image_file']['tmp_name'];
        $origName = basename($_FILES['image_file']['name']);
        $ext      = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
        $allowed  = ['jpg','jpeg','png','webp','gif'];

        if (!in_array($ext, $allowed)) {
            $error = 'Only JPG, PNG, WEBP, GIF images allowed!';
        } else {
            // Create clean filename from product name
            $safeBase = generateSlug($name) ?: 'product-' . time();
            $fileName = $safeBase . '-' . time() . '.' . $ext;
            $destPath = $uploadDir . $fileName;

            if (move_uploaded_file($tmpName, $destPath)) {
                $image = './assets/images/products/' . $fileName;
            } else {
                $error = 'Failed to move uploaded file. Check folder permissions.';
            }
        }
    } else {
        $error = 'Please select a product image!';
    }

    // ─── Validate & Insert ────────────────────────────────────────────────
    if (!$error) {
        if (!$name || !$category) {
            $error = 'Product Name and Category are required!';
        } else {
            // Slug uniqueness
            $chk = $conn->prepare("SELECT id FROM products WHERE slug=?");
            $chk->bind_param("s", $slug);
            $chk->execute();
            if ($chk->get_result()->num_rows > 0) {
                $slug = $slug . '-' . time();
            }

            $stmt = $conn->prepare("INSERT INTO products
                (name, slug, subtitle, category, description, image,
                 price_min, price_max, mrp, gst_percent,
                 in_stock, stock_label, best_price,
                 min_order, min_order_unit, delivery_days,
                 warranty, certification, ships_within,
                 rating, orders_count, badge, sort_order, is_active)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1)");

           $stmt->bind_param("ssssssddddisiisssssdssi",
    $name, $slug, $subtitle, $category, $description, $image,
    $price_min, $price_max, $mrp, $gst_percent,
    $in_stock, $stock_label, $best_price,
    $min_order, $min_order_unit, $delivery_days,
    $warranty, $certification, $ships_within,
    $rating, $orders_count, $badge, $sort_order
);

            if ($stmt->execute()) {
                $newId = $conn->insert_id;
                header("Location: product_edit.php?id=$newId&msg=added");
                exit;
            } else {
                $error = 'Database error: ' . $conn->error;
            }
        }
    }
}

include 'header.php';
?>

<style>
/* ── Responsive base ── */
*{box-sizing:border-box;}
.pa-wrap{padding:16px;}
.pa-grid{display:grid;grid-template-columns:1fr 360px;gap:20px;align-items:start;}
.pa-col{display:flex;flex-direction:column;gap:16px;}
.pa-card{background:#fff;border-radius:16px;padding:22px;border:1.5px solid #e2e8f0;}
.pa-card h3{font-size:14px;font-weight:800;color:#0a2463;margin:0 0 18px;padding-bottom:10px;border-bottom:2px solid #f1f5f9;}
.pa-2col{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
.field{display:flex;flex-direction:column;gap:5px;}
.field label{font-size:11px;font-weight:800;color:#64748b;text-transform:uppercase;letter-spacing:.5px;}
.field input,.field select,.field textarea{
    width:100%;padding:10px 14px;border:2px solid #e2e8f0;border-radius:10px;
    font-size:13px;font-weight:600;color:#1e293b;outline:none;
    transition:border-color .2s;}
.field input:focus,.field select:focus,.field textarea:focus{border-color:#0a2463;}
.field textarea{resize:vertical;}
.field small{font-size:10px;color:#94a3b8;margin-top:2px;}

/* ── Image upload zone ── */
.upload-zone{
    position:relative;border:2.5px dashed #cbd5e1;border-radius:12px;
    padding:28px 16px;text-align:center;cursor:pointer;
    background:#f8fafc;transition:all .2s;}
.upload-zone:hover,.upload-zone.drag{border-color:#0a2463;background:#eff6ff;}
.upload-zone input[type=file]{
    position:absolute;inset:0;opacity:0;cursor:pointer;width:100%;height:100%;}
.upload-zone .uz-icon{font-size:36px;margin-bottom:8px;}
.upload-zone .uz-title{font-size:13px;font-weight:700;color:#374151;}
.upload-zone .uz-sub{font-size:11px;color:#94a3b8;margin-top:4px;}
#imgPreviewWrap{display:none;margin-top:12px;background:#f1f5f9;border-radius:10px;padding:12px;text-align:center;}
#imgPreviewWrap img{max-height:120px;max-width:100%;object-fit:contain;border-radius:8px;}
#imgPreviewWrap .img-name{font-size:11px;color:#64748b;margin-top:6px;font-weight:600;}
#imgPreviewWrap .img-change{font-size:11px;color:#b71c1c;font-weight:700;cursor:pointer;margin-top:4px;display:inline-block;}

/* ── Checkbox card ── */
.chk-card{display:flex;align-items:center;gap:10px;padding:10px 14px;border:2px solid #e2e8f0;border-radius:10px;cursor:pointer;}
.chk-card input{width:16px;height:16px;flex-shrink:0;}
.chk-card .chk-title{font-size:13px;font-weight:700;color:#1e293b;}
.chk-card .chk-sub{font-size:11px;color:#94a3b8;}

/* ── Buttons ── */
.btn-save{
    width:100%;background:linear-gradient(135deg,#0a2463,#1a3a7a);
    color:#fff;padding:16px;border:none;border-radius:14px;
    font-size:15px;font-weight:800;cursor:pointer;
    display:flex;align-items:center;justify-content:center;gap:8px;
    box-shadow:0 4px 16px rgba(10,36,99,.3);transition:opacity .2s;}
.btn-save:hover{opacity:.9;}
.btn-cancel{display:block;text-align:center;padding:12px;background:#f1f5f9;color:#64748b;border-radius:12px;font-size:13px;font-weight:700;text-decoration:none;}

/* ── Info box ── */
.info-box{background:#eff6ff;border:1.5px solid #bfdbfe;border-radius:16px;padding:20px;}
.info-box h4{font-size:13px;font-weight:800;color:#0a2463;margin:0 0 8px;}
.info-box p{font-size:12px;color:#1e40af;line-height:1.6;margin:0 0 8px;}
.info-box ul{font-size:12px;color:#1e40af;margin:0;padding-left:16px;line-height:1.9;}

/* ── Alert ── */
.alert-err{background:#fef2f2;border:1.5px solid #fca5a5;color:#b71c1c;padding:12px 16px;border-radius:10px;margin-bottom:16px;font-size:13px;font-weight:700;}

/* ── Responsive ── */
@media(max-width:900px){
    .pa-grid{grid-template-columns:1fr;}
    .pa-2col{grid-template-columns:1fr 1fr;}
}
@media(max-width:520px){
    .pa-wrap{padding:10px;}
    .pa-2col{grid-template-columns:1fr;}
    .pa-card{padding:14px;}
    .btn-save{font-size:14px;padding:13px;}
}
</style>

<div class="pa-wrap">

<?php if($error): ?>
<div class="alert-err">❌ <?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
<div class="pa-grid">

<!-- ═══════════════ LEFT COLUMN ═══════════════ -->
<div class="pa-col">

    <!-- Basic Info -->
    <div class="pa-card">
        <h3>📋 Basic Information</h3>
        <div style="display:flex;flex-direction:column;gap:14px;">
            <div class="field">
                <label>Product Name *</label>
                <input type="text" name="name" id="nameInput" required placeholder="e.g. Cast Steel IBR Globe Valve"
                       value="<?php echo htmlspecialchars($_POST['name']??''); ?>"
                       oninput="autoSlug(this.value)">
            </div>
            <div class="field">
                <label>URL Slug</label>
                <input type="text" name="slug" id="slugInput" placeholder="auto-generated"
                       value="<?php echo htmlspecialchars($_POST['slug']??''); ?>"
                       style="background:#f8fafc;color:#64748b;">
                <small>Auto-generated from name. URL: product_details.php?slug=<b>your-slug</b></small>
            </div>
            <div class="field">
                <label>Subtitle</label>
                <input type="text" name="subtitle" placeholder="e.g. Class 300 • Bolted Bonnet"
                       value="<?php echo htmlspecialchars($_POST['subtitle']??''); ?>">
            </div>
            <div class="field">
                <label>Category *</label>
                <select name="category" required>
                    <option value="">-- Select Category --</option>
                    <option value="Gate / Globe Valves" <?php echo (($_POST['category']??'')==='Gate / Globe Valves')?'selected':''; ?>>Gate / Globe Valves</option>
                    <option value="Ball / Check Valves" <?php echo (($_POST['category']??'')==='Ball / Check Valves')?'selected':''; ?>>Ball / Check Valves</option>
                    <option value="Pipes & Fittings" <?php echo (($_POST['category']??'')==='Pipes & Fittings')?'selected':''; ?>>Pipes & Fittings</option>
                </select>
            </div>
            <div class="field">
                <label>Description</label>
                <textarea name="description" rows="4" placeholder="Detailed product description..."><?php echo htmlspecialchars($_POST['description']??''); ?></textarea>
            </div>
        </div>
    </div>

    <!-- Image Upload -->
    <div class="pa-card">
        <h3>🖼️ Product Image</h3>
        <div class="upload-zone" id="uploadZone">
            <input type="file" name="image_file" id="imageFileInput" accept="image/jpeg,image/png,image/webp,image/gif" required onchange="handleFileSelect(this)">
            <div class="uz-icon">📤</div>
            <div class="uz-title">Click to choose image or drag & drop</div>
            <div class="uz-sub">JPG, PNG, WEBP, GIF • Max 5MB<br>Saved to: <b>assets/images/products/</b></div>
        </div>
        <div id="imgPreviewWrap">
            <img id="imgPreviewEl" src="" alt="Preview">
            <div class="img-name" id="imgFileName"></div>
            <span class="img-change" onclick="changeImage()">✕ Change image</span>
        </div>
    </div>

    <!-- Pricing -->
    <div class="pa-card">
        <h3>💰 Pricing</h3>
        <div class="pa-2col">
            <div class="field">
                <label>Min Price (₹) *</label>
                <input type="number" name="price_min" required min="0" step="0.01" placeholder="7845"
                       value="<?php echo htmlspecialchars($_POST['price_min']??''); ?>"
                       style="color:#b71c1c;font-weight:700;">
            </div>
            <div class="field">
                <label>Max Price (₹)</label>
                <input type="number" name="price_max" min="0" step="0.01" placeholder="0"
                       value="<?php echo htmlspecialchars($_POST['price_max']??''); ?>"
                       style="color:#b71c1c;font-weight:700;">
            </div>
            <div class="field">
                <label>MRP (₹)</label>
                <input type="number" name="mrp" min="0" step="0.01" placeholder="0 = auto +17%"
                       value="<?php echo htmlspecialchars($_POST['mrp']??''); ?>">
            </div>
            <div class="field">
                <label>GST %</label>
                <input type="number" name="gst_percent" min="0" max="100" step="0.01" placeholder="18"
                       value="<?php echo htmlspecialchars($_POST['gst_percent']??'18'); ?>">
            </div>
        </div>
    </div>

    <!-- Delivery -->
    <div class="pa-card">
        <h3>🚚 Delivery & Details</h3>
        <div class="pa-2col">
            <div class="field">
                <label>Min Order</label>
                <input type="number" name="min_order" min="1" value="<?php echo htmlspecialchars($_POST['min_order']??'1'); ?>">
            </div>
            <div class="field">
                <label>Min Order Unit</label>
                <input type="text" name="min_order_unit" placeholder="Piece" value="<?php echo htmlspecialchars($_POST['min_order_unit']??'Piece'); ?>">
            </div>
            <div class="field">
                <label>Delivery Days</label>
                <input type="text" name="delivery_days" value="<?php echo htmlspecialchars($_POST['delivery_days']??'5-7 Days'); ?>">
            </div>
            <div class="field">
                <label>Warranty</label>
                <input type="text" name="warranty" value="<?php echo htmlspecialchars($_POST['warranty']??'Mfr. Terms'); ?>">
            </div>
            <div class="field">
                <label>Certification</label>
                <input type="text" name="certification" value="<?php echo htmlspecialchars($_POST['certification']??'ISO • IBR'); ?>">
            </div>
            <div class="field">
                <label>Ships Within Text</label>
                <input type="text" name="ships_within" value="<?php echo htmlspecialchars($_POST['ships_within']??'Ships within 24 hrs'); ?>">
            </div>
            <div class="field">
                <label>Rating (0–5)</label>
                <input type="number" name="rating" min="0" max="5" step="0.1" value="<?php echo htmlspecialchars($_POST['rating']??'4.5'); ?>">
            </div>
            <div class="field">
                <label>Orders Count Text</label>
                <input type="text" name="orders_count" value="<?php echo htmlspecialchars($_POST['orders_count']??'100+ Orders'); ?>">
            </div>
        </div>
    </div>

</div><!-- /left col -->

<!-- ═══════════════ RIGHT COLUMN ═══════════════ -->
<div class="pa-col">

    <!-- Flags & Badges -->
    <div class="pa-card">
        <h3>🏷️ Flags & Badges</h3>
        <div style="display:flex;flex-direction:column;gap:10px;">
            <label class="chk-card">
                <input type="checkbox" name="in_stock" value="1" <?php echo (($_POST['in_stock']??1)==1)?'checked':''; ?> style="accent-color:#16a34a;">
                <div>
                    <div class="chk-title">✅ In Stock</div>
                    <div class="chk-sub">Green badge on product image</div>
                </div>
            </label>
            <label class="chk-card">
                <input type="checkbox" name="best_price" value="1" <?php echo (($_POST['best_price']??1)==1)?'checked':''; ?> style="accent-color:#b71c1c;">
                <div>
                    <div class="chk-title">🔴 Best Price</div>
                    <div class="chk-sub">Red "Best Price ✓" badge</div>
                </div>
            </label>
        </div>
        <div style="display:flex;flex-direction:column;gap:12px;margin-top:14px;">
            <div class="field">
                <label>Stock Label Text</label>
                <input type="text" name="stock_label" value="<?php echo htmlspecialchars($_POST['stock_label']??'In Stock'); ?>">
            </div>
            <div class="field">
                <label>Badge Text (optional)</label>
                <input type="text" name="badge" placeholder="HOT, NEW, SALE..." value="<?php echo htmlspecialchars($_POST['badge']??''); ?>">
            </div>
        </div>
    </div>

    <!-- Sort Order -->
    <div class="pa-card">
        <h3>🔢 Sort Order</h3>
        <div class="field">
            <input type="number" name="sort_order" min="0" value="<?php echo htmlspecialchars($_POST['sort_order']??'0'); ?>">
            <small>Lower = appears first. 0 = default.</small>
        </div>
    </div>

    <!-- Info Box -->
    <div class="info-box">
        <h4>ℹ️ After Saving</h4>
        <p>You'll be taken to the <b>Edit page</b> to add:</p>
        <ul>
            <li>📐 Specifications</li>
            <li>✅ Key Features</li>
            <li>🏭 Applications</li>
            <li>🖼️ Extra Images</li>
            <li>🏷️ Special Offers</li>
        </ul>
    </div>

    <!-- Submit -->
    <button type="submit" class="btn-save">
        <svg style="width:18px;height:18px" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        Save Product & Continue
    </button>
    <a href="products.php" class="btn-cancel">Cancel</a>

</div><!-- /right col -->

</div>
</form>
</div>

<script>
// ── Slug auto-generate ──────────────────────────────────────────────
function generateSlug(name) {
    return name.toLowerCase().trim()
        .replace(/[^a-z0-9\s-]/g, '')
        .replace(/[\s-]+/g, '-')
        .replace(/^-+|-+$/g, '');
}
function autoSlug(val) {
    var s = document.getElementById('slugInput');
    if (!s.dataset.manual) s.value = generateSlug(val);
}
document.getElementById('slugInput').addEventListener('input', function() {
    this.dataset.manual = 'true';
});

// ── Image upload / preview ──────────────────────────────────────────
function handleFileSelect(input) {
    var file = input.files[0];
    if (!file) return;
    var zone = document.getElementById('uploadZone');
    var wrap = document.getElementById('imgPreviewWrap');
    var img  = document.getElementById('imgPreviewEl');
    var name = document.getElementById('imgFileName');

    var reader = new FileReader();
    reader.onload = function(e) {
        img.src = e.target.result;
        name.textContent = file.name + ' (' + (file.size/1024).toFixed(1) + ' KB)';
        zone.style.display = 'none';
        wrap.style.display = 'block';
    };
    reader.readAsDataURL(file);
}

function changeImage() {
    document.getElementById('uploadZone').style.display = 'block';
    document.getElementById('imgPreviewWrap').style.display = 'none';
    document.getElementById('imageFileInput').value = '';
}

// ── Drag & drop ─────────────────────────────────────────────────────
var zone = document.getElementById('uploadZone');
zone.addEventListener('dragover', function(e){ e.preventDefault(); this.classList.add('drag'); });
zone.addEventListener('dragleave', function(){ this.classList.remove('drag'); });
zone.addEventListener('drop', function(e){
    e.preventDefault();
    this.classList.remove('drag');
    var files = e.dataTransfer.files;
    if (files.length) {
        document.getElementById('imageFileInput').files = files;
        handleFileSelect(document.getElementById('imageFileInput'));
    }
});
</script>

<?php include 'footer.php'; ?>