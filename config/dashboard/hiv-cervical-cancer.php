<?php

return [
  'charts' => [
    'cervical_cancer_cascade_chart' => [
      'title' => 'HIV/Cervical Cancer Cascade',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'screening/cervical/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange'
        ]
      ]
    ],
    'cervical_cancer_screening_visit_type_chart' => [
      'title' => 'Cervical Cancer Screening Visit Type',
      'type' => 'pie',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'screening/cervical/visit-type',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen'
        ]
      ]
    ]
  ]
];
