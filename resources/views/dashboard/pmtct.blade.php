<div class="page-content">
  <section class="statistic-chart">
    <div class="container">
      @include('dashboard.filter')
      <div class="row">
        <div class="col-12">
          <h3 class="title-5 m-3">PMTCT</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="1024PmtctCascadesChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['10_24_pmtct_cascades_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="1519PmtctCascadesChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['15_19_pmtct_cascades_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="2024PmtctCascadesChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['20_24_pmtct_cascades_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="1524YouthsPmtctCascadesChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['15_24_youths_pmtct_cascades_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="over25PmtctCascadesChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['over_25_pmtct_cascades_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="totalsPmtctCascadesChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['totals_pmtct_cascades_chart'] }}"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>