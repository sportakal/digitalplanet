<?php

$options = require './options.php';

$GetNewInvoiceIdRequest = (new \Sportakal\Digitalplanet\Requests\GetNewInvoiceIdRequest('2022', '12345', '0', 'MANUAL'));

$response = \Sportakal\Digitalplanet\Make::exec($GetNewInvoiceIdRequest, $options);

if ($response->isSuccessful()) {
    sdebug($response->getResult());
} else {
    echo $response->getStatusDesc();
}
