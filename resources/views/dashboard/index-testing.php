<div class="page-content">
  <section class="statistic-chart">
    <div class="container">
      @include('dashboard.filter')
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-3">Index Testing</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="childrenIndexTestingChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['children_index_testing_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="adultsIndexTestingChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['adults_index_testing_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="totalsIndexTestingChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['totals_index_testing_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="reportedFTChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['reported_ft_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="reportedPNSChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['reported_pns_chart'] }}"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>