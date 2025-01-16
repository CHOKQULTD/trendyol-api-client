<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Trendyol API Kimlik Bilgileri
    |--------------------------------------------------------------------------
    |
    | Trendyol hesabınızın API Key ve API Secret değerlerini .env dosyanızdan
    | alabilirsiniz. Bu değerler yoksa boş gelebilir, lütfen doldurmayı unutmayın.
    |
    */
    'api_key' => env('CHOKQU_TRENDYOL_API_KEY', ''),
    'api_secret' => env('CHOKQU_TRENDYOL_API_SECRET', ''),

    /*
    |--------------------------------------------------------------------------
    | Trendyol API URL
    |--------------------------------------------------------------------------
    |
    | Prod veya sandbox ortamları belirtebilirsiniz. Varsayılan olarak production
    | ortamı geliyor.
    |
    */
    'base_uri' => env('CHOKQU_TRENDYOL_BASE_URI', 'https://api.trendyol.com/sapigw/'),

];
