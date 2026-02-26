<?php
// ============================================================
// api/get_products.php
// Returns all products as JSON (for products.php JS use)
// Usage: api/get_products.php
//        api/get_products.php?category=Gate+%2F+Globe+Valves
// ============================================================

require_once '../assets/include/config.php';

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

$pdo = getDB();
$category = isset($_GET['category']) ? trim($_GET['category']) : '';

try {
    if ($category) {
        $stmt = $pdo->prepare("
            SELECT id, name, slug, subtitle, description, image, category,
                   badge, badge_color, price_min, price_max, in_stock, certification
            FROM products
            WHERE category = ? AND is_active = 1
            ORDER BY sort_order
        ");
        $stmt->execute([$category]);
    } else {
        $stmt = $pdo->query("
            SELECT id, name, slug, subtitle, description, image, category,
                   badge, badge_color, price_min, price_max, in_stock, certification
            FROM products
            WHERE is_active = 1
            ORDER BY sort_order
        ");
    }

    $products = $stmt->fetchAll();
    jsonResponse(['success' => true, 'products' => $products, 'count' => count($products)]);

} catch (PDOException $e) {
    jsonResponse(['error' => $e->getMessage()], 500);
}