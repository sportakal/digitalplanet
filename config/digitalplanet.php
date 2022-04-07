<?php

return [
    'options' => [
        'corporate_code' => env('DIGITALPLANET_CORPORATE_CODE', 'CORPORATE'),
        'login_name' => env('DIGITALPLANET_LOGIN_NAME', 'wsadmintest'),
        'password' => env('DIGITALPLANET_PASSWORD', 'password'),
        'url' => env('DIGITALPLANET_URL', 'https://trendyolintegrationservicewithoutmtomtest.digitalplanet.com.tr/IntegrationService.asmx'),
    ],

    'template_codes' => [
        'earchive' => env('DIGITALPLANET_EARCHIVE_TEMPLATE_CODE', 'EARCHIVE'),
        'efatura' => env('DIGITALPLANET_EFATURA_TEMPLATE_CODE', 'MANUAL'),
    ],

    'sender' => [

    ],


];
