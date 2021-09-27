<div class="page-content">
  <section class="statistic-chart">
    <div class="container">
      @include('dashboard.filter')
      <div class="row">
        <div class="col-12">
          <h3 class="title-5 m-3">Program Management</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="totalCostBySubCountyChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['total_cost_by_sub_county_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="totalCostByProgramAreaChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['total_cost_by_program_area_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="totalCostByFundingStreamChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['total_cost_by_funding_stream_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="totalCostByExpenditureAnalysisChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['total_cost_by_expenditure_analysis_chart'] }}"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>