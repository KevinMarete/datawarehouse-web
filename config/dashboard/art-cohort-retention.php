<?php

return [
  'charts' => [
    'children_cohort_chart' => [
      'title' => '12 Months ART Cohort Retention Cascades (Children 0-9 Years)',
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
    'adolescents_cohort_chart' => [
      'title' => '12 Months ART Cohort Retention Cascades (Adolescents 10-19 Years)',
      'type' => 'bar',
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
    ],
    'adults_cohort_chart' => [
      'title' => '12 Months ART Cohort Retention Cascades (Adults 20+ Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'cohort/adult/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen'
        ]
      ]
    ],
    'totals_cohort_chart' => [
      'title' => '12 Months ART Cohort Retention Cascades (Totals)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'cohort/totals/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen'
        ]
      ]
    ]
  ]
];
