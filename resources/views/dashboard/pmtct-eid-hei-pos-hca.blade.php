<div class="page-content">
  <section class="statistic-chart">
    <div class="container">
      @include('dashboard.filter')
      <div class="row">
        <div class="col-12">
          <h3 class="title-5 m-3">PMTCT EID & PMTCT HEI POS & HCA</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="pmtctEidPmtctBy12Chart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['pmtct_eid_pmtct_by_12_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="pmtctEidPmtctByAgeChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['pmtct_eid_pmtct_by_age_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="hca12MonthsChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['hca_12_months_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="hca24MonthsChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['hca_24_months_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="hcaDeadOutcomesChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['hca_dead_outcomes_chart'] }}"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>