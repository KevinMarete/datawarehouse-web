<?php

return [
  'charts' => [
    'current_chart' => [
      'title' => 'Current on ART vs Current on Care',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Current On ART',
          'dataUrl' => 'patient/on-art/current/agegroup',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ],
        [
          'label' => 'Current On Care',
          'dataUrl' => 'patient/on-care/current/agegroup',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue',
        ],
      ]
    ],
    'new_chart' => [
      'title' => 'New on ART vs New on Care',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'New On ART',
          'dataUrl' => 'patient/on-art/new/agegroup',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ],
        [
          'label' => 'New On Care',
          'dataUrl' => 'patient/on-care/new/agegroup',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue',
        ],
      ]
    ],
    'new_age_gender_chart' => [
      'title' => 'New on Care Vs New on ART By Finer Age & Gender',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'New On ART',
          'dataUrl' => 'patient/on-art/new/agegroup-gender',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ],
        [
          'label' => 'New On Care',
          'dataUrl' => 'patient/on-care/new/agegroup-gender',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue',
        ],
      ]
    ],
    'current_age_gender_chart' => [
      'title' => 'Current on Care Vs Current on ART By Finer Age & Gender',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Current On ART',
          'dataUrl' => 'patient/on-art/current/agegroup-gender',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen',
          'type' => 'bar'
        ],
        [
          'label' => 'Current On Care',
          'dataUrl' => 'patient/on-care/current/agegroup-gender',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue',
          'type' => 'bar'
        ],
        [
          'label' => 'Prop. On ART',
          'dataUrl' => 'patient/on-art/current/prop',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'purple',
          'type' => 'line',
          'fill' => 'false'
        ],
      ]
    ],
  ]
];
