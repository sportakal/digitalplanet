<?php

$options = require './options.php';

$CheckCustomerTaxIdRequest = new \Sportakal\Digitalplanet\Requests\CheckCustomerTaxIdRequest(123445678901);

$response = \Sportakal\Digitalplanet\Make::exec($CheckCustomerTaxIdRequest, $options);

if ($response->isSuccessful()) {
    sdebug($response->getResult());
} else {
    echo $response->getStatusDesc();
}
