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
          'dataUrl' => 'testing/hiv/children/category',
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
          'dataUrl' => 'testing/hiv/adolescents/category',
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
          'dataUrl' => 'testing/hiv/youths/category',
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
          'dataUrl' => 'testing/hiv/adults/category',
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
          'dataUrl' => 'testing/hiv/totals/category',
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
          'dataUrl' => 'testing/hiv/overall/category',
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
          'dataUrl' => 'testing/hiv+/overall/category',
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
          'label' => 'Total Tested for HIV',
          'dataUrl' => 'testing/hiv/totals/agegrouplarge',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue',
        ],
        [ 
          'label' => 'Total Tested HIV+',
          'dataUrl' => 'testing/hiv+/totals/agegrouplarge',
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
          'label' => 'Total Tested HIV+',
          'dataUrl' => 'testing/hiv+/totals/agegrouplarge',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ],
        [ 
          'label' => 'Total Tested HIV+ Linked',
          'dataUrl' => 'testing/linked/totals/agegrouplarge',
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
          'label' => 'Males Tested for HIV',
          'dataUrl' => 'testing/hiv/males/agegrouplarge',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue',
        ],
        [ 
          'label' => 'Males Tested HIV+',
          'dataUrl' => 'testing/hiv+/males/agegrouplarge',
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
          'label' => 'Males Tested HIV+',
          'dataUrl' => 'testing/hiv+/males/agegrouplarge',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ],
        [ 
          'label' => 'Males Tested HIV+ Linked',
          'dataUrl' => 'testing/linked/males/agegrouplarge',
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
          'label' => 'Females Tested for HIV',
          'dataUrl' => 'testing/hiv/females/agegrouplarge',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue',
        ],
        [ 
          'label' => 'Females Tested HIV+',
          'dataUrl' => 'testing/hiv+/females/agegrouplarge',
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
          'label' => 'Females Tested HIV+',
          'dataUrl' => 'testing/hiv+/females/agegrouplarge',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ],
        [
          'label' => 'Females Tested HIV+ Linked',
          'dataUrl' => 'testing/linked/females/agegrouplarge',
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
          'label' => 'Tested for HIV',
          'dataUrl' => 'testing/hiv/modalities/testing/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ],
        [ 
          'label' => 'Tested HIV+',
          'dataUrl' => 'testing/hiv+/modalities/testing/category',
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
          'dataUrl' => 'testing/hiv+/modalities/testing/category',
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
          'label' => 'Tested for HIV By DATIM Modalities',
          'dataUrl' => 'testing/hiv/modalities/datim/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ],
        [ 
          'label' => 'Tested HIV+ By DATIM Modalities',
          'dataUrl' => 'testing/hiv+/modalities/datim/category',
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
          'dataUrl' => 'testing/hiv+/modalities/datim/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'orange',
        ]
      ]
    ],
  ]
];
