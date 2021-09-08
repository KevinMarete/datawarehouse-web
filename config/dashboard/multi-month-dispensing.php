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
    'current_disaggregated_chart' => [
      'title' => 'TX_CURR Disaggregated By Age, Gender & ARV Dispensing Quantity',
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
  ]
];
