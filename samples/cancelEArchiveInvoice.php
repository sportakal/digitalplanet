<?php

$options = require './options.php';

$CancelEArchiveInvoiceRequest = new \Sportakal\Digitalplanet\Requests\CancelEArchiveInvoiceRequest("TRY2023000000043");

$response = \Sportakal\Digitalplanet\Make::exec($CancelEArchiveInvoiceRequest, $options);

if ($response->isSuccessful()) {
    sdebug($response->getResult());
} else {
    echo $response->getStatusDesc();
}
