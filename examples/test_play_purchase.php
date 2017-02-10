<?php

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

$root = realpath(dirname(dirname(__FILE__)));
$library = "$root/library";

$path = array($library, get_include_path());
set_include_path(implode(PATH_SEPARATOR, $path));

require_once $root . '/vendor/autoload.php';

use ReceiptValidator\GooglePlay\PurchaseValidator;

// purchase data
$responseData = ''; // The | delimited response data from the licensing server
$signature = ''; // The signature provided with the response data (Base64)

$publicKey = 'xxxxx';
$packageName = 'xxxxx';

$validator = new PurchaseValidator($publicKey, $packageName);

try {
    $valid = $validator->verify($responseData, $signature);
    var_dump($valid);
} catch (Exception $e) {
  echo 'got error = ' . $e->getMessage() . PHP_EOL;
}
