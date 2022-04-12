<?php

require_once __DIR__ . '/../vendor/autoload.php';


$options = new \Sportakal\Digitalplanet\Options('CORPORATECODE',
    'wsadmintest',
    'password',
    'https://trendyolintegrationservicewithoutmtomtest.digitalplanet.com.tr/IntegrationService.asmx');

return $options;
