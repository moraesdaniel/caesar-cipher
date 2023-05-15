<?php

require('CaesarCipher.php');

$caesarCipher = new CaesarCipher();
$textToEncrypt = 'd86m@gmail.com';
$encryptedTextExpected = 'h86q@kqemp.gsq';
$key = 4;

if ($caesarCipher->encrypt($textToEncrypt, $key) == $encryptedTextExpected) {
    echo "The cryptography is working." . PHP_EOL;
} else {
    echo "### ERRO ### The cryptography is not working." . PHP_EOL;
    echo $caesarCipher->encrypt($textToEncrypt, $key);
}

if ($caesarCipher->decrypt($encryptedTextExpected, $key) == $textToEncrypt) {
    echo "The decryptography is working." . PHP_EOL;
} else {
    echo "### ERRO ### The decryptography is not working." . PHP_EOL;
}

$key = 30;

if ($caesarCipher->encrypt($textToEncrypt, $key) == $encryptedTextExpected) {
    echo "The cryptography is working." . PHP_EOL;
} else {
    echo "### ERRO ### The cryptography is not working." . PHP_EOL;
    echo $caesarCipher->encrypt($textToEncrypt, $key);
}

if ($caesarCipher->decrypt($encryptedTextExpected, $key) == $textToEncrypt) {
    echo "The decryptography is working." . PHP_EOL;
} else {
    echo "### ERRO ### The decryptography is not working." . PHP_EOL;
}