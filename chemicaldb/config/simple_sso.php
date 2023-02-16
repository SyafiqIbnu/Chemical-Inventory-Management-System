<?php

return [
    'lifetime'=>env('SIMPLE_SSO_LIFETIME',3600),
    'cookie_name'=>env('SIMPLE_SSO_COOKIE_NAME','lppkn_sso_public'),
    'cookie_domain' => env('SIMPLE_SSO_COOKIE_DOMAIN',''),
    'use_https'=>env('SIMPLE_SSO_USE_HTTPS',false),
    'user_fields'=>['name','uid','email','mykad','phone'],
];
