<?php
session_start();
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']) {
    header('Location: index.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    // Change these credentials as needed
    if ($username === 'admin' && $password === 'itc@2024') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user'] = $username;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Invalid username or password!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Indian Traders Corp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { colors: { primary: '#b71c1c', secondary: '#0a2463' } } }
        }
    </script>
    <style>
        body { background: linear-gradient(135deg, #0a2463 0%, #1a3a7a 50%, #0a2463 100%); min-height: 100vh; }
        .login-card { backdrop-filter: blur(20px); background: rgba(255,255,255,0.95); }
        .logo-ring { animation: spin-slow 8s linear infinite; }
        @keyframes spin-slow { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        .input-field:focus { box-shadow: 0 0 0 3px rgba(10,36,99,0.15); }
        .bg-pattern { background-image: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.05) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(183,28,28,0.1) 0%, transparent 40%); }
    </style>
</head>
<body class="bg-pattern flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md">
        <!-- Logo Area -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-2xl shadow-2xl mb-4 relative">
                <div class="absolute inset-2 border-2 border-dashed border-secondary/30 rounded-xl logo-ring"></div>
                <svg class="w-10 h-10 text-secondary relative z-10" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h1 class="text-2xl font-extrabold text-white">Indian Traders Corp</h1>
            <p class="text-blue-200 text-sm mt-1">Admin Control Panel</p>
        </div>

        <!-- Login Card -->
        <div class="login-card rounded-2xl shadow-2xl p-8">
            <h2 class="text-xl font-bold text-secondary mb-6 text-center">Sign In to Dashboard</h2>

            <?php if ($error): ?>
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-5 flex items-center gap-2 text-sm font-semibold">
                <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                <?php echo htmlspecialchars($error); ?>
            </div>
            <?php endif; ?>

            <form method="POST" class="space-y-5">
                <div>
                    <label class="block text-xs font-bold text-gray-600 mb-2 uppercase tracking-wider">Username</label>
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <input type="text" name="username" placeholder="Enter username"
                               class="input-field w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl text-sm font-semibold text-gray-800 focus:border-secondary focus:outline-none transition-all"
                               value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>" required>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-600 mb-2 uppercase tracking-wider">Password</label>
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        <input type="password" name="password" placeholder="Enter password"
                               class="input-field w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl text-sm font-semibold text-gray-800 focus:border-secondary focus:outline-none transition-all"
                               required>
                    </div>
                </div>

                <button type="submit"
                        class="w-full bg-secondary hover:bg-blue-900 text-white font-bold py-3.5 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl text-sm flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                    Login to Admin Panel
                </button>
            </form>

            <div class="mt-6 pt-5 border-t border-gray-100 text-center">
                <p class="text-xs text-gray-400">Default: admin / itc@2024</p>
                <p class="text-xs text-gray-400 mt-1">Change in <code class="bg-gray-100 px-1 rounded">admin/login.php</code></p>
            </div>
        </div>

        <p class="text-center text-blue-200/60 text-xs mt-6">© 2024 Indian Traders Corp. All rights reserved.</p>
    </div>
</body>
</html>
