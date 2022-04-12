<?php

$options = require './options.php';

$GetInvoicePDFRequest = (new \Sportakal\Digitalplanet\Requests\GetInvoicePDFRequest('4292B20F-7C06-F871-974E-8000E77AD64F'));

$response = \Sportakal\Digitalplanet\Make::exec($GetInvoicePDFRequest, $options);

if ($response->isSuccessful()) {
    header('Content-Type: application/pdf');
    echo base64_decode($response->getValue('ReturnValue'));
} else {
    echo $response->getStatusDesc();
}
