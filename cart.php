<?php
// ============================================================
// product_details.php - Backend se product data fetch karo
// URL: product_details.php?slug=bronze-ibr-globe-steam-stop-valve
//      product_details.php?id=1
// ============================================================

require_once 'assets/include/config.php';

$conn = getConn();

// --- Slug ya ID se product fetch karo ---
$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';
$id   = isset($_GET['id'])   ? (int)$_GET['id']   : 0;

$product = null;

if ($slug) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE slug = ? AND is_active = 1 LIMIT 1");
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    $product = $stmt->get_result()->fetch_assoc();
} elseif ($id) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ? AND is_active = 1 LIMIT 1");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $product = $stmt->get_result()->fetch_assoc();
}

// Agar product nahi mila toh pehla product lo (default)
if (!$product) {
    $result  = $conn->query("SELECT * FROM products WHERE is_active = 1 ORDER BY sort_order LIMIT 1");
    $product = $result->fetch_assoc();
}

// Agar DB empty hai toh redirect
if (!$product) {
    die('<div style="padding:40px;text-align:center;font-family:sans-serif;">
        <h2>Database empty hai bhai!</h2>
        <p>phpMyAdmin mein <b>itc_db.sql</b> import karo pehle.</p>
    </div>');
}

$pid = $product['id'];

// --- Specifications ---
$specs = [];
$s = $conn->prepare("SELECT spec_key, spec_value FROM product_specifications WHERE product_id = ? ORDER BY sort_order");
$s->bind_param("i", $pid);
$s->execute();
$sResult = $s->get_result();
while ($row = $sResult->fetch_assoc()) $specs[] = $row;

// --- Features ---
$features = [];
$f = $conn->prepare("SELECT feature FROM product_features WHERE product_id = ? ORDER BY sort_order");
$f->bind_param("i", $pid);
$f->execute();
$fResult = $f->get_result();
while ($row = $fResult->fetch_assoc()) $features[] = $row['feature'];

// --- Applications ---
$applications = [];
$a = $conn->prepare("SELECT application FROM product_applications WHERE product_id = ? ORDER BY sort_order");
$a->bind_param("i", $pid);
$a->execute();
$aResult = $a->get_result();
while ($row = $aResult->fetch_assoc()) $applications[] = $row['application'];

// --- Offers ---
$offers = [];
$o = $conn->prepare("
    SELECT icon, offer_text, valid_note FROM product_offers
    WHERE (product_id = ? OR (product_id IS NULL AND category = ?))
      AND is_active = 1
    ORDER BY sort_order
");
$o->bind_param("is", $pid, $product['category']);
$o->execute();
$oResult = $o->get_result();
while ($row = $oResult->fetch_assoc()) $offers[] = $row;

// --- Product Images ---
$images = [];
$i = $conn->prepare("SELECT image_path, alt_text FROM product_images WHERE product_id = ? ORDER BY sort_order");
$i->bind_param("i", $pid);
$i->execute();
$iResult = $i->get_result();
while ($row = $iResult->fetch_assoc()) $images[] = $row;
if (empty($images)) $images[] = ['image_path' => $product['image'], 'alt_text' => $product['name']];

// --- Related Products ---
$related = [];
$r = $conn->prepare("
    SELECT id, name, slug, subtitle, image, price_min, price_max
    FROM products WHERE category = ? AND id != ? AND is_active = 1
    ORDER BY sort_order LIMIT 6
");
$r->bind_param("si", $product['category'], $pid);
$r->execute();
$rResult = $r->get_result();
while ($row = $rResult->fetch_assoc()) $related[] = $row;

// --- All products for recommended section ---
$allProducts = [];
$ap = $conn->query("SELECT id, name, slug, subtitle, image, price_min, price_max, category FROM products WHERE is_active = 1 ORDER BY sort_order LIMIT 12");
while ($row = $ap->fetch_assoc()) $allProducts[] = $row;

// --- Price formatting helper ---
function formatINR($price) {
    return '₹' . number_format($price, 0, '.', ',');
}

$priceDisplay = $product['price_max'] > 0
    ? formatINR($product['price_min']) . ' - ' . formatINR($product['price_max'])
    : formatINR($product['price_min']);

$mrpDisplay = $product['mrp'] > 0 ? $product['mrp'] : round($product['price_min'] * 1.17);
$savings    = $mrpDisplay - $product['price_min'];

// Pass data to JS as JSON
$productJSON     = json_encode($product,      JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT);
$specsJSON       = json_encode($specs,         JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT);
$featuresJSON    = json_encode($features,      JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT);
$applicationsJSON= json_encode($applications,  JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT);
$offersJSON      = json_encode($offers,        JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT);
$imagesJSON      = json_encode($images,        JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT);
$relatedJSON     = json_encode($related,       JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT);
$allProductsJSON = json_encode($allProducts,   JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name']) ?> - Indian Traders Corp</title>
    <meta name="description" content="<?= htmlspecialchars(substr($product['description'] ?? '', 0, 160)) ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { colors: { primary: '#b71c1c', secondary: '#0a2463' } } }
        }
    </script>
    <style>
        /* ===== FLOATING CART BUTTON (Mobile only) ===== */
        #floatingCartBtn {
            position:fixed; bottom:90px; right:20px; z-index:50;
            display:flex; align-items:center; gap:8px;
            background:linear-gradient(135deg,#b71c1c,#c62828); color:white;
            font-weight:700; padding:12px 18px; border-radius:50px;
            box-shadow:0 8px 32px rgba(183,28,28,0.4);
            transition:transform 0.2s,box-shadow 0.2s; border:none; cursor:pointer;
        }
        @media(min-width:1024px){ #floatingCartBtn{ display:none !important; } }
        #floatingCartBtn:hover{ transform:scale(1.06); }
        .cart-badge{ background:white; color:#b71c1c; border-radius:50px; padding:2px 8px; font-size:12px; font-weight:800; }
        /* ===== HEADER CART BTN ===== */
        #headerCartBtn{
            display:flex; align-items:center; gap:8px;
            background:linear-gradient(135deg,#b71c1c,#c62828); color:white;
            font-weight:700; padding:10px 18px; border-radius:50px;
            box-shadow:0 4px 16px rgba(183,28,28,0.35);
            border:none; cursor:pointer; font-size:14px; white-space:nowrap;
        }
        #headerCartBtn:hover{ transform:scale(1.04); }
        .hcart-badge{ background:white; color:#b71c1c; border-radius:50px; padding:1px 8px; font-size:12px; font-weight:800; }
        /* ===== MOBILE ACTION BAR ===== */
        #mobileActionBar{
            display:none; position:fixed; bottom:0; left:0; right:0; z-index:60;
            background:white; border-top:2px solid #e2e8f0; padding:10px 16px;
            gap:10px; box-shadow:0 -4px 20px rgba(0,0,0,0.12);
        }
        @media(max-width:1023px){ #mobileActionBar{ display:flex; } body{ padding-bottom:80px; } }
        .mob-btn-cart{ flex:1; background:#16a34a; color:white; font-weight:800; font-size:14px; padding:9px 12px; border-radius:12px; border:none; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:7px; }
        .mob-btn-quote{ flex:1; background:#0a2463; color:white; font-weight:800; font-size:14px; padding:9px 12px; border-radius:12px; border:none; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:7px; }
        /* ===== CHECKOUT MODAL ===== */
        #checkoutModal{ display:none; position:fixed; inset:0; background:rgba(0,0,0,0.65); backdrop-filter:blur(4px); z-index:100; overflow-y:auto; }
        #checkoutModal.open{ display:flex; align-items:flex-end; justify-content:center; }
        @media(min-width:640px){ #checkoutModal.open{ align-items:center; } }
        .modal-sheet{ background:white; width:100%; max-width:600px; border-radius:24px 24px 0 0; overflow:hidden; max-height:92vh; display:flex; flex-direction:column; }
        @media(min-width:640px){ .modal-sheet{ border-radius:20px; max-height:85vh; margin:16px; } }
        .modal-header{ background:linear-gradient(135deg,#0a2463,#1a3a7a); color:white; padding:20px 24px; display:flex; align-items:center; justify-content:space-between; }
        .modal-close-btn{ background:rgba(255,255,255,0.15); border:none; color:white; width:36px; height:36px; border-radius:50%; font-size:20px; cursor:pointer; display:flex; align-items:center; justify-content:center; }
        .cart-items-area{ flex:1; overflow-y:auto; padding:16px; }
        .cart-item-card{ display:flex; align-items:flex-start; gap:12px; background:#f8faff; border:1.5px solid #e2e8f0; border-radius:14px; padding:14px; margin-bottom:12px; }
        .cart-item-img{ width:72px; height:72px; min-width:72px; object-fit:contain; background:white; border-radius:10px; padding:6px; border:1px solid #e2e8f0; }
        .cart-item-name{ font-weight:700; font-size:14px; color:#0a2463; line-height:1.3; margin-bottom:4px; }
        .cart-item-subtitle{ font-size:12px; color:#64748b; margin-bottom:6px; }
        .cart-item-unit{ font-size:12px; color:#94a3b8; }
        .cart-item-right{ display:flex; flex-direction:column; align-items:flex-end; justify-content:space-between; gap:8px; flex-shrink:0; min-width:80px; }
        .cart-item-price{ font-size:16px; font-weight:800; color:#b71c1c; }
        .cart-item-remove{ background:none; border:1px solid #fca5a5; color:#dc2626; font-size:11px; font-weight:700; padding:4px 10px; border-radius:6px; cursor:pointer; }
        .cart-item-remove:hover{ background:#dc2626; color:white; }
        .empty-cart{ padding:48px 24px; text-align:center; color:#94a3b8; }
        .cart-summary{ border-top:2px solid #e2e8f0; padding:16px 20px; background:linear-gradient(135deg,#f8faff,#eef2ff); }
        .cart-action-btns{ display:flex; gap:10px; margin-top:14px; }
        .btn-whatsapp{ flex:1; background:linear-gradient(135deg,#16a34a,#15803d); color:white; font-weight:700; font-size:15px; padding:14px 16px; border-radius:12px; border:none; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:8px; }
        .btn-clear{ background:linear-gradient(135deg,#dc2626,#b91c1c); color:white; font-weight:700; font-size:14px; padding:14px 18px; border-radius:12px; border:none; cursor:pointer; display:flex; align-items:center; justify-content:center; }
        /* ===== SUCCESS NOTIF ===== */
        #successNotification{ position:fixed; top:80px; right:16px; background:#16a34a; color:white; padding:14px 20px; border-radius:12px; box-shadow:0 8px 32px rgba(0,0,0,0.15); z-index:200; transform:translateX(calc(100% + 32px)); opacity:0; transition:transform 0.35s cubic-bezier(0.34,1.56,0.64,1),opacity 0.35s; display:flex; align-items:center; gap:10px; font-weight:700; font-size:14px; }
        #successNotification.show{ transform:translateX(0); opacity:1; }
        .drag-handle{ width:40px; height:4px; background:#cbd5e1; border-radius:2px; margin:10px auto 0; }
        @media(min-width:640px){ .drag-handle{ display:none; } }
        /* ===== OFFERS MODAL ===== */
        #offersModal{ display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); backdrop-filter:blur(4px); z-index:150; align-items:center; justify-content:center; padding:16px; }
        #offersModal.open{ display:flex; }
        .offers-sheet{ background:white; border-radius:16px; max-width:480px; width:100%; overflow:hidden; box-shadow:0 20px 60px rgba(0,0,0,0.25); }
        /* ===== IMAGE LIGHTBOX ===== */
        #imageLightbox{ display:none; position:fixed; inset:0; background:rgba(0,0,0,0.92); backdrop-filter:blur(8px); z-index:300; align-items:center; justify-content:center; }
        #imageLightbox.open{ display:flex; }
        #lightboxImg{ max-width:85vw; max-height:85vh; object-fit:contain; border-radius:12px; background:white; padding:16px; }
        .lightbox-close{ position:fixed; top:20px; right:20px; background:rgba(255,255,255,0.15); border:none; color:white; width:44px; height:44px; border-radius:50%; font-size:22px; cursor:pointer; display:flex; align-items:center; justify-content:center; z-index:10; }
        .lightbox-nav{ position:fixed; top:50%; transform:translateY(-50%); background:rgba(255,255,255,0.15); border:none; color:white; width:50px; height:50px; border-radius:50%; font-size:24px; cursor:pointer; display:flex; align-items:center; justify-content:center; z-index:10; }
        #lightboxPrev{ left:16px; } #lightboxNext{ right:16px; }
        .lightbox-counter{ position:fixed; bottom:24px; left:50%; transform:translateX(-50%); background:rgba(255,255,255,0.15); color:white; padding:6px 16px; border-radius:20px; font-size:13px; font-weight:600; }
        /* ===== PRODUCT IMAGE HOVER ZOOM ===== */
        #product-image-wrap{ cursor:zoom-in; overflow:hidden; }
        #product-image-wrap:hover #product-image{ transform:scale(1.1); }
        #product-image{ transition:transform 0.45s cubic-bezier(0.25,0.46,0.45,0.94); transform-origin:center center; }
        /* ===== MINI DETAIL MODAL ===== */
        #miniDetailModal{ display:none; position:fixed; inset:0; background:rgba(0,0,0,0.65); backdrop-filter:blur(4px); z-index:200; align-items:center; justify-content:center; padding:16px; }
        #miniDetailModal.open{ display:flex; }
        .mini-detail-sheet{ background:white; border-radius:20px; max-width:520px; width:100%; max-height:88vh; overflow-y:auto; box-shadow:0 20px 60px rgba(0,0,0,0.3); }
        /* ===== TABS ===== */
        .tab-content{ display:none; } .tab-content.active{ display:block; }
        .tab-btn{ border-bottom:3px solid transparent; }
        .tab-btn.active{ border-bottom-color:#b71c1c; color:#b71c1c; background:white; }
        /* ===== RELATED CARDS (Bottom Section) ===== */
        .related-card-bottom{ background:white; border:1.5px solid #e2e8f0; border-radius:14px; overflow:hidden; cursor:pointer; transition:border-color 0.2s,box-shadow 0.2s,transform 0.2s; }
        .related-card-bottom:hover{ border-color:#0a2463; box-shadow:0 4px 20px rgba(10,36,99,0.12); transform:translateY(-3px); }
        .related-card-bottom-img{ width:100%; height:140px; object-fit:contain; background:#f8faff; padding:12px; }
        .related-card-bottom-body{ padding:12px; }
        .related-card-bottom-name{ font-size:12px; font-weight:700; color:#0a2463; line-height:1.4; margin-bottom:4px; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; min-height:32px; }
        .related-card-bottom-sub{ font-size:10px; color:#94a3b8; margin-bottom:6px; display:-webkit-box; -webkit-line-clamp:1; -webkit-box-orient:vertical; overflow:hidden; }
        .related-card-bottom-price{ font-size:15px; font-weight:800; color:#b71c1c; margin-bottom:10px; }
        .related-card-bottom-btn{ width:100%; background:#0a2463; color:white; font-size:11px; font-weight:700; padding:8px; border-radius:8px; border:none; cursor:pointer; }
        .related-card-bottom-btn:hover{ background:#1a3a7a; }
        /* ===== MISC ===== */
        .feat-row{ display:flex; border-bottom:1px solid #f1f5f9; }
        .feat-row:last-child{ border-bottom:none; }
        .feat-key{ width:45%; background:#f8faff; padding:10px 12px; font-size:12px; font-weight:600; color:#475569; text-transform:uppercase; letter-spacing:0.04em; border-right:1px solid #f1f5f9; }
        .feat-val{ padding:10px 12px; font-size:13px; font-weight:600; color:#1e293b; flex:1; }
        .scroll-row{ display:flex; gap:12px; overflow-x:auto; padding-bottom:8px; scrollbar-width:none; }
        .scroll-row::-webkit-scrollbar{ display:none; }
    </style>
</head>
<body class="bg-gray-50">
<?php include 'assets/include/header.php'; ?>

<!-- Header Cart Button Injector -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const cartBtn = document.createElement('button');
    cartBtn.id = 'headerCartBtn';
    cartBtn.onclick = openCheckout;
    cartBtn.innerHTML = `<svg style="width:18px;height:18px" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg><span>Cart</span><span id="headerCartCount" class="hcart-badge">0</span>`;
    const selectors = ['button[onclick*="openQuoteModal"]','a[href*="quote"]','header a.bg-secondary','header button.bg-secondary','nav a[href*="quote"]'];
    let quoteBtn = null;
    for (const sel of selectors) { quoteBtn = document.querySelector(sel); if (quoteBtn) break; }
    if (quoteBtn) quoteBtn.parentNode.replaceChild(cartBtn, quoteBtn);
    else { const h = document.querySelector('header') || document.querySelector('nav'); if(h){ const w=document.createElement('div'); w.style.cssText='display:flex;align-items:center;margin-left:auto;padding-right:16px;'; w.appendChild(cartBtn); h.appendChild(w); } }
    setTimeout(loadCartFromStorage, 200);
});
</script>

<?php include 'assets/include/modal.php'; ?>

<!-- SUCCESS NOTIFICATION -->
<div id="successNotification">
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:20px;height:20px;flex-shrink:0"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    Added to cart!
</div>

<!-- BREADCRUMB -->
<div class="bg-white border-b border-gray-200 py-2.5 px-4">
    <div class="max-w-7xl mx-auto flex items-center text-xs text-gray-500 flex-wrap gap-1">
        <a href="index.php" class="hover:text-secondary">Home</a>
        <svg class="w-3 h-3 mx-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
        <a href="products.php" class="hover:text-secondary">Products</a>
        <svg class="w-3 h-3 mx-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
        <span class="text-secondary font-semibold"><?= htmlspecialchars($product['category']) ?></span>
    </div>
</div>

<!-- PRODUCT SECTION -->
<div class="max-w-7xl mx-auto px-4 py-6">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <!-- LEFT: IMAGE GALLERY -->
        <div class="lg:col-span-4">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-4 sticky top-4">
                <!-- Ships within badge - FROM DB -->
                <div class="flex items-center gap-1.5 mb-3 text-xs font-bold text-green-700">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8l1 12a2 2 0 002 2h8a2 2 0 002-2l1-12"/></svg>
                    <?= htmlspecialchars($product['ships_within']) ?>
                </div>

                <!-- Main image -->
                <div id="product-image-wrap" class="relative bg-gray-50 rounded-lg border border-gray-100 overflow-hidden" style="height:340px;" onclick="openLightbox(0)">
                    <img id="product-image" src="<?= htmlspecialchars($images[0]['image_path']) ?>"
                         alt="<?= htmlspecialchars($product['name']) ?>"
                         class="w-full h-full object-contain">

                    <!-- IN STOCK badge - FROM DB -->
                    <div class="absolute top-3 left-3 z-10">
                        <?php if($product['in_stock']): ?>
                        <span class="bg-green-600 text-white px-2 py-1 rounded text-xs font-bold flex items-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            <?= htmlspecialchars($product['stock_label']) ?>
                        </span>
                        <?php else: ?>
                        <span class="bg-red-600 text-white px-2 py-1 rounded text-xs font-bold">Out of Stock</span>
                        <?php endif; ?>
                    </div>

                    <!-- BEST PRICE badge - FROM DB -->
                    <?php if($product['best_price']): ?>
                    <div class="absolute top-3 right-3 z-10">
                        <span class="bg-primary text-white px-2 py-1 rounded text-xs font-bold">Best Price ✓</span>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Thumbnails from DB -->
                <div class="flex gap-2 mt-3 overflow-x-auto pb-1" id="thumbRow">
                    <?php foreach($images as $idx => $img): ?>
                    <div class="w-14 h-14 flex-shrink-0 border-2 <?= $idx===0?'border-secondary':'border-gray-200' ?> rounded-md overflow-hidden bg-gray-50 cursor-pointer" onclick="switchImage('<?= htmlspecialchars($img['image_path']) ?>', this)">
                        <img src="<?= htmlspecialchars($img['image_path']) ?>" alt="<?= htmlspecialchars($img['alt_text'] ?? '') ?>" class="w-full h-full object-contain p-1">
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Trust badges -->
                <div class="grid grid-cols-4 gap-2 mt-3">
                    <div class="bg-gray-50 rounded-lg p-2 text-center border border-gray-100">
                        <svg class="w-5 h-5 mx-auto mb-1 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <p style="font-size:9px" class="font-bold text-gray-600">ISO Cert.</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-2 text-center border border-gray-100">
                        <svg class="w-5 h-5 mx-auto mb-1 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <p style="font-size:9px" class="font-bold text-gray-600">IBR Appr.</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-2 text-center border border-gray-100">
                        <svg class="w-5 h-5 mx-auto mb-1 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/><path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/></svg>
                        <p style="font-size:9px" class="font-bold text-gray-600">Fast Del.</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-2 text-center border border-gray-100">
                        <svg class="w-5 h-5 mx-auto mb-1 text-secondary" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <p style="font-size:9px" class="font-bold text-gray-600">Genuine</p>
                    </div>
                </div>

                <!-- ✅ CHANGE 1: Product Description moved here (replacing Related Products) -->
                <?php if(!empty($product['description'])): ?>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-xs font-bold text-gray-700 mb-2 flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Product Description
                    </p>
                    <p class="text-xs text-gray-600 leading-relaxed"><?= htmlspecialchars($product['description']) ?></p>
                </div>
                <?php endif; ?>

            </div>
        </div>
 
        <!-- MIDDLE: PRODUCT INFO -->
        <div class="lg:col-span-5">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5 space-y-4">

                <!-- Category tag FROM DB -->
                <span class="inline-block bg-blue-50 text-secondary text-xs font-bold px-3 py-1 rounded border border-blue-100 uppercase tracking-wide">
                    <?= htmlspecialchars($product['category']) ?>
                </span>

                <!-- Title & Subtitle FROM DB -->
                <div>
                    <h1 class="text-lg font-bold text-gray-900 leading-snug mb-1"><?= htmlspecialchars($product['name']) ?></h1>
                    <p class="text-sm text-gray-500 font-medium"><?= htmlspecialchars($product['subtitle'] ?? '') ?></p>
                </div>

                <!-- Rating FROM DB -->
                <div class="flex items-center gap-3 pb-3 border-b border-gray-100 flex-wrap">
                    <div class="flex items-center gap-0.5">
                        <?php $rating = floatval($product['rating']); for($s=1;$s<=5;$s++): ?>
                        <svg class="w-4 h-4 <?= $s<=$rating?'text-yellow-400':'text-gray-300' ?>" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <?php endfor; ?>
                    </div>
                    <span class="text-gray-500 text-xs"><?= $product['rating'] ?> / 5.0</span>
                    <span class="text-gray-300 text-xs">|</span>
                    <span class="text-gray-500 text-xs"><?= htmlspecialchars($product['orders_count']) ?> Orders</span>
                    <?php if($product['in_stock']): ?>
                    <span class="bg-green-50 text-green-700 border border-green-200 text-xs font-bold px-2 py-0.5 rounded">✓ <?= htmlspecialchars($product['stock_label']) ?></span>
                    <?php endif; ?>
                </div>

                <!-- PRICE BLOCK - FROM DB -->
                <div class="py-2">
                    <p class="text-xs text-gray-400 line-through mb-0.5">MRP <?= formatINR($mrpDisplay) ?> (Incl. of all taxes)</p>
                    <div class="flex items-baseline gap-2 flex-wrap">
                        <p id="product-total-price" class="text-3xl font-extrabold text-primary"><?= formatINR($product['price_min']) ?></p>
                        <span class="text-sm text-gray-500">(<span id="unit-price-display"><?= formatINR($product['price_min']) ?></span> × <span id="current-quantity">1</span> pcs)</span>
                    </div>
                    <p class="text-xs text-gray-400 mt-0.5">+ <?= $product['gst_percent'] ?>% GST</p>
                    <?php if($product['best_price']): ?>
                    <div class="flex items-center gap-2 mt-2 text-xs text-green-700 bg-green-50 border border-green-100 px-3 py-1.5 rounded-lg w-fit">
                        <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="font-bold">Best Price Guaranteed • No Hidden Charges</span>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- AVAILABLE OFFERS - FROM DB -->
                <?php if(!empty($offers)): ?>
                <div class="bg-amber-50 border border-amber-200 rounded-lg p-3">
                    <div class="flex items-center justify-between mb-2">
                        <p class="text-xs font-bold text-gray-800 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-orange-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/></svg>
                            AVAILABLE OFFERS
                        </p>
                        <button onclick="openOffersModal()" class="text-xs font-bold text-secondary border border-secondary px-2 py-0.5 rounded hover:bg-secondary hover:text-white transition-colors">View All</button>
                    </div>
                    <div class="space-y-1.5 text-xs text-gray-700">
                        <?php foreach(array_slice($offers,0,2) as $offer): ?>
                        <p class="flex items-start gap-1.5">
                            <span class="flex-shrink-0"><?= htmlspecialchars($offer['icon']) ?></span>
                            <?= htmlspecialchars($offer['offer_text']) ?>
                        </p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- FEATURES TABLE - FROM DB -->
                <?php if(!empty($specs)): ?>
                <div class="border border-gray-100 rounded-lg overflow-hidden">
                    <div class="bg-gray-50 px-3 py-2 border-b border-gray-100 flex items-center justify-between">
                        <p class="text-xs font-bold text-gray-700">FEATURES</p>
                        <button onclick="switchTab('specifications',document.querySelector('.tab-btn'))" class="text-xs font-bold text-secondary border border-secondary px-2 py-0.5 rounded hover:bg-secondary hover:text-white transition-colors">More Details</button>
                    </div>
                    <?php foreach($specs as $spec): ?>
                    <div class="feat-row">
                        <div class="feat-key"><?= htmlspecialchars($spec['spec_key']) ?></div>
                        <div class="feat-val"><?= htmlspecialchars($spec['spec_value']) ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <!-- Quantity Selector -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2">Select Quantity:</label>
                    <div class="flex items-center gap-3">
                        <div class="flex items-center border-2 border-secondary rounded-lg overflow-hidden">
                            <button onclick="decreaseQuantity()" class="w-10 h-10 bg-gray-50 hover:bg-secondary hover:text-white border-r-2 border-secondary transition-all flex items-center justify-center text-xl font-bold text-secondary">−</button>
                            <input type="number" id="quantity" value="1" min="1" readonly class="w-14 text-center text-base font-bold text-secondary border-0 outline-none bg-white">
                            <button onclick="increaseQuantity()" class="w-10 h-10 bg-gray-50 hover:bg-secondary hover:text-white border-l-2 border-secondary transition-all flex items-center justify-center text-xl font-bold text-secondary">+</button>
                        </div>
                        <span class="text-xs text-gray-500">pieces &nbsp;|&nbsp; Min Order: <?= $product['min_order'] ?> <?= htmlspecialchars($product['min_order_unit']) ?></span>
                    </div>
                </div>

                <!-- Action Buttons (Desktop) -->
                <div class="hidden lg:flex gap-3">
                    <button onclick="addToCart()" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-lg transition-all flex items-center justify-center gap-2 text-sm shadow-md">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        ADD TO CART
                    </button>
                    <button onclick="openQuoteModal()" class="flex-1 bg-secondary hover:bg-blue-900 text-white font-bold py-3 rounded-lg transition-all flex items-center justify-center gap-2 text-sm shadow-md">
                        REQUEST QUOTE
                    </button>
                </div>

                <!-- Extra links -->
                <div class="flex gap-2 flex-wrap">
                    <button class="flex items-center gap-1.5 text-xs font-semibold text-secondary border border-gray-200 px-3 py-2 rounded-lg hover:border-secondary hover:bg-blue-50 transition-all">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        Call +91 84688-51160
                    </button>
                    <button onclick="buyOnChat()" class="flex items-center gap-1.5 text-xs font-semibold text-green-700 border border-green-300 px-3 py-2 rounded-lg hover:bg-green-50 transition-all">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Buy on Chat
                    </button>
                    <button class="flex items-center gap-1.5 text-xs font-semibold text-gray-600 border border-gray-200 px-3 py-2 rounded-lg hover:border-gray-400 hover:bg-gray-50 transition-all">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        Bulk Qty Quote
                    </button>
                </div>

                <!-- Trust Numbers -->
                <div class="grid grid-cols-3 gap-2 pt-2 border-t border-gray-100">
                    <div class="text-center py-2 bg-green-50 rounded-lg border border-green-100">
                        <p class="text-lg font-bold text-green-700">55+</p>
                        <p class="text-xs text-gray-600">Years Trust</p>
                    </div>
                    <div class="text-center py-2 bg-blue-50 rounded-lg border border-blue-100">
                        <p class="text-lg font-bold text-blue-700">1000+</p>
                        <p class="text-xs text-gray-600">Happy Clients</p>
                    </div>
                    <div class="text-center py-2 bg-purple-50 rounded-lg border border-purple-100">
                        <p class="text-lg font-bold text-purple-700">100%</p>
                        <p class="text-xs text-gray-600">Genuine</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT: STICKY BUY BOX (Desktop) - FROM DB -->
        <div class="lg:col-span-3 hidden lg:block">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-4 sticky top-4">
                <p class="text-xs text-gray-400 line-through">MRP <?= formatINR($mrpDisplay) ?> (Incl. of all taxes)</p>
                <p id="side-price" class="text-2xl font-extrabold text-primary"><?= formatINR($product['price_min']) ?></p>
                <p class="text-xs text-gray-400 mb-1">+ <?= $product['gst_percent'] ?>% GST &nbsp;
                    <?php if($savings > 0): ?>
                    <span class="text-green-600 font-bold">Save <?= formatINR($savings) ?></span>
                    <?php endif; ?>
                </p>
                <div class="h-px bg-gray-100 my-3"></div>
                <p class="text-xs font-bold text-gray-700 mb-2">Quantity</p>
                <div class="flex items-center gap-2 mb-4">
                    <div class="flex items-center border-2 border-secondary rounded-lg overflow-hidden">
                        <button onclick="decreaseQuantity()" class="w-8 h-8 bg-gray-50 hover:bg-secondary hover:text-white border-r-2 border-secondary transition-all flex items-center justify-center text-lg font-bold text-secondary">−</button>
                        <span class="w-10 text-center text-sm font-bold text-secondary" id="sideQtyDisplay">1</span>
                        <button onclick="increaseQuantity()" class="w-8 h-8 bg-gray-50 hover:bg-secondary hover:text-white border-l-2 border-secondary transition-all flex items-center justify-center text-lg font-bold text-secondary">+</button>
                    </div>
                    <span class="text-xs text-gray-400">Min: <?= $product['min_order'] ?></span>
                </div>
                <button onclick="addToCart()" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2.5 rounded-lg text-sm mb-2 flex items-center justify-center gap-2 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    ADD TO CART
                </button>
                <button onclick="openQuoteModal()" class="w-full bg-secondary hover:bg-blue-900 text-white font-bold py-2.5 rounded-lg text-sm mb-3 flex items-center justify-center gap-2 transition-colors">
                    REQUEST QUOTE
                </button>

                <!-- Min Order / Delivery / Warranty / Cert - ALL FROM DB -->
                <div class="grid grid-cols-2 gap-2 text-xs mb-3">
                    <div class="bg-gray-50 rounded p-2">
                        <p class="text-gray-400">Min. Order</p>
                        <p class="font-bold text-gray-800"><?= $product['min_order'] ?> <?= htmlspecialchars($product['min_order_unit']) ?></p>
                    </div>
                    <div class="bg-gray-50 rounded p-2">
                        <p class="text-gray-400">Delivery</p>
                        <p class="font-bold text-gray-800"><?= htmlspecialchars($product['delivery_days']) ?></p>
                    </div>
                    <div class="bg-gray-50 rounded p-2">
                        <p class="text-gray-400">Warranty</p>
                        <p class="font-bold text-gray-800"><?= htmlspecialchars($product['warranty']) ?></p>
                    </div>
                    <div class="bg-gray-50 rounded p-2">
                        <p class="text-gray-400">Cert.</p>
                        <p class="font-bold text-gray-800"><?= htmlspecialchars($product['certification']) ?></p>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <button class="w-full text-left flex items-center gap-2 text-xs font-semibold text-secondary border border-gray-100 px-3 py-2 rounded-lg hover:border-secondary transition-all">
                        <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        Call +91 84688-51160
                    </button>
                    <button onclick="buyOnChat()" class="w-full text-left flex items-center gap-2 text-xs font-semibold text-green-700 border border-green-200 px-3 py-2 rounded-lg hover:bg-green-50 transition-all">
                        <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Buy on WhatsApp Chat
                    </button>
                    <button class="w-full text-left flex items-center gap-2 text-xs font-semibold text-gray-600 border border-gray-100 px-3 py-2 rounded-lg hover:border-gray-300 transition-all">
                        <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        Ask for Bulk Qty Quote
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- TRUST STRIP -->
    <div class="mt-4 bg-white border border-gray-200 rounded-xl shadow-sm">
        <div class="flex overflow-x-auto divide-x divide-gray-100">
            <div class="flex items-center gap-3 px-6 py-4 flex-1 min-w-max"><svg class="w-7 h-7 text-orange-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg><p class="text-xs font-bold text-gray-800">Warranty as per brand</p></div>
            <div class="flex items-center gap-3 px-6 py-4 flex-1 min-w-max"><svg class="w-7 h-7 text-orange-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><p class="text-xs font-bold text-gray-800">100% Original Products</p></div>
            <div class="flex items-center gap-3 px-6 py-4 flex-1 min-w-max"><svg class="w-7 h-7 text-orange-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg><p class="text-xs font-bold text-gray-800">Secure Payments</p></div>
            <div class="flex items-center gap-3 px-6 py-4 flex-1 min-w-max"><svg class="w-7 h-7 text-orange-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg><p class="text-xs font-bold text-gray-800">100% Buyer Protection</p></div>
            <div class="flex items-center gap-3 px-6 py-4 flex-1 min-w-max"><svg class="w-7 h-7 text-orange-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg><p class="text-xs font-bold text-gray-800">Top Brands</p></div>
        </div>
    </div>

    <!-- TABS: SPECS / DESCRIPTION / FEATURES & APPLICATIONS - ALL FROM DB -->
    <div class="mt-4 bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="flex border-b border-gray-200 bg-gray-50 overflow-x-auto">
            <button class="tab-btn active text-sm font-bold px-5 py-3 whitespace-nowrap text-gray-500 hover:text-primary" onclick="switchTab('specifications',this)">SPECIFICATIONS</button>
            <button class="tab-btn text-sm font-bold px-5 py-3 whitespace-nowrap text-gray-500 hover:text-primary" onclick="switchTab('description',this)">DESCRIPTION</button>
            <button class="tab-btn text-sm font-bold px-5 py-3 whitespace-nowrap text-gray-500 hover:text-primary" onclick="switchTab('features',this)">FEATURES & APPLICATIONS</button>
        </div>

        <!-- SPECS TAB - FROM DB -->
        <div id="tab-specifications" class="tab-content active p-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-0 border border-gray-200 rounded-lg overflow-hidden">
                <?php foreach($specs as $spec): ?>
                <div class="flex border-b border-gray-100">
                    <div class="w-2/5 bg-gray-50 p-3 text-xs text-gray-500 font-semibold uppercase tracking-wider border-r border-gray-100"><?= htmlspecialchars($spec['spec_key']) ?></div>
                    <div class="p-3 text-sm font-semibold text-gray-800"><?= htmlspecialchars($spec['spec_value']) ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- DESCRIPTION TAB - FROM DB -->
        <div id="tab-description" class="tab-content p-5">
            <div class="text-sm text-gray-700 leading-relaxed space-y-3">
                <p><strong><?= htmlspecialchars($product['name']) ?></strong> — <?= htmlspecialchars($product['description'] ?? '') ?></p>
                <?php if(!empty($features)): ?>
                <p class="font-bold text-gray-900">Why Choose This Product?</p>
                <ul class="space-y-2">
                    <?php foreach($features as $feat): ?>
                    <li class="flex items-start gap-2"><span class="text-green-600 font-bold flex-shrink-0 mt-0.5">✓</span><?= htmlspecialchars($feat) ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>

        <!-- FEATURES & APPLICATIONS TAB - FROM DB -->
        <div id="tab-features" class="tab-content p-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-bold text-secondary mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        Key Features
                    </h4>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <?php foreach($features as $feat): ?>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            <?= htmlspecialchars($feat) ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-green-700 mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        Applications
                    </h4>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <?php foreach($applications as $app): ?>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-secondary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            <?= htmlspecialchars($app) ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ CHANGE 2: RELATED PRODUCTS - Sabse niche, footer ke upar -->
    <?php if(!empty($related)): ?>
    <div class="mt-6 bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100 bg-gray-50">
            <h2 class="text-sm font-bold text-secondary flex items-center gap-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                Related Products
            </h2>
            <span class="text-xs text-gray-400 font-medium"><?= htmlspecialchars($product['category']) ?></span>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <?php foreach($related as $rel): ?>
                <div class="related-card-bottom" onclick="window.location.href='product_details.php?slug=<?= urlencode($rel['slug']) ?>'">
                    <img src="<?= htmlspecialchars($rel['image']) ?>"
                         alt="<?= htmlspecialchars($rel['name']) ?>"
                         class="related-card-bottom-img"
                         onerror="this.style.background='#f1f5f9'">
                    <div class="related-card-bottom-body">
                        <div class="related-card-bottom-name"><?= htmlspecialchars($rel['name']) ?></div>
                        <?php if(!empty($rel['subtitle'])): ?>
                        <div class="related-card-bottom-sub"><?= htmlspecialchars($rel['subtitle']) ?></div>
                        <?php endif; ?>
                        <div class="related-card-bottom-price">₹<?= number_format($rel['price_min'],0,'.',',') ?><?= $rel['price_max']>0 ? ' - ₹'.number_format($rel['price_max'],0,'.',',') : '' ?></div>
                        <button class="related-card-bottom-btn">View Details</button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div><!-- /max-w-7xl -->

<!-- MOBILE ACTION BAR -->
<div id="mobileActionBar">
    <button class="mob-btn-cart" onclick="addToCart()">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        ADD TO CART
    </button>
    <button class="mob-btn-quote" onclick="openQuoteModal()">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
        REQUEST QUOTE
    </button>
</div>

<!-- FLOATING CART BUTTON (Mobile) -->
<button id="floatingCartBtn" onclick="openCheckout()">
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
    <span>Cart</span>
    <span id="cart-count" class="cart-badge">0</span>
</button>

<!-- CHECKOUT MODAL -->
<div id="checkoutModal">
    <div class="modal-sheet">
        <div class="drag-handle"></div>
        <div class="modal-header">
            <h2 style="font-size:20px;font-weight:800;display:flex;align-items:center;gap:10px">
                <svg style="width:22px;height:22px" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                Your Cart
            </h2>
            <button class="modal-close-btn" onclick="closeCheckout()">✕</button>
        </div>
        <div class="cart-items-area" id="cartItemsContainer"></div>
        <div class="cart-summary" id="checkoutSummary" style="display:none">
            <div style="display:flex;justify-content:space-between;margin-bottom:8px">
                <span style="font-size:14px;font-weight:600;color:#475569">Total Items</span>
                <span style="font-size:14px;font-weight:700;color:#0a2463" id="totalItems">0</span>
            </div>
            <div style="display:flex;justify-content:space-between;margin-bottom:14px">
                <span style="font-size:18px;font-weight:800;color:#1e293b">Grand Total</span>
                <span style="font-size:26px;font-weight:900;color:#b71c1c" id="grandTotal">₹0</span>
            </div>
            <div class="cart-action-btns">
                <button class="btn-whatsapp" onclick="proceedToWhatsApp()">
                    <svg style="width:20px;height:20px" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Checkout via WhatsApp
                </button>
                <button class="btn-clear" onclick="clearCart()">
                    <svg style="width:18px;height:18px" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Clear
                </button>
            </div>
        </div>
    </div>
</div>

<!-- OFFERS MODAL - FROM DB -->
<div id="offersModal">
    <div class="offers-sheet">
        <div style="background:#f97316;color:white;padding:16px;display:flex;align-items:center;justify-content:space-between;">
            <h3 style="font-weight:700;font-size:16px">🏷 Available Offers</h3>
            <button onclick="closeOffersModal()" style="width:28px;height:28px;background:rgba(255,255,255,0.2);border:none;color:white;border-radius:50%;cursor:pointer;">✕</button>
        </div>
        <div class="p-4 space-y-3">
            <?php foreach($offers as $offer): ?>
            <div class="bg-amber-50 border border-amber-200 rounded-lg p-3">
                <p class="font-bold text-sm text-gray-800 mb-1"><?= htmlspecialchars($offer['icon']) ?> <?= htmlspecialchars($offer['offer_text']) ?></p>
                <?php if(!empty($offer['valid_note'])): ?>
                <p class="text-xs text-gray-500"><?= htmlspecialchars($offer['valid_note']) ?></p>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- IMAGE LIGHTBOX -->
<div id="imageLightbox">
    <button class="lightbox-close" onclick="closeLightbox()">✕</button>
    <button class="lightbox-nav" id="lightboxPrev" onclick="lightboxNav(-1)" style="left:16px">‹</button>
    <div style="max-width:90vw;max-height:90vh;display:flex;align-items:center;justify-content:center;">
        <img id="lightboxImg" src="<?= htmlspecialchars($images[0]['image_path']) ?>" alt="Product Zoom">
    </div>
    <button class="lightbox-nav" id="lightboxNext" onclick="lightboxNav(1)" style="right:16px">›</button>
    <div class="lightbox-counter" id="lightboxCounter">1 / <?= count($images) ?></div>
</div>

<!-- MINI DETAIL MODAL -->
<div id="miniDetailModal">
    <div class="mini-detail-sheet">
        <div style="background:#0a2463;color:white;padding:16px;display:flex;align-items:center;justify-content:space-between;">
            <h3 style="font-weight:700;font-size:14px" id="miniModalTitle">Product Details</h3>
            <button onclick="closeMiniModal()" style="width:28px;height:28px;background:rgba(255,255,255,0.2);border:none;color:white;border-radius:50%;cursor:pointer;">✕</button>
        </div>
        <div id="miniModalBody" class="p-4"></div>
    </div>
</div>

<script>
// ===== DB DATA INJECTED FROM PHP =====
const WHATSAPP_NUMBER = '8468851160';
const dbProduct       = <?= $productJSON ?>;
const dbImages        = <?= $imagesJSON ?>;
const dbAllProducts   = <?= $allProductsJSON ?>;

let unitPriceValue = parseFloat(dbProduct.price_min) || 0;
let lightboxImages = dbImages.map(i => i.image_path);
let lightboxIndex  = 0;

// ===== CART =====
let cart = [];

function loadCartFromStorage() {
    try {
        const saved = localStorage.getItem('itc_cart');
        if (saved) { const p = JSON.parse(saved); if (Array.isArray(p)) cart = p; }
    } catch(e) { cart = []; }
    updateCartCount();
}

function saveCartToStorage() {
    try { localStorage.setItem('itc_cart', JSON.stringify(cart)); } catch(e) {}
}

loadCartFromStorage();

function formatPrice(price) { return price.toLocaleString('en-IN'); }

function updateTotalPrice() {
    const qty = parseInt(document.getElementById('quantity').value);
    document.getElementById('product-total-price').textContent = '₹' + formatPrice(unitPriceValue * qty);
    document.getElementById('current-quantity').textContent = qty;
    document.getElementById('unit-price-display').textContent = '₹' + formatPrice(unitPriceValue);
    const sd = document.getElementById('sideQtyDisplay');
    if (sd) sd.textContent = qty;
    const sp = document.getElementById('side-price');
    if (sp) sp.textContent = '₹' + formatPrice(unitPriceValue * qty);
}

function increaseQuantity() {
    const el = document.getElementById('quantity');
    el.value = parseInt(el.value) + 1;
    updateTotalPrice();
}

function decreaseQuantity() {
    const el = document.getElementById('quantity');
    if (parseInt(el.value) > 1) { el.value = parseInt(el.value) - 1; updateTotalPrice(); }
}

function addToCart() {
    const qty = parseInt(document.getElementById('quantity').value);
    const product = {
        name:       dbProduct.name,
        subtitle:   dbProduct.subtitle || '',
        category:   dbProduct.category,
        image:      dbImages[0]?.image_path || dbProduct.image,
        unitPrice:  unitPriceValue,
        quantity:   qty,
        totalPrice: unitPriceValue * qty
    };
    const idx = cart.findIndex(i => i.name === product.name);
    if (idx > -1) { cart[idx].quantity += qty; cart[idx].totalPrice = cart[idx].unitPrice * cart[idx].quantity; }
    else { cart.push(product); }
    saveCartToStorage();
    updateCartCount();
    showSuccessNotification();
}

function showSuccessNotification() {
    const n = document.getElementById('successNotification');
    n.classList.add('show');
    setTimeout(() => n.classList.remove('show'), 3000);
}

function updateCartCount() {
    const total = cart.reduce((s, i) => s + i.quantity, 0);
    ['cart-count','headerCartCount'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.textContent = total;
    });
    document.querySelectorAll('.hcart-badge,.cart-badge').forEach(el => el.textContent = total);
}

function openCheckout() {
    document.getElementById('checkoutModal').classList.add('open');
    document.body.style.overflow = 'hidden';
    renderCart();
}
function closeCheckout() { document.getElementById('checkoutModal').classList.remove('open'); document.body.style.overflow = ''; }

function renderCart() {
    const container = document.getElementById('cartItemsContainer');
    const summary   = document.getElementById('checkoutSummary');
    if (!cart.length) {
        container.innerHTML = `<div class="empty-cart"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:72px;height:72px;margin:0 auto 16px;opacity:0.4"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg><p style="font-size:18px;font-weight:700;color:#64748b;margin-bottom:6px">Your cart is empty</p><p style="font-size:13px">Add some products to get started</p></div>`;
        summary.style.display = 'none'; return;
    }
    summary.style.display = 'block';
    container.innerHTML = cart.map((item, i) => `
        <div class="cart-item-card">
            <img src="${item.image||''}" alt="${item.name}" class="cart-item-img" onerror="this.style.display='none'">
            <div style="flex:1;min-width:0">
                <div class="cart-item-name">${item.name}</div>
                <div class="cart-item-subtitle">${item.subtitle||''}</div>
                <div class="cart-item-unit">₹${formatPrice(item.unitPrice)} × ${item.quantity} pcs</div>
            </div>
            <div class="cart-item-right">
                <div class="cart-item-price">₹${formatPrice(item.totalPrice)}</div>
                <button class="cart-item-remove" onclick="removeFromCart(${i})">Remove</button>
            </div>
        </div>`).join('');
    const totalItems = cart.reduce((s, i) => s + i.quantity, 0);
    const grandTotal = cart.reduce((s, i) => s + i.totalPrice, 0);
    document.getElementById('totalItems').textContent = totalItems + ' items';
    document.getElementById('grandTotal').textContent = '₹' + formatPrice(grandTotal);
}

function removeFromCart(index) {
    if (confirm('Remove this item from cart?')) {
        cart.splice(index, 1); saveCartToStorage(); updateCartCount(); renderCart();
    }
}

function clearCart() {
    if (confirm('Clear all items from cart?')) {
        cart = []; saveCartToStorage(); updateCartCount(); renderCart();
    }
}

function proceedToWhatsApp() {
    if (!cart.length) { alert('Cart is empty!'); return; }
    let msg = '*🛒 NEW ORDER REQUEST*\n\n━━━━━━━━━━━━\n*📦 Cart Items:*\n━━━━━━━━━━━━\n\n';
    cart.forEach((item, i) => {
        msg += `*${i+1}. ${item.name}*\n   Qty: ${item.quantity} pcs\n   Unit Price: ₹${formatPrice(item.unitPrice)}\n   Total: ₹${formatPrice(item.totalPrice)}\n\n`;
    });
    const grand = cart.reduce((s, i) => s + i.totalPrice, 0);
    msg += `━━━━━━━━━━━━\n*Grand Total:* ₹${formatPrice(grand)}\n\nPlease confirm availability and delivery. Thank you! 🙏`;
    window.open(`https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent(msg)}`, '_blank');
}

function switchImage(src, thumbEl) {
    document.getElementById('product-image').src = src;
    document.querySelectorAll('#thumbRow > div').forEach(d => d.classList.replace('border-secondary','border-gray-200'));
    thumbEl.classList.replace('border-gray-200','border-secondary');
    const idx = lightboxImages.indexOf(src);
    if (idx > -1) lightboxIndex = idx;
}

function openLightbox(idx = 0) {
    lightboxIndex = idx;
    updateLightboxImg();
    document.getElementById('imageLightbox').classList.add('open');
    document.body.style.overflow = 'hidden';
}
function closeLightbox() { document.getElementById('imageLightbox').classList.remove('open'); document.body.style.overflow = ''; }
function lightboxNav(dir) { lightboxIndex = (lightboxIndex + dir + lightboxImages.length) % lightboxImages.length; updateLightboxImg(); }
function updateLightboxImg() {
    document.getElementById('lightboxImg').src = lightboxImages[lightboxIndex];
    document.getElementById('lightboxCounter').textContent = (lightboxIndex + 1) + ' / ' + lightboxImages.length;
    document.getElementById('lightboxPrev').style.display = lightboxImages.length > 1 ? 'flex' : 'none';
    document.getElementById('lightboxNext').style.display = lightboxImages.length > 1 ? 'flex' : 'none';
}
document.getElementById('imageLightbox').addEventListener('click', function(e) { if (e.target === this) closeLightbox(); });

function openOffersModal()  { document.getElementById('offersModal').classList.add('open'); }
function closeOffersModal() { document.getElementById('offersModal').classList.remove('open'); }
document.getElementById('offersModal').addEventListener('click', function(e) { if(e.target===this) closeOffersModal(); });

function closeMiniModal() { document.getElementById('miniDetailModal').classList.remove('open'); document.body.style.overflow = ''; }
document.getElementById('miniDetailModal').addEventListener('click', function(e) { if(e.target===this) closeMiniModal(); });
document.getElementById('checkoutModal').addEventListener('click', function(e) { if(e.target===this) closeCheckout(); });

function switchTab(id, btn) {
    document.querySelectorAll('.tab-content').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.getElementById('tab-' + id).classList.add('active');
    if (btn) btn.classList.add('active');
}

function openQuoteModal() {
    const modal = document.getElementById('quoteModal');
    if (modal) { modal.classList.remove('hidden'); document.body.style.overflow = 'hidden'; }
}

function buyOnChat() {
    const qty   = document.getElementById('quantity').value;
    const price = unitPriceValue * parseInt(qty);
    const msg   = `*🛒 PRODUCT ENQUIRY*\n\n*Product:* ${dbProduct.name}\n*Category:* ${dbProduct.category}\n*Qty:* ${qty} pcs\n*Price:* ₹${formatPrice(price)}\n\nPlease confirm availability and delivery. Thank you! 🙏`;
    window.open(`https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent(msg)}`, '_blank');
}

document.addEventListener('keydown', e => {
    if (e.key === 'Escape')     { closeCheckout(); closeOffersModal(); closeLightbox(); closeMiniModal(); }
    if (e.key === 'ArrowLeft')  lightboxNav(-1);
    if (e.key === 'ArrowRight') lightboxNav(1);
});

updateTotalPrice();
</script>

<?php include 'assets/include/footer.php'; ?>
</body>
</html>