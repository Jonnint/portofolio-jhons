<?php
require 'vendor/autoload.php';

// Check what methods exist on Table
$table = new ReflectionClass('Filament\Tables\Table');
$methods = $table->getMethods(ReflectionMethod::IS_PUBLIC);
foreach ($methods as $m) {
    $name = $m->getName();
    if (str_contains(strtolower($name), 'action') || str_contains(strtolower($name), 'record') || str_contains(strtolower($name), 'toolbar') || str_contains(strtolower($name), 'bulk') || str_contains(strtolower($name), 'header')) {
        echo $name . '()' . PHP_EOL;
    }
}
