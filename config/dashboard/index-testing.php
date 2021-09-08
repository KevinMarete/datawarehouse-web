<?php

return [
  'charts' => [
    'children_index_testing_chart' => [
      'title' => 'Index Testing (Children < 15 Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'indextesting/children/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'adults_index_testing_chart' => [
      'title' => 'Index Testing (Adults 15+ Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'indextesting/adults/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'green'
        ]
      ]
    ],
    'totals_new_on_ipt_chart' => [
      'title' => 'Index Testing (Totals)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'indextesting/totals/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'yellow'
        ]
      ]
    ],
    'children_current_ever_on_ipt_chart' => [
      'title' => 'Index Testing (Children < 15 Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'indextesting/children/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'adults_current_ever_on_ipt_chart' => [
      'title' => 'Index Testing (Adults 15+ Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'indextesting/adults/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'green'
        ]
      ]
    ],
    'totals_current_ever_on_ipt_chart' => [
      'title' => 'Index Testing (Totals)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'indextesting/totals/category',
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
          'dataUrl' => 'indextesting/ft/category',
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
          'dataUrl' => 'indextesting/pns/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen'
        ]
      ]
    ]
  ]
];
