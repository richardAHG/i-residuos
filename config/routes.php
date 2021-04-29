<?php

return [
    [
        'class' => 'yii\rest\UrlRule',
        'pluralize' => false,
        'controller' =>[
            'residuo'=>'v1/residuos'
        ],
        'prefix'=>'/v1/<proyecto_id:\\d>'
        
    ],
    [
        'class' => 'yii\rest\UrlRule',
        'pluralize' => false,
        'controller' =>[
            'parametro'=>'v1/parametros'
        ],
        'prefix'=>'/v1/<proyecto_id:\\d>'
        
    ],
    [
        'class' => 'yii\rest\UrlRule',
        'pluralize' => false,
        'controller' =>[
            'recipiente'=>'v1/recipientes'
        ],
        'prefix'=>'/v1/<proyecto_id:\\d>'
        
    ],
    [
        'class' => 'yii\rest\UrlRule',
        'pluralize' => false,
        'controller' =>[
            'residuo-clases'=>'v1/residuoclases'
        ],
        'prefix'=>'/v1/<proyecto_id:\\d>'
    ],
    [
        'class' => 'yii\rest\UrlRule',
        'pluralize' => false,
        'controller' =>[
            'residuo-colores'=>'v1/colores'
        ],
        'prefix'=>'/v1/<proyecto_id:\\d>'
    ]
];
