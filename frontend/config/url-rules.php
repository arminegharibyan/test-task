<?php
$rules = [
    [
        'pattern' => '/',
        'route' => 'site/index',
        'suffix' =>'',
    ],
    [
        'pattern' => '<controller>/<action>',
        'route' => '<controller>/<action>',
        'suffix' =>'',
    ],
    [
        'pattern' => '<module>/<controller>/<action>/<id:\d+>',
        'route' => '<module>/<controller>/<action>',
        'suffix' =>'',
    ],
    [
        'pattern' => '<module>/<controller>/<action>',
        'route' => '<module>/<controller>/<action>',
        'suffix' =>'',
    ],

];

return $rules;