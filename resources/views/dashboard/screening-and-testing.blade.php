<div class="page-content">
  <section class="statistic-chart">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-b-35">Screening and Testing Analysis</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-6">
          <!-- TOP CAMPAIGN-->
          <div class="top-campaign">
            <h3 class="title-3 m-b-30">top campaigns</h3>
            <div class="table-responsive">
              <table id="top-campaign" class="table table-top-campaign dashboard-table" data-api-resource="{{ $chart_data }}">
                <tbody>
                  <tr>
                    <td>1. Australia</td>
                    <td>$70,261.65</td>
                  </tr>
                  <tr>
                    <td>2. United Kingdom</td>
                    <td>$46,399.22</td>
                  </tr>
                  <tr>
                    <td>3. Turkey</td>
                    <td>$35,364.90</td>
                  </tr>
                  <tr>
                    <td>4. Germany</td>
                    <td>$20,366.96</td>
                  </tr>
                  <tr>
                    <td>5. France</td>
                    <td>$10,366.96</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- END TOP CAMPAIGN-->
        </div>
        <div class="col-md-6 col-lg-6">
          <!-- CHART PERCENT-->
          <div class="chart-percent-2">
            <h3 class="title-3 m-b-30">chart by %</h3>
            <div class="chart-wrap">
              <canvas id="percent-chart2-test" class="dashboard-chart" data-api-resource="{{ $chart_data }}"></canvas>
              <div id="chartjs-tooltip">
                <table></table>
              </div>
            </div>
            <div class="chart-info">
              <div class="chart-note">
                <span class="dot dot--blue"></span>
                <span>products</span>
              </div>
              <div class="chart-note">
                <span class="dot dot--red"></span>
                <span>Services</span>
              </div>
            </div>
          </div>
          <!-- END CHART PERCENT-->
        </div>
        <div class="col-md-12 col-lg-12">
          <!-- CHART-->
          <div class="statistic-chart-1">
            <h3 class="title-3 m-b-30">chart</h3>
            <div class="chart-wrap">
              <canvas id="widgetChart5-test" class="dashboard-chart" data-api-resource="{{ $chart_data }}"></canvas>
            </div>
            <div class="statistic-chart-1-note">
              <span class="big">10,368</span>
              <span>/ 16220 items sold</span>
            </div>
          </div>
          <!-- END CHART-->
        </div>
      </div>
    </div>
  </section>
</div>