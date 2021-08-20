<?php

return [
  'charts' => [
    'current_mmd_age_gender_chart' => [
      'title' => 'Multi-Month Dispensing (MMD) Uptake Cascades By Finder Age & Gender',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Current On ART',
          'dataUrl' => 'patient/on-art/current/agegroup-gender',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen'
        ],
        [
          'label' => 'On MMD',
          'dataUrl' => 'visit/on-mmd/agegroup-gender',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ],
      ]
    ]
  ]
];
