<?php

return [
    'title' => 'Testdrive Admin Panel',
    'menu' => [
        '' => ['label' => 'Dashboard', 'icon' => 'dashboard'],
        'order' => ['label' => 'Orders', 'icon' => 'check-square-o'],
        'salon' => ['label' => 'Salons', 'icon' => 'map-marker'],
        'auto' => ['label' => 'Autos', 'icon' => 'car'],
        'dealer' => ['label' => 'Dealers', 'icon' => 'building'],
        'mark' => ['label' => 'Marks', 'icon' => 'dot-circle-o'],
        'model' => ['label' => 'Models', 'icon' => 'dot-circle-o'],
        'generation' => ['label' => 'Generation', 'icon' => 'dot-circle-o'],
        'body' => ['label' => 'Body Types', 'icon' => 'dot-circle-o'],
        'gearbox' => ['label' => 'Gearbox Types', 'icon' => 'dot-circle-o'],
    ],
    'model' => [
        'mark' => [
            'title' => 'Mark',
            'grid' => [
                'id' => 'Id',
                'name' => 'Name',
            ],
            'form' => [
                ['type' => 'text', 'name' => 'name', 'label' => 'Name', 'required' => true]
            ]
        ],
        'model' => [
            'title' => 'Model',
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