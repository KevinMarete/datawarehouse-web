<div class="page-content">
  <section class="statistic-chart">
    <div class="container">
      @include('dashboard.filter')
      <div class="row">
        <div class="col-12">
          <h3 class="title-5 m-3">Screening and Testing Cascades</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="childrenHivTestingAgegroupChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['children_hiv_testing_agegroup_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="adolescentsHivTestingAgegroupChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['adolescents_hiv_testing_agegroup_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="youthsHivTestingAgegroupChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['youths_hiv_testing_agegroup_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="adultsHivTestingAgegroupChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['adults_hiv_testing_agegroup_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="totalsHivTestingAgegroupChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['totals_hiv_testing_agegroup_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="overallHivTestingGenderChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['overall_hiv_testing_gender_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="overallHivPositiveTestingGenderChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['overall_hiv_positive_testing_gender_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="totalsTestedVTestedPositiveChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['totals_tested_v_tested_positive_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="totalsTestedPositiveVTestedPositiveLinkedChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['totals_tested_positive_v_tested_positive_linked_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="malesTestedVTestedPositiveChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['males_tested_v_tested_positive_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="malesTestedPositiveVTestedPositiveLinkedChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['males_tested_positive_v_tested_positive_linked_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="femalesTestedVTestedPositiveChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['females_tested_v_tested_positive_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="femalesTestedPositiveVTestedPositiveLinkedChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['females_tested_positive_v_tested_positive_linked_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="hivTestingPointsTestingModalitiesChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['hiv_testing_points_testing_modalities_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="hivPositiveTestingPointsTestingModalitiesChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['hiv_positive_testing_points_testing_modalities_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="hivTestingPointsDatimModalitiesChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['hiv_testing_points_datim_modalities_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="hivPositiveTestingPointsDatimModalitiesChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['hiv_positive_testing_points_datim_modalities_chart'] }}"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>