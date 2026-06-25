<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$products = App\Models\Product::all();
foreach($products as $product) {
    if(!empty($product->client_review_images)) {
        echo $product->slug . ": \n";
        print_r($product->client_review_images);
        echo "\n";
    }
}
