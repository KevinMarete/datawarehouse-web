<?php

return [
  'care-and-treatment' => [
    'charts' => [
      'current_chart' => [
        'title' => 'Current on ART vs Current on Care',
        'type' => 'horizontalBar',
        'labels' => [],
        'datasets' => [
          [
            'label' => 'Current On ART',
            'dataUrl' => 'data/on-art/current/%s/%s',
            'data' => [],
            'borderColor' => 'transparent',
            'backgroundColor' => '#FFA500',
          ],
          [
            'label' => 'Current On Care',
            'dataUrl' => 'data/on-care/current/%s/%s',
            'data' => [],
            'borderColor' => 'transparent',
            'backgroundColor' => '#0000FF',
          ],
        ]
      ],
      'new_chart' => [
        'title' => 'New on ART vs New on Care',
        'type' => 'horizontalBar',
        'labels' => [],
        'datasets' => [
          [
            'label' => 'New On ART',
            'dataUrl' => 'data/on-art/new/%s/%s',
            'data' => [],
            'borderColor' => 'transparent',
            'backgroundColor' => '#FFA500',
          ],
          [
            'label' => 'New On Care',
            'dataUrl' => 'data/on-art/new/%s/%s',
            'data' => [],
            'borderColor' => 'transparent',
            'backgroundColor' => '#0000FF',
          ],
        ]
      ],
      'new_age_gender_chart' => [
        'title' => 'New on Care Vs New on ART By Finer Age & Gender',
        'type' => 'bar',
        'labels' => [],
        'datasets' => [
          [
            'label' => 'New On ART',
            'dataUrl' => 'data/on-art/new-age-gender/%s/%s',
            'data' => [],
            'borderColor' => 'transparent',
            'backgroundColor' => '#FFA500',
          ],
          [
            'label' => 'New On Care',
            'dataUrl' => 'data/on-care/new-age-gender/%s/%s',
            'data' => [],
            'borderColor' => 'transparent',
            'backgroundColor' => '#0000FF',
          ],
        ]
      ],
      'current_age_gender_chart' => [
        'title' => 'Current on Care Vs Current on ART By Finer Age & Gender',
        'type' => 'bar',
        'labels' => [],
        'datasets' => [
          [
            'label' => 'Current On ART',
            'dataUrl' => 'data/on-art/current-age-gender/%s/%s',
            'data' => [],
            'borderColor' => 'transparent',
            'backgroundColor' => '#00FF00',
            'type' => 'bar'
          ],
          [
            'label' => 'Current On Care',
            'dataUrl' => 'data/on-care/current-age-gender/%s/%s',
            'data' => [],
            'borderColor' => 'transparent',
            'backgroundColor' => '#0000FF',
            'type' => 'bar'
          ],
          [
            'label' => 'Prop. On ART',
            'dataUrl' => 'data/on-art/current-prop/%s/%s',
            'data' => [],
            'borderColor' => 'transparent',
            'backgroundColor' => '#800080',
            'type' => 'line',
            'fill' => 'false'
          ],
        ]
      ],
    ]
  ]
];
