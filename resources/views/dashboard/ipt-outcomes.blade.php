<div class="page-content">
  <section class="statistic-chart">
    <div class="container">
      @include('dashboard.filter')
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-3">IPT Outcomes</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="childrenNewOnIPTChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['children_new_on_ipt_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="adultsNewOnIPTChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['adults_new_on_ipt_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="totalsNewOnIPTChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['totals_new_on_ipt_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="childrenCurrentEverOnIPTChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['children_current_ever_on_ipt_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="adultsCurrentEverOnIPTChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['adults_current_ever_on_ipt_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="totalsCurrentEverOnIPTChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['totals_current_ever_on_ipt_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="totalsIPTOutcomesChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['totals_ipt_outcomes_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="totalsReasonsNotCompletingIPTChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['totals_reasons_not_completing_ipt_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="adultsIPTOutcomesChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['adults_ipt_outcomes_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="adultsReasonsNotCompletingIPTChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['adults_reasons_not_completing_ipt_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="childrenIPTOutcomesChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['children_ipt_outcomes_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="childrenReasonsNotCompletingIPTChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['children_reasons_not_completing_ipt_chart'] }}"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>