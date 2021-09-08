<?php

return [
  'charts' => [
    'children_hiv_testing_agegroup_chart' => [
      'title' => 'Overall HIV Testing & Linkage By Different Age Groups (Children 0-9 Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Tests',
          'dataUrl' => 'testing/hiv/children/agegroup',
          'data' => [],
          'backgroundColor' => ['blue', 'orange'],
        ],
      ]
    ],
    'adolescents_hiv_testing_agegroup_chart' => [
      'title' => 'Overall HIV Testing & Linkage By Different Age Groups (Adolescents 10-19 Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Tests',
          'dataUrl' => 'testing/hiv/adolescents/agegroup',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
    'youths_hiv_testing_agegroup_chart' => [
      'title' => 'Overall HIV Testing & Linkage By Different Age Groups (Youths 15-24 Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Tests',
          'dataUrl' => 'testing/hiv/youths/agegroup',
          'data' => [],
          'backgroundColor' => ['blue', 'orange'],
        ],
      ]
    ],
    'adults_hiv_testing_agegroup_chart' => [
      'title' => 'Overall HIV Testing & Linkage By Different Age Groups (Adults 20+ Years)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Tests',
          'dataUrl' => 'testing/hiv/adults/agegroup',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
    'totals_hiv_testing_agegroup_chart' => [
      'title' => 'Overall HIV Testing & Linkage By Different Age Groups (Totals)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Tests',
          'dataUrl' => 'testing/hiv/totals/agegroup',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
    'overall_hiv_testing_gender_chart' => [
      'title' => 'Overall HIV Testing By Gender',
      'type' => 'pie',
      'labels' => [],
      'datasets' => [
        [
          'dataUrl' => 'testing/hiv/overall/gender',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
    'overall_hiv_positive_testing_gender_chart' => [
      'title' => 'Overall HIV+ Testing By Gender',
      'type' => 'pie',
      'labels' => [],
      'datasets' => [
        [
          'dataUrl' => 'testing/hiv+/overall/gender',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
    'totals_tested_v_tested_positive_chart' => [
      'title' => 'Total Tested for HIV vs Total Tested HIV+',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'dataUrl' => 'testing/hiv/hiv+/totals',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
    'totals_tested_positive_v_tested_positive_linked_chart' => [
      'title' => 'Total Tested HIV+ vs Total Tested HIV+ Linked',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'dataUrl' => 'testing/hiv+/linked/totals',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
    'males_tested_v_tested_positive_chart' => [
      'title' => 'Males Tested for HIV vs Males Tested HIV+',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'dataUrl' => 'testing/hiv/hiv+/males',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
    'males_tested_positive_v_tested_positive_linked_chart' => [
      'title' => 'Males Tested HIV+ vs Males Tested HIV+ Linked',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'dataUrl' => 'testing/hiv+/linked/males',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
    'females_tested_v_tested_positive_chart' => [
      'title' => 'Females Tested for HIV vs Females Tested HIV+',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'dataUrl' => 'testing/hiv/hiv+/females',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
    'females_tested_positive_v_tested_positive_linked_chart' => [
      'title' => 'Females Tested HIV+ vs Females Tested HIV+ Linked',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'dataUrl' => 'testing/hiv+/linked/females',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],

    'females_tested_v_tested_positive_chart' => [
      'title' => 'Females Tested for HIV vs Females Tested HIV+',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'dataUrl' => 'testing/hiv/hiv+/females',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
    'females_tested_positive_v_tested_positive_linked_chart' => [
      'title' => 'Females Tested HIV+ vs Females Tested HIV+ Linked',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'dataUrl' => 'testing/hiv+/linked/females',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
    'hiv_testing_points_testing_modalities_chart' => [
      'title' => 'HIV Testing & Positivity By Different Testing Modalities (Expanded Testing Points)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'dataUrl' => 'testing/hiv/modalities/testing',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
    'hiv_positive_testing_points_testing_modalities_chart' => [
      'title' => 'HIV+ Contribution By Different Testing Modalities (Expanded Testing Points)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'dataUrl' => 'testing/hiv+/modalities/testing',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
    'hiv_testing_points_datim_modalities_chart' => [
      'title' => 'HIV Testing & Positivity By Different Testing Modalities (DATIM Modalities)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'dataUrl' => 'testing/hiv/modalities/datim',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
    'hiv_positive_testing_points_datim_modalities_chart' => [
      'title' => 'HIV+ Contribution By Different Testing Modalities (DATIM Modalities)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'dataUrl' => 'testing/hiv+/modalities/datim',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
  ]
];
