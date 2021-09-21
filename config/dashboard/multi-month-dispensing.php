<?php

return [
  'charts' => [
    'current_mmd_uptake_chart' => [
      'title' => 'Multi Month Dispensing (MMD) Uptake Cascades By Finer Age & Gender',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Current On ART',
          'dataUrl' => 'patient/on-art/current/agegroup-gender',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen'
        ],
        [
          'label' => 'On MMD',
          'dataUrl' => 'visit/on-mmd/agegroup-gender',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ],
      ]
    ],
    'current_overall_mmd_uptake_chart' => [
      'title' => 'MMD Uptake vs Overall MMD Uptake By Finer Age & Gender',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'On MMD',
          'dataUrl' => 'visit/on-mmd/agegroup-gender',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ],
        [
          'label' => 'Overall MMD Uptake',
          'dataUrl' => 'visit/overall-mmd/agegroup-gender',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen'
        ],
      ]
    ],
    'current_disaggregated_chart' => [
      'title' => 'TX_CURR Disaggregated By Age, Gender & ARV Dispensing Quantity',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => '<3 Months of ARVs',
          'dataUrl' => 'patient/on-art/3months/agegroup-gender',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'red'
        ],
        [
          'label' => '3-5 Months of ARVs',
          'dataUrl' => 'patient/on-art/3-5months/agegroup-gender',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'lightgreen'
        ],
        [
          'label' => '6 or More Months of ARVs',
          'dataUrl' => 'patient/on-art/6months/agegroup-gender',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'grey'
        ],
      ]
    ],
  ]
];
