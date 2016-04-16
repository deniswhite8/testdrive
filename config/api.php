<?php

return [
    'max_per_page' => 100,

    'order' => [
        'class' => \App\Models\Order::class,
        'with' => ['salon', 'mark', 'model', 'generation'],
        'search' => ['id', 'contacts', 'datetime', 'created_at',
            'salon.name', 'mark.name', 'model.name', 'generation.name']
    ],

    'salon' => [
        'class' => \App\Models\Salon::class,
        'with' => ['city', 'dealer'],
        'search' => ['id', 'name', 'address', 'phone', 'email',
            'city.name', 'dealer.name']
    ],

    'auto' => [
        'class' => App\Models\Auto::class,
        'with' => ['mark', 'model', 'generation', 'body', 'gearbox'],
        'search' => ['id', 'mark.name', 'model.name', 'generation.name']
    ],

    'dealer' => [
        'class' => \App\Models\Dealer::class,
        'search' => ['id', 'name']
    ],

    'city' => [
        'class' => \App\Models\City::class,
        'search' => ['id', 'name']
    ],

    'mark' => [
        'class' => \App\Models\Auto\Mark::class,
        'search' => ['id', 'name']
    ],

    'model' => [
        'class' => \App\Models\Auto\Model::class,
        'with' => 'mark',
        'search' => ['id', 'name', 'mark.name']
    ],

    'generation' => [
        'class' => \App\Models\Auto\Generation::class,
        'with' => 'model.mark',
        'search' => ['id', 'name', 'start_year_production',
            'end_year_production', 'model.name', 'mark.name']
    ],

    'body' => [
        'class' => \App\Models\Auto\Body::class,
        'search' => ['id', 'name']
    ],

    'gearbox' => [
        'class' => \App\Models\Auto\Gearbox::class,
        'search' => ['id', 'name']
    ]
];