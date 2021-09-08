<div class="page-content">
  <section class="statistic-chart">
    <div class="container">
      @include('dashboard.filter')
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-3">TB Prevention and Treatment</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="totalsTbHivOverallCascadesChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['totals_tb_hiv_overall_cascades_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="testingPointTbHivOverallCascadesChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['testing_point_tb_hiv_overall_cascades_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="childrenTbHivAgeCascadesChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['children_tb_hiv_age_cascades_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="adultsTbHivAgeCascadesChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['adults_tb_hiv_age_cascades_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="childrenTbHivGenderCascadesChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['children_tb_hiv_gender_cascades_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 p-3">
          <div class="chart-wrap">
            <canvas id="adultsTbHivGenderCascadesChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['adults_tb_hiv_gender_cascades_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="overallTbTreatmentOutcomesChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['overall_tb_treatment_outcomes_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="ageTbTreatmentOutcomesChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['age_tb_treatment_outcomes_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="genderTbTreatmentOutcomesChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['gender_tb_treatment_outcomes_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="childrenTbPreventionChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['children_tb_prevention_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="adultsTbPreventionChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['adults_tb_prevention_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="totalsTbPreventionChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['totals_tb_prevention_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="childrenTbTreatmentChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['children_tb_treatment_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="adultsTbTreatmentChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['adults_tb_treatment_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="totalsTbTreatmentChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['totals_tb_treatment_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="childrenBacteriologicDiagnosisChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['children_bacteriologic_diagnosis_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="adultsBacteriologicDiagnosisChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['adults_bacteriologic_diagnosis_chart'] }}"></canvas>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 p-3">
          <div class="chart-wrap">
            <canvas id="totalsBacteriologicDiagnosisChart" width="900" height="400" class="dashboard-chart" data-api-resource="{{ $chart_config['totals_bacteriologic_diagnosis_chart'] }}"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>