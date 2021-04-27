<?php

return [
    [
        'class' => 'yii\rest\UrlRule',
        'pluralize' => false,
        'controller' =>[
            'residuo'=>'v1/residuos'
        ],
        'prefix'=>'/v1/<proyecto_id:\\d>'
        
    ]
];
