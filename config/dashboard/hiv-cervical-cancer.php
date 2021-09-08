<?php

return [
  'charts' => [
    'cervical_cancer_cascade_chart' => [
      'title' => 'HIV/Cervical Cancer Cascade',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'cohort/children/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen'
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
          'dataUrl' => 'cohort/adolescents/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen'
        ]
      ]
    ]
  ]
];
