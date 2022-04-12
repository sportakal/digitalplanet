<?php

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = (Dotenv\Dotenv::createImmutable(__DIR__ . '/../'))->load();

$corporateCode = $_ENV['CORPORATE_CODE'];
$loginName = $_ENV['LOGIN_NAME'];
$password = $_ENV['PASSWORD'];
$url = $_ENV['URL'];

$options = new \Sportakal\Digitalplanet\Options($corporateCode, $loginName, $password, $url);

return $options;
