<?php

$photo = $_POST['img'];
// Load the image into $img
$img = imagecreatefrompng($photo);
// Because your chosen image has transparency, we need to make sure
// we save the alpha channel information.
imageSaveAlpha($img, true);

// Filter the image to mid-red (RGB values 127, 0, 0) using the
// "colourize" filter. This works nicely with your chosen image
// because it's a shape with a uniform dark colour.
imagefilter($img, IMG_FILTER_COLORIZE, 255, 0, 0);  

// Make sure our content type is PNG, otherwise it'll just
// display the image data as text.
header('Content-Type: image/png');

// Output to browser.
return imagepng($img);

?>