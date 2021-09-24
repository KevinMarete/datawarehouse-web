<?php

return [
  'charts' => [
    'children_index_testing_chart' => [
      'title' => 'Index Testing (Children < 15 Years)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'testing/index/children/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'adults_index_testing_chart' => [
      'title' => 'Index Testing (Adults 15+ Years)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'testing/index/adults/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'green'
        ]
      ]
    ],
    'totals_index_testing_chart' => [
      'title' => 'Index Testing (Totals)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'testing/index/totals/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'yellow'
        ]
      ]
    ],
    'reported_ft_chart' => [
      'title' => 'Reported Under FT Testing Points',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'testing/index/ft/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'reported_pns_chart' => [
      'title' => 'Reported Under PNS Testing Points',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'testing/index/pns/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen'
        ]
      ]
    ]
  ]
];
