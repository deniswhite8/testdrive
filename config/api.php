<?php

return [
    'max_per_page' => 100,

    'mark' => [
        'class' => \App\Models\Auto\Mark::class,
        'search' => ['id', 'name']
    ],
    'model' => [
        'class' => \App\Models\Auto\Model::class,
        'with' => 'mark',
        'search' => ['id', 'name', 'model.id', 'model.name']
    ],
    'generation' => [
        'class' => \App\Models\Auto\Generation::class,
        'with' => 'model.mark',
        'search' => ['id', 'name', 'start_year_production', 'end_year_production',
            'model.id', 'model.name', 'mark.id', 'mark.name']
    ],
];