<div class="page-content">
  <section class="statistic-chart">
    <div class="container">
      @include('dashboard.filter')
      <div class="row">
        <div class="col-12">
          <h3 class="title-5 m-3">HIV/Cervical Cancer</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="cervicalCancerCascadeChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['cervical_cancer_cascade_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="cervicalCancerScreeningVisitTypeChart" width="900" height="450" class="dashboard-chart" data-api-resource="{{ $chart_config['cervical_cancer_screening_visit_type_chart'] }}"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>