<?php

return [
  'charts' => [
    'overall_positive_testing_gender' => [
      'title' => 'Overall HIV+ Testing By Gender',
      'type' => 'pie',
      'labels' => [],
      'datasets' => [
        [
          'dataUrl' => 'patient/tested/positive/gender',
          'data' => [],
          'backgroundColor' => ['blue', 'orange'],
        ],
      ]
    ],
    'total_tested_positive' => [
      'title' => 'Total Tested HIV+',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [ 
          'label' => 'Patients',
          'dataUrl' => 'patient/tested/positive/agegroup-gender',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
  ]
];
