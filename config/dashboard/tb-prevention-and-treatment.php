<?php

return [
  'charts' => [
    'totals_tb_hiv_overall_cascades_chart' => [
      'title' => 'TB/HIV Cascades By Overall (Totals)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/cascades/totals/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'testing_point_tb_hiv_overall_cascades_chart' => [
      'title' => 'TB/HIV Cascades By Overall (Tb Testing Point)',
      'type' => 'bar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/cascades/testing-points/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'green'
        ]
      ]
    ],
    'children_tb_hiv_age_cascades_chart' => [
      'title' => 'TB/HIV Cascades By Age (Children < 15 Years)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/cascades/children/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'yellow'
        ]
      ]
    ],
    'adults_tb_hiv_age_cascades_chart' => [
      'title' => 'TB/HIV Cascades By Age (Adults 15+ Years)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/cascades/adults/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'children_tb_hiv_gender_cascades_chart' => [
      'title' => 'TB/HIV Cascades By Gender (Females)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/cascades/females/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'yellow'
        ]
      ]
    ],
    'adults_tb_hiv_gender_cascades_chart' => [
      'title' => 'TB/HIV Cascades By Gender (Males)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/cascades/males/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'overall_tb_treatment_outcomes_chart' => [
      'title' => 'TB Treatment Outcomes for HIV+ TB Cases Starting Treatment 1 Year Ealier By Overall',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/outcomes/totals/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'children_tb_treatment_outcomes_chart' => [
      'title' => 'TB Treatment Outcomes for HIV+ TB Cases Starting Treatment 1 Year Ealier By Age (Children <15 Years)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/outcomes/children/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'yellow'
        ]
      ]
    ],
    'adults_tb_treatment_outcomes_chart' => [
      'title' => 'TB Treatment Outcomes for HIV+ TB Cases Starting Treatment 1 Year Ealier By Age (Adults 15+ Years)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/outcomes/adults/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'yellow'
        ]
      ]
    ],
    'females_tb_treatment_outcomes_chart' => [
      'title' => 'TB Treatment Outcomes for HIV+ TB Cases Starting Treatment 1 Year Ealier By Gender (Females)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/outcomes/females/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'males_tb_treatment_outcomes_chart' => [
      'title' => 'TB Treatment Outcomes for HIV+ TB Cases Starting Treatment 1 Year Ealier By Gender (Males)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/outcomes/males/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'children_tb_prevention_chart' => [
      'title' => 'TB Prevention (Children < 15 Years)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/prevention/children/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'yellow'
        ]
      ]
    ],
    'adults_tb_prevention_chart' => [
      'title' => 'TB Prevention (Adults 15+ Years)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/prevention/adults/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'totals_tb_prevention_chart' => [
      'title' => 'TB Prevention (Totals)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/prevention/totals/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'children_tb_treatment_chart' => [
      'title' => 'TB Treatment (Children < 15 Years)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/treatment/children/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'yellow'
        ]
      ]
    ],
    'adults_tb_treatment_chart' => [
      'title' => 'TB Treatment (Adults 15+ Years)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/treatment/adults/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'totals_tb_treatment_chart' => [
      'title' => 'TB Treatment (Totals)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/treatment/totals/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'children_bacteriologic_diagnosis_chart' => [
      'title' => 'Bacteriologic Diagnosis (Children < 15 Years)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/bacteriologic-diagnosis/children/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'yellow'
        ]
      ]
    ],
    'adults_bacteriologic_diagnosis_chart' => [
      'title' => 'Bacteriologic Diagnosis (Adults 15+ Years)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/bacteriologic-diagnosis/adults/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
    'totals_bacteriologic_diagnosis_chart' => [
      'title' => 'Bacteriologic Diagnosis (Totals)',
      'type' => 'horizontalBar',
      'labels' => [],
      'datasets' => [
        [
          'label' => 'Totals',
          'dataUrl' => 'tb/bacteriologic-diagnosis/totals/category',
          'data' => [],
          'borderColor' => 'transparent',
          'backgroundColor' => 'blue'
        ]
      ]
    ],
  ]
];
