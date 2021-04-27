<?php

$config=[
    'id'=>'proyecto-residuo',
    'basePath'=>dirname(__DIR__),
    'modules'=> require __DIR__.'/modules.php',
    'bootstrap'=>[],
    'aliases'=>[
        '@bower'=>'@vendor/bower-asset'
    ],
    'components'=>[
        'db'=>require __DIR__.'/db.php',
        'response'=>[
            'format'=>yii\web\Response::FORMAT_JSON,
            'charset'=>'utf8'
        ],
        'request'=>[
            'cookieValidationKey'=>'proyecto-residuo',
            'parsers'=>[
                'application/json'=>'yii\web\JsonParser'
            ]
        ],
        'user'=>[
            'identityClass'=>'app\models\user',
            'enableAutoLogin'=>true
        ],
        'urlManager'=>[
            'enablePrettyUrl'=>true,
            'enableStrictParsing'=>true,
            'showScriptName'=>false,
            'rules'=>require __DIR__.'/routes.php'
        ]
    ]
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1']
    ];
}

return $config;