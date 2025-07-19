<?php

// Set correct Laravel base path
$basePath = realpath(__DIR__ . '/../');

// Load Laravel
require $basePath . '/vendor/autoload.php';
$app = require_once $basePath . '/bootstrap/app.php';

// Handle the request
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

echo "<pre>";

// Run Artisan commands
try {
    \Artisan::call('config:clear');
    echo "✔ config:clear\n";

    \Artisan::call('route:clear');
    echo "✔ route:clear\n";

    \Artisan::call('view:clear');
    echo "✔ view:clear\n";

    \Artisan::call('cache:clear');
    echo "✔ cache:clear\n";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
}

echo "</pre>";