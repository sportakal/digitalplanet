<?php

$options = require './options.php';

$CancelEArchiveInvoiceRequest = new \Sportakal\Digitalplanet\Requests\CancelEArchiveInvoiceRequest("1234567890");

$response = \Sportakal\Digitalplanet\Make::exec($CancelEArchiveInvoiceRequest, $options);

if ($response->isSuccessful()) {
    sdebug($response->getResult());
} else {
    echo $response->getStatusDesc();
}
