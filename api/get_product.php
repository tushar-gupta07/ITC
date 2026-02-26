<?php
// ============================================================
// api/get_product.php
// Returns single product data as JSON by slug or id
// Usage: api/get_product.php?slug=bronze-ibr-globe-steam-stop-valve
//        api/get_product.php?id=1
// ============================================================

require_once '../assets/include/config.php';

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

$pdo = getDB();

// --- Get product by slug or id ---
$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';
$id   = isset($_GET['id'])   ? (int)$_GET['id']   : 0;

if (!$slug && !$id) {
    jsonResponse(['error' => 'slug or id required'], 400);
}

try {
    if ($slug) {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE slug = ? AND is_active = 1 LIMIT 1");
        $stmt->execute([$slug]);
    } else {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ? AND is_active = 1 LIMIT 1");
        $stmt->execute([$id]);
    }

    $product = $stmt->fetch();
    if (!$product) {
        jsonResponse(['error' => 'Product not found'], 404);
    }

    $pid = $product['id'];

    // Specifications
    $s = $pdo->prepare("SELECT spec_key, spec_value FROM product_specifications WHERE product_id = ? ORDER BY sort_order");
    $s->execute([$pid]);
    $product['specifications'] = $s->fetchAll();

    // Features
    $f = $pdo->prepare("SELECT feature FROM product_features WHERE product_id = ? ORDER BY sort_order");
    $f->execute([$pid]);
    $product['features'] = array_column($f->fetchAll(), 'feature');

    // Applications
    $a = $pdo->prepare("SELECT application FROM product_applications WHERE product_id = ? ORDER BY sort_order");
    $a->execute([$pid]);
    $product['applications'] = array_column($a->fetchAll(), 'application');

    // Offers (by product_id first, then by category)
    $o = $pdo->prepare("
        SELECT icon, offer_text, valid_note FROM product_offers
        WHERE (product_id = ? OR (product_id IS NULL AND category = ?))
          AND is_active = 1
        ORDER BY sort_order
    ");
    $o->execute([$pid, $product['category']]);
    $product['offers'] = $o->fetchAll();

    // Images
    $i = $pdo->prepare("SELECT image_path, alt_text, is_primary FROM product_images WHERE product_id = ? ORDER BY sort_order");
    $i->execute([$pid]);
    $product['images'] = $i->fetchAll();

    // Related products (same category, exclude current)
    $r = $pdo->prepare("
        SELECT id, name, slug, subtitle, image, price_min, price_max, category
        FROM products
        WHERE category = ? AND id != ? AND is_active = 1
        ORDER BY sort_order LIMIT 6
    ");
    $r->execute([$product['category'], $pid]);
    $product['related'] = $r->fetchAll();

    jsonResponse(['success' => true, 'product' => $product]);

} catch (PDOException $e) {
    jsonResponse(['error' => $e->getMessage()], 500);
}