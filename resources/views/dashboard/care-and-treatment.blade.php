<div class="page-content">
  <section class="statistic-chart">
    <div class="container">
      @include('dashboard.filter')
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-3">Care and Treatment Cascades</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="currentChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['current_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="newChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['new_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-12 p-3">
          <div class="chart-wrap">
            <canvas id="newAgeGenderChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['new_age_gender_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-12 p-3">
          <div class="chart-wrap">
            <canvas id="currentAgeGenderChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['current_age_gender_chart'] }}"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>