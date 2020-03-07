<?php
return [
    'prefix' => [
        'backend'=> 'admin',
        'frontend'=> 'website'
    ],
    'menu' =>[
        'label' => 'Customer',
        'name' => 'Customer',
        'icon' => 'fa-home',
        'childrens' => [
            [
                'label' => 'List',
                'name' => 'List',
                'icon' => 'fa-home',
            ],
            [
                'label' => 'Add new',
                'name' => 'AddCustomer',
                'icon' => 'fa-home',
            ]
        ]
    ]
]

?>
