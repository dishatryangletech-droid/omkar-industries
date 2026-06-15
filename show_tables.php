<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
$tables = DB::select('SHOW TABLES');
foreach ($tables as $table) {
    $prop = "Tables_in_" . env('DB_DATABASE');
    echo $table->$prop . PHP_EOL;
}
