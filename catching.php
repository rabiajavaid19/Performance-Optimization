<?php
// Enable output caching
$cache_file = 'cache/' . md5($_SERVER['REQUEST_URI']) . '.html';
$cache_time = 3600; // Cache for 1 hour

// Serve cached file if it exists and is recent
if (file_exists($cache_file) && time() - filemtime($cache_file) < $cache_time) {
    readfile($cache_file);
    exit;
}

// Start output buffering
ob_start();

// Generate dynamic content here (e.g., include optimized_search.php)
include 'optimized_search.php';

// Save output to cache
file_put_contents($cache_file, ob_get_contents());
ob_end_flush();
?>
