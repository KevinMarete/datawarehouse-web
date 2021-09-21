<?php

return [
  'charts' => [
    'children_targeted_routine_vl_cascades_chart' => [
      'title' => 'Targeted vs Routine Viral Load Cascades (Children 0-9 Years)',
      'type' => 'horizontalBar',
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
    'adolescents_targeted_routine_vl_cascades_chart' => [
      'title' => 'Targeted vs Routine Viral Load Cascades (Adolescents 10-19 Years)',
      'type' => 'horizontalBar',
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
