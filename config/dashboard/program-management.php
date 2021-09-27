<?php

return [
  'charts' => [
    'total_cost_by_sub_county_chart' => [
      'title' => 'Total Cost By Sub County',
      'type' => 'pie',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'program/cost/sub-county/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => ['blue', 'orange', 'lightgreen', 'yellow', 'red', 'purple', 'brown', 'grey', 'lightblue', 'maroon', 'violet']
        ]
      ]
    ],
    'total_cost_by_program_area_chart' => [
      'title' => 'Total Cost By Program Area',
      'type' => 'pie',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'program/cost/program-area/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => ['blue', 'orange', 'lightgreen', 'yellow', 'red', 'purple', 'brown', 'grey', 'lightblue', 'maroon', 'violet']
        ]
      ]
    ],
    'total_cost_by_funding_stream_chart' => [
      'title' => 'Total Cost By Funding Stream',
      'type' => 'pie',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'program/cost/funding-stream/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => ['blue', 'orange', 'lightgreen', 'yellow', 'red', 'purple', 'brown', 'grey', 'lightblue', 'maroon', 'violet']
        ]
      ]
    ],
    'total_cost_by_expenditure_analysis_chart' => [
      'title' => 'Total Cost By Expenditure Analysis',
      'type' => 'pie',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'program/cost/expenditure-analysis/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => ['blue', 'orange', 'lightgreen', 'yellow', 'red', 'purple', 'brown', 'grey', 'lightblue', 'maroon', 'violet']
        ]
      ]
    ]
  ]
];
