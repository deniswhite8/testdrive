<?php

return [
    'title' => 'Testdrive Admin Panel',
    'menu' => [
        '' => ['label' => 'Dashboard', 'icon' => 'dashboard'],
        'order' => ['label' => 'Orders', 'icon' => 'check-square-o'],
        'salon' => ['label' => 'Salons', 'icon' => 'map-marker'],
        'auto' => ['label' => 'Autos', 'icon' => 'car'],
        'dealer' => ['label' => 'Dealers', 'icon' => 'building'],
        'city' => ['label' => 'Cities', 'icon' => 'home'],
        'mark' => ['label' => 'Marks', 'icon' => 'dot-circle-o'],
        'model' => ['label' => 'Models', 'icon' => 'dot-circle-o'],
        'generation' => ['label' => 'Generation', 'icon' => 'dot-circle-o'],
        'body' => ['label' => 'Body Types', 'icon' => 'dot-circle-o'],
        'gearbox' => ['label' => 'Gearbox Types', 'icon' => 'dot-circle-o'],
    ],
    'model' => [
        'order' => [
            'title' => 'Order',
            'grid' => [
                'id' => 'Id',
                'contacts' => 'Contacts',
                'datetime' => 'DateTime',
                'salon.name' => 'Salon',
                'mark.name' => 'Mark',
                'model.name' => 'Model',
                'generation.name' => 'Generation',
                'created_at' => 'Created At'
            ],
            'form' => [
                ['type' => 'select', 'name' => 'mark_id', 'label' => 'Mark', 'model' => 'mark', 'option' => 'name',
                    'required' => true],
                ['type' => 'select', 'name' => 'model_id', 'label' => 'Model', 'model' => 'model', 'option' => 'name',
                    'required' => true],
                ['type' => 'select', 'name' => 'generation_id', 'model' => 'generation', 'option' => 'name',
                    'label' => 'Generation'],
                ['type' => 'select', 'name' => 'salon_id', 'label' => 'Salon', 'model' => 'salon', 'option' => 'name',
                    'required' => true],
                ['type' => 'textarea', 'name' => 'contacts', 'label' => 'Contacts', 'required' => true],
                ['type' => 'datetime', 'name' => 'datetime', 'label' => 'Datetime', 'required' => true],
                ['type' => 'textarea', 'name' => 'comment', 'label' => 'Comment']
            ]
        ],

        'salon' => [
            'title' => 'Salon',
            'grid' => [
                'id' => 'Id',
                'name' => 'Name',
                'address' => 'Address',
                'phone' => 'Phone',
                'email' => 'Email',
                'dealer.name' => 'Dealer',
                'city.name' => 'City'
            ],
            'form' => [
                ['type' => 'text', 'name' => 'name', 'label' => 'Name', 'required' => true],
                ['type' => 'textarea', 'name' => 'description', 'label' => 'Description'],
                ['type' => 'text', 'name' => 'address', 'label' => 'Address', 'required' => true],
                ['type' => 'text', 'name' => 'phone', 'label' => 'Phone'],
                ['type' => 'text', 'name' => 'email', 'label' => 'Email', 'validation' => 'email'],
                ['type' => 'text', 'name' => 'work_time', 'label' => 'Work Time'],
                ['type' => 'select', 'name' => 'dealer_id', 'label' => 'Dealer', 'model' => \App\Models\Dealer::class,
                    'option' => 'name', 'required' => true],
                ['type' => 'select', 'name' => 'city_id', 'label' => 'City', 'model' => \App\Models\City::class,
                    'option' => 'name', 'required' => true],
                ['type' => 'map', 'name' => ['latitude', 'longitude'], 'label' => 'Map', 'required' => true],
                ['type' => 'image', 'name' => 'image', 'label' => 'Image']
            ]
        ],

        'auto' => [
            'title' => 'Auto',
            'grid' => [
                'id' => 'Id',
                'mark.name' => 'Mark',
                'model.name' => 'Model',
                'generation.name' => 'Generation',
                'body.name' => 'Body',
                'gearbox.name' => 'Gearbox',
                'mileage' => 'Mileage'
            ]
        ],

        'dealer' => [
            'title' => 'Dealer',
            'grid' => [
                'id' => 'Id',
                'name' => 'Name'
            ],
            'form' => [
                ['type' => 'text', 'name' => 'name', 'label' => 'Name', 'required' => true],
                ['type' => 'textarea', 'name' => 'description', 'label' => 'Description'],
                ['type' => 'image', 'name' => 'image', 'label' => 'Image']
            ]
        ],

        'city' => [
            'title' => 'City',
            'grid' => [
                'id' => 'Id',
                'name' => 'Name'
            ],
            'form' => [
                ['type' => 'text', 'name' => 'name', 'label' => 'Name', 'required' => true]
            ]
        ],

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
            'title' => 'Generation',
            'grid' => [
                'id' => 'Id',
                'name' => 'Name',
                'start_year_production' => 'Start Year',
                'end_year_production' => 'End Year',
                'model.name' => 'Model',
                'model.mark.name' => 'Mark'
            ]
        ],

        'body' => [
            'title' => 'Body Type',
            'grid' => [
                'id' => 'Id',
                'name' => 'Name'
            ],
            'form' => [
                ['type' => 'text', 'name' => 'name', 'label' => 'Name', 'required' => true]
            ]
        ],

        'gearbox' => [
            'title' => 'Gearbox Type',
            'grid' => [
                'id' => 'Id',
                'name' => 'Name'
            ],
            'form' => [
                ['type' => 'text', 'name' => 'name', 'label' => 'Name', 'required' => true]
            ]
        ]
    ]
];