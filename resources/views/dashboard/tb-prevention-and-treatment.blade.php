<div class="page-content">
  <section class="statistic-chart">
    <div class="container">
      @include('dashboard.filter')
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-3">TB Prevention and Treatment</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="childrenTestingLinkageChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['children_testing_linkage_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="adolescentsTestingLinkageChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['adolescents_testing_linkage_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="youthsTestingLinkageChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['youths_testing_linkage_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="adultsTestingLinkageChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['adults_testing_linkage_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="totalsTestingLinkageChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['totals_testing_linkage_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="genderOverallTestingChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['gender_overall_testing_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="genderOverallPositiveTestingChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['gender_overall_positive_testing_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="totalTestedVsPositiveChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['total_tested_vs_positive_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="totalTestedVsPositiveLinkedChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['total_tested_vs_positive_linked_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="malesTestedVsPositiveChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['males_tested_vs_positive_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="malesTestedVsPositiveLinkedChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['males_tested_vs_positive_linked_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="femalesTestedVsPositiveChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['females_tested_vs_positive_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="femalesTestedVsPositiveLinkedChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['females_tested_vs_positive_linked_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="positivityExpandedTestingPointsChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['positivity_expanded_testing_points_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="contributionExpandedTestingPointsChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['contribution_expanded_testing_points_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="positivityDatimModalitiesChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['positivity_datim_modalities_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="contributionDatimModalitiesChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['contribution_datim_modalities_chart'] }}"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>