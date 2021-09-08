<?php

return [
  'charts' => [
    'children_new_on_ipt_chart' => [
      'title' => 'New on IPT (Children < 15 Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'ipt/new/children/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'yellow'
        ]
      ]
    ],
    'adults_new_on_ipt_chart' => [
      'title' => 'New on IPT (Adults 15+ Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'ipt/new/adults/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'green'
        ]
      ]
    ],
    'totals_new_on_ipt_chart' => [
      'title' => 'New on IPT (Totals)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'ipt/new/totals/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'green'
        ]
      ]
    ],
    'children_current_ever_on_ipt_chart' => [
      'title' => 'Current on ART vs Current Ever on IPT (Children < 15 Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'ipt/current/children/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'adults_current_ever_on_ipt_chart' => [
      'title' => 'Current on ART vs Current Ever on IPT (Adults 15+ Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'ipt/current/adults/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'totals_current_ever_on_ipt_chart' => [
      'title' => 'Current on ART vs Current Ever on IPT (Totals)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'ipt/current/totals/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'totals_ipt_outcomes_chart' => [
      'title' => 'IPT Outcomes (Totals)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'ipt/outcomes/totals/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'green'
        ]
      ]
    ],
    'totals_reasons_not_completing_ipt_chart' => [
      'title' => 'Reasons for Not Completing IPT (Totals)',
      'type' => 'pie',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'ipt/outcomes/totals/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'green'
        ]
      ]
    ],
    'adults_ipt_outcomes_chart' => [
      'title' => 'IPT Outcomes (Adults 15+ Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'ipt/outcomes/adults/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'adults_reasons_not_completing_ipt_chart' => [
      'title' => 'Reasons for Not Completing IPT (Adults 15+ Years)',
      'type' => 'pie',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'ipt/outcomes/adults/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'green'
        ]
      ]
    ],
    'children_ipt_outcomes_chart' => [
      'title' => 'IPT Outcomes (Children < 15 Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'ipt/outcomes/children/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'children_reasons_not_completing_ipt_chart' => [
      'title' => 'Reasons for Not Completing IPT (Children < 15 Years)',
      'type' => 'pie',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'ipt/outcomes/children/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'green'
        ]
      ]
    ],
  ]
];
