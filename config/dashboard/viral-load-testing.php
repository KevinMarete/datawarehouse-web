<?php

return [
  'charts' => [
    'children_targeted_routine_vl_cascades_chart' => [
      'title' => 'Targeted vs Routine Viral Load Cascades (Children 0-9 Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'testing/vl/children/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen'
        ]
      ]
    ],
    'adults_targeted_routine_vl_cascades_chart' => [
      'title' => 'Targeted vs Routine Viral Load Cascades (Adolescents 10-19 Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'testing/vl/adolescents/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen'
        ]
      ]
    ],
  ]
];
