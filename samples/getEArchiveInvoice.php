<?php

$options = require './options.php';

$GetEArchiveInvoiceRequest = new \Sportakal\Digitalplanet\Requests\GetEArchiveInvoiceRequest('TRL2022000000003', 'INVOICEID', 'PDF');

$response = \Sportakal\Digitalplanet\Make::exec($GetEArchiveInvoiceRequest, $options);


if ($response->isSuccessful()) {
    header('Content-Type: application/pdf');
    echo base64_decode($response->getValue('ReturnValue'));
} else {
    echo $response->getStatusDesc();
}
