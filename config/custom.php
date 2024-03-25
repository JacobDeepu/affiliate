<?php

return [

    /**
     * Admin mail address
     */
    'admin_mail' => env('ADMIN_MAIL', 'admin@example.com'),

    /**
     * Referral Url
     */
    'referral_url' => env('REFERRAL_URL', config('url')),

    /**
     * External Url
     */
    'external_url' => env('EXTERNAL_URL', config('url')),
    
];
