<div class="page-content">
  <section class="statistic-chart">
    <div class="container">
      @include('dashboard.filter')
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-3">Screening and Testing Cascades</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-5 col-lg-5 p-3">
          <div class="chart-wrap">
            <canvas id="overallPositiveTestingGenderChart" width="900" height="600" class="dashboard-chart" data-api-resource="{{ $chart_config['overall_positive_testing_gender'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-7 col-lg-7 p-3">
          <div class="chart-wrap">
            <canvas id="totalTestedPositiveChart" width="900" height="600" class="dashboard-chart" data-api-resource="{{ $chart_config['total_tested_positive'] }}"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>