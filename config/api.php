<?php

return [
    'max_per_page' => 100,

    'mark' => [
        'class' => \App\Models\Auto\Mark::class
    ],
    'model' => [
        'class' => \App\Models\Auto\Model::class,
        'with' => 'mark'
    ],
    'generation' => [
        'class' => \App\Models\Auto\Generation::class,
        'with' => ['model', 'model.mark']
    ],
];