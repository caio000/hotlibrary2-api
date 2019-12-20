<?php
return [
    [
        'class' => 'yii\rest\UrlRule',
        'controller' => [
            'users' => 'app/users',
        ],
        'extraPatterns' => [
            'POST,OPTIONS registration' => 'registration',
        ],
    ],
    [
        'class' => 'yii\rest\UrlRule',
        'controller' => [
            'cities' => 'app/cities',
            'neighborhoods' => 'app/neighborhoods',
            'states' => 'app/states',
        ],
    ],
];
