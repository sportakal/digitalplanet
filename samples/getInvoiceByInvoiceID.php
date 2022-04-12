<?php

$options = require './options.php';

$GetInvoiceByInvoiceIDRequest = new \Sportakal\Digitalplanet\Requests\GetInvoiceByInvoiceIDRequest('TRN2022000000041', 'Outgoing');

$response = \Sportakal\Digitalplanet\Make::exec($GetInvoiceByInvoiceIDRequest, $options);


if ($response->isSuccessful()) {
    sdebug($response->getResult());
} else {
    echo $response->getStatusDesc();
}
