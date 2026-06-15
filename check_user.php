<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
$user = \App\Models\User::first();
if ($user) {
    echo "User exists: " . $user->name . " | " . $user->email . " | " . $user->profile_image;
} else {
    echo "No user exists.";
}
