<?php
function optimizeImage($source, $destination, $quality) {
    // Load the image
    $image = imagecreatefromjpeg($source);

    // Save optimized image
    imagejpeg($image, $destination, $quality);

    // Free memory
    imagedestroy($image);
}

// Example usage
$source = "uploads/large_image.jpg";
$destination = "uploads/optimized_image.jpg";
$quality = 75; // 0 (worst) to 100 (best)

optimizeImage($source, $destination, $quality);
?>
