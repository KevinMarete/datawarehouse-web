<div class="page-content">
  <section class="statistic-chart">
    <div class="container">
      @include('dashboard.filter')
      <div class="row">
        <div class="col-12">
          <h3 class="title-5 m-3">ART Cohort Retention</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="childrenCohortChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['children_cohort_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="adolescentsCohortChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['adolescents_cohort_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="adultsCohortChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['adults_cohort_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="totalsCohortChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['totals_cohort_chart'] }}"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>