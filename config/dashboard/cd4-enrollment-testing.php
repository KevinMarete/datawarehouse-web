<?php

return [
  'charts' => [
    'children_cd4_enrollment_testing_chart' => [
      'title' => 'CD4 Enrollment Testing (Children 0-9 Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'testing/cd4/children/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen'
        ]
      ]
    ],
    'adolescents_cd4_enrollment_testing_chart' => [
      'title' => 'CD4 Enrollment Testing (Adolescents 10-19 Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'testing/cd4/adolescents/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen'
        ]
      ]
    ],
    'adults_cd4_enrollment_testing_chart' => [
      'title' => 'CD4 Enrollment Testing (Adults 20+ Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'testing/cd4/adults/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen'
        ]
      ]
    ],
    'totals_cd4_enrollment_testing_chart' => [
      'title' => 'CD4 Enrollment Testing (Total)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'testing/cd4/totals/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen'
        ]
      ]
    ]
  ]
];
