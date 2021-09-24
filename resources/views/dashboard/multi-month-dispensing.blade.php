<div class="page-content">
  <section class="statistic-chart">
    <div class="container">
      @include('dashboard.filter')
      <div class="row">
        <div class="col-12">
          <h3 class="title-5 m-3">Multi-Month Dispensing (MMD)</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-12 p-3">
          <div class="chart-wrap">
            <canvas id="currentMMDUptakeChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['current_mmd_uptake_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-12 p-3">
          <div class="chart-wrap">
            <canvas id="currentOverallMMDUptakeChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['current_overall_mmd_uptake_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-12 p-3">
          <div class="chart-wrap">
            <canvas id="currentDisaggregatedChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['current_disaggregated_chart'] }}"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>