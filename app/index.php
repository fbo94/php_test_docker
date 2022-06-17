<?php
spl_autoload_register(function ($class) {
    @require(__DIR__.'/src/' . str_replace('\\','/',$class) . '.php');
});

$argumentOperation = array_pop($argv);

$calculator = new Calculator();

echo sprintf("Résultat de l'opération %s = %d",$argumentOperation, $calculator->calculate($argumentOperation)) ."\r\n";