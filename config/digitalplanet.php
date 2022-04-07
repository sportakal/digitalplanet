<?php

return [
    'options' => [
        'corporate_code' => env('TRENDYOLEFATURAM_CORPORATE_CODE', 'CORPORATE'),
        'login_name' => env('TRENDYOLEFATURAM_LOGIN_NAME', 'wsadmintest'),
        'password' => env('TRENDYOLEFATURAM_PASSWORD', 'password'),
        'url' => env('TRENDYOLEFATURAM_URL', 'https://trendyolintegrationservicewithoutmtomtest.digitalplanet.com.tr/IntegrationService.asmx'),
    ],

    'template_codes' => [
        'earchive' => env('TRENDYOLEFATURAM_EARCHIVE_TEMPLATE_CODE', 'EARCHIVE'),
        'efatura' => env('TRENDYOLEFATURAM_EFATURA_TEMPLATE_CODE', 'MANUAL'),
    ],

    'sender' => [

    ],


];
