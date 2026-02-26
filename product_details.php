<?php
require_once 'assets/include/config.php';
$conn = getConn();

$allProducts = array();
$result = $conn->query("SELECT * FROM products WHERE is_active = 1 ORDER BY sort_order ASC");
while ($row = $result->fetch_assoc()) {
    $allProducts[] = $row;
}

$valves = array_filter($allProducts, function($p) { return $p['category'] === 'Gate / Globe Valves'; });
$ball   = array_filter($allProducts, function($p) { return $p['category'] === 'Ball / Check Valves'; });
$pipes  = array_filter($allProducts, function($p) { return $p['category'] === 'Pipes & Fittings'; });

function priceRange($p) {
    $min = 'Rs.' . number_format((float)$p['price_min'], 0, '.', ',');
    $max = 'Rs.' . number_format((float)$p['price_max'], 0, '.', ',');
    if ($p['price_max'] > 0) {
        return $min . ' - ' . $max;
    }
    return $min;
}

function stockLabel($p) {
    if ($p['in_stock']) {
        if (isset($p['stock_label']) && $p['stock_label'] != '') {
            return htmlspecialchars($p['stock_label']);
        }
        return 'In Stock';
    }
    return 'Out of Stock';
}

function certLabel($p) {
    if (isset($p['certification']) && $p['certification'] != '') {
        return htmlspecialchars($p['certification']);
    }
    return 'ISO Certified';
}

function renderCard($p) {
    $slug  = htmlspecialchars($p['slug']);
    $name  = htmlspecialchars($p['name']);

    if (isset($p['subtitle']) && $p['subtitle'] != '') {
        $subtitle = htmlspecialchars($p['subtitle']);
    } else {
        $subtitle = '';
    }

    $image    = htmlspecialchars($p['image']);
    $category = htmlspecialchars($p['category']);

    if (isset($p['badge']) && $p['badge'] != '') {
        $badge = htmlspecialchars($p['badge']);
    } else {
        $badge = '';
    }

    if (isset($p['badge_color']) && $p['badge_color'] != '') {
        $badgeColor = htmlspecialchars($p['badge_color']);
    } else {
        $badgeColor = 'bg-orange-600';
    }

    $price   = priceRange($p);
    $stock   = stockLabel($p);
    $cert    = certLabel($p);

    if ($p['in_stock']) {
        $inStock   = 'text-green-600';
        $stockIcon = '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>';
    } else {
        $inStock   = 'text-red-500';
        $stockIcon = '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>';
    }

    if ($badge != '') {
        $badgeHTML = '<span class="absolute top-4 right-4 ' . $badgeColor . ' text-white px-4 py-1.5 rounded-lg text-xs font-bold uppercase tracking-wide shadow-lg z-20">' . $badge . '</span>';
    } else {
        $badgeHTML = '';
    }

    echo '<div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-gray-200 hover:border-secondary overflow-hidden transform hover:-translate-y-2">';

    echo '<div class="relative bg-gray-50 p-8 h-72 flex items-center justify-center overflow-hidden cursor-pointer" onclick="window.location.href=\'cart.php?slug=' . $slug . '\'">';
    echo '<span class="absolute top-4 left-4 bg-white text-secondary px-3 py-1.5 rounded-lg text-xs font-bold border border-gray-300 shadow-md z-20">' . $category . '</span>';
    echo $badgeHTML;
    echo '<img src="' . $image . '" alt="' . $name . '" class="max-w-full h-56 object-contain transform group-hover:scale-110 transition-transform duration-700 relative z-10" loading="lazy" onerror="this.src=\'./assets/images/Globe-Valve-1.png\'">';
    echo '</div>';

    echo '<div class="p-6">';
    echo '<h3 class="text-lg font-bold text-secondary mb-2 cursor-pointer" onclick="window.location.href=\'cart.php?slug=' . $slug . '\'">' . $name . '</h3>';
    echo '<p class="text-gray-600 text-sm mb-3">' . $subtitle . '</p>';
    echo '<p class="text-2xl font-extrabold text-secondary mb-5">' . $price . '</p>';

    echo '<div class="flex items-center gap-2 mb-5 text-xs text-gray-600">';
    echo '<svg class="w-4 h-4 ' . $inStock . '" fill="currentColor" viewBox="0 0 20 20">' . $stockIcon . '</svg>';
    echo '<span class="font-semibold ' . $inStock . '">' . $stock . '</span>';
    echo '<span class="mx-1">&#8226;</span>';
    echo '<span>' . $cert . '</span>';
    echo '</div>';

    echo '<div class="flex gap-3">';

    echo '<button onclick="window.location.href=\'cart.php?slug=' . $slug . '\'" class="flex-1 bg-white border-2 border-secondary text-secondary hover:bg-secondary hover:text-white px-4 py-3 rounded-xl font-bold transition-all duration-300 text-sm">';
    echo 'View Details';
    echo '</button>';

    echo '<button onclick="openQuoteModal()" class="flex-1 bg-secondary text-white px-4 py-3 rounded-xl font-bold transition-all duration-300 text-sm">';
    echo 'Enquiry';
    echo '</button>';

    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Indian Traders Corp | Valves, Pipes & Fittings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#b71c1c',
                        secondary: '#0a2463',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">

<?php include 'assets/include/header.php'; ?>
<?php include 'assets/include/modal.php'; ?>

<!-- HERO -->
<section class="relative bg-secondary overflow-hidden flex items-center" style="min-height:500px;">
    <div class="container mx-auto px-4 py-20 relative z-10">
        <div class="max-w-5xl mx-auto text-center">
            <h1 class="text-5xl font-extrabold text-white mb-6">World-Class Industrial Solutions</h1>
            <p class="text-xl text-blue-100 mb-12 max-w-3xl mx-auto">
                ISO Certified Valves, Pipes &amp; Fittings for Your Industrial Excellence
            </p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl p-6" style="background:rgba(255,255,255,0.1);">
                    <div class="text-4xl font-bold text-yellow-400 mb-2"><?php echo count($allProducts); ?>+</div>
                    <div class="text-sm text-white font-semibold">Products</div>
                </div>
                <div class="rounded-2xl p-6" style="background:rgba(255,255,255,0.1);">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">55+</div>
                    <div class="text-sm text-white font-semibold">Years Trust</div>
                </div>
                <div class="rounded-2xl p-6" style="background:rgba(255,255,255,0.1);">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">ISO</div>
                    <div class="text-sm text-white font-semibold">Certified</div>
                </div>
                <div class="rounded-2xl p-6" style="background:rgba(255,255,255,0.1);">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">1000+</div>
                    <div class="text-sm text-white font-semibold">Happy Clients</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FILTER BAR -->
<section class="sticky top-0 z-40 bg-white shadow-lg border-b-2 border-gray-200">
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-wrap justify-center gap-3">
            <button id="btn-all"
                    class="px-6 py-3 rounded-xl font-bold text-sm bg-secondary text-white shadow-lg"
                    onclick="filterProducts('all')">All Products</button>
            <button id="btn-valves"
                    class="px-6 py-3 rounded-xl font-bold text-sm bg-white text-secondary border-2 border-gray-300 shadow-md"
                    onclick="filterProducts('valves')">Gate / Globe Valves</button>
            <button id="btn-ball"
                    class="px-6 py-3 rounded-xl font-bold text-sm bg-white text-secondary border-2 border-gray-300 shadow-md"
                    onclick="filterProducts('ball')">Ball / Check Valves</button>
            <button id="btn-pipes"
                    class="px-6 py-3 rounded-xl font-bold text-sm bg-white text-secondary border-2 border-gray-300 shadow-md"
                    onclick="filterProducts('pipes')">Pipes &amp; Fittings</button>
        </div>
    </div>
</section>

<!-- ALL PRODUCTS -->
<section id="all-section" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-extrabold text-gray-900 mb-4">All Industrial Products</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Browse our comprehensive range of premium quality industrial products</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ($allProducts as $p) { renderCard($p); } ?>
        </div>
    </div>
</section>

<!-- GATE / GLOBE VALVES -->
<section id="valves-section" class="py-16 bg-white" style="display:none;">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-extrabold text-gray-900 mb-4">Gate / Globe Valves</h2>
            <p class="text-xl text-gray-600">Premium quality gate and globe valves for industrial applications</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ($valves as $p) { renderCard($p); } ?>
        </div>
    </div>
</section>

<!-- BALL / CHECK VALVES -->
<section id="ball-section" class="py-16 bg-gray-50" style="display:none;">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-extrabold text-gray-900 mb-4">Ball / Check Valves</h2>
            <p class="text-xl text-gray-600">High-performance ball and check valves for precise control</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ($ball as $p) { renderCard($p); } ?>
        </div>
    </div>
</section>

<!-- PIPES & FITTINGS -->
<section id="pipes-section" class="py-16 bg-white" style="display:none;">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-extrabold text-gray-900 mb-4">Pipes &amp; Fittings</h2>
            <p class="text-xl text-gray-600">Complete range of pipes and fittings for all applications</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ($pipes as $p) { renderCard($p); } ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-24 bg-secondary text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-extrabold mb-6">Need Expert Assistance?</h2>
        <p class="text-xl text-blue-100 mb-12 max-w-3xl mx-auto">
            Our technical team is ready to help you select the perfect products for your requirements
        </p>
        <div class="flex flex-wrap justify-center gap-5">
            <a href="tel:+918468851160"
               class="bg-white text-secondary font-bold px-10 py-5 rounded-xl shadow-2xl text-lg">
                Call Now
            </a>
            <button onclick="openQuoteModal()"
                    class="bg-blue-700 text-white font-bold px-10 py-5 rounded-xl shadow-2xl text-lg border-2 border-white">
                Request Quote
            </button>
        </div>
    </div>
</section>

<?php include 'assets/include/footer.php'; ?>

<script>
function filterProducts(category) {
    var cats = ['all', 'valves', 'ball', 'pipes'];
    for (var i = 0; i < cats.length; i++) {
        var btn = document.getElementById('btn-' + cats[i]);
        var sec = document.getElementById(cats[i] + '-section');
        if (cats[i] === category) {
            btn.style.backgroundColor = '#0a2463';
            btn.style.color = '#ffffff';
            sec.style.display = 'block';
        } else {
            btn.style.backgroundColor = '#ffffff';
            btn.style.color = '#0a2463';
            sec.style.display = 'none';
        }
    }
    window.scrollTo(0, 600);
}

function openQuoteModal() {
    var modal = document.getElementById('quoteModal');
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
}
function closeQuoteModal() {
    var modal = document.getElementById('quoteModal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('quoteModal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) { closeQuoteModal(); }
        });
    }
});
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') { closeQuoteModal(); }
});
</script>
</body>
</html>