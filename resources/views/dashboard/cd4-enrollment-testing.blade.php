<div class="page-content">
  <section class="statistic-chart">
    <div class="container">
      @include('dashboard.filter')
      <div class="row">
        <div class="col-12">
          <h3 class="title-5 m-3">CD4 Enrollment and Testing</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="childrenCD4EnrollmentTestingChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['children_cd4_enrollment_testing_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="adolescentsCD4EnrollmentTestingChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['adolescents_cd4_enrollment_testing_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="adultsCD4EnrollmentTestingChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['adults_cd4_enrollment_testing_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="totalsCD4EnrollmentTestingChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['totals_cd4_enrollment_testing_chart'] }}"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>