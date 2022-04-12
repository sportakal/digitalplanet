<?php
$options = require './options.php';

$GetFormsAuthenticationTicketRequest = (new \Sportakal\Digitalplanet\Requests\GetFormsAuthenticationTicketRequest($options));
$response = \Sportakal\Digitalplanet\Make::exec($GetFormsAuthenticationTicketRequest, $options);


sdebug($response->getResult());

