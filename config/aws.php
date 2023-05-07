<?php

use Aws\Laravel\AwsServiceProvider;

return [
    'S3' => [
        'region' => env('AWS_S3_REGION', 'ap-northeast-1'),
        'credentials' => [
            'key' => env('AWS_S3_ACCESSKEY'),
            'secret' => env('AWS_S3_SECRETKEY') 
        ],
        'bucket' => env('AWS_S3_BUCKET'),
        'url' => env('AWS_S3_URL')
    ]
];
