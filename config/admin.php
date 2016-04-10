<?php

return [
    'title' => 'Testdrive Admin Panel',
    'menu' => [
        '' => ['label' => 'Dashboard', 'icon' => 'dashboard'],
        'order' => ['label' => 'Orders', 'icon' => 'check-square-o'],
        'salon' => ['label' => 'Salons', 'icon' => 'map-marker'],
        'auto' => ['label' => 'Autos', 'icon' => 'car'],
        'dealer' => ['label' => 'Dealers', 'icon' => 'building']
    ],
    'model' => [
        'mark' => [
            'grid' => [
                'id' => 'Id',
                'name' => 'Name',
            ]
        ],
        'model' => [
            'grid' => [
                'id' => 'Id',
                'name' => 'Name',
                'mark.name' => 'Mark'
            ]
        ],
        'generation' => [
            'grid' => [
                'id' => 'Id',
                'name' => 'Name',
                'start_year_production' => 'Start Year',
                'end_year_production' => 'End Year',
                'model.name' => 'Model',
                'model.mark.name' => 'Mark'
            ]
        ],
    ]
];