<?php

$options = require './options.php';

$GetInvoicePDFByInvoiceIdWithoutDirectionRequest = new \Sportakal\Digitalplanet\Requests\GetInvoicePDFByInvoiceIdWithoutDirectionRequest('TRN2022000000041');

$response = \Sportakal\Digitalplanet\Make::exec($GetInvoicePDFByInvoiceIdWithoutDirectionRequest, $options);

if ($response->isSuccessful()) {
    header('Content-Type: application/pdf');
    echo base64_decode($response->getValue('ReturnValue'));
} else {
    echo $response->getStatusDesc();
}
