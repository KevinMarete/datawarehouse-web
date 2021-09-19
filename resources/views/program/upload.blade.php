<div class="main-content p-3">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card ">
            <div class="card-header">
              <h3 class="text-center title-2">Program Data Upload Form</h3>
              @if (Session::has('pharmacy_msg'))
              {!! session('pharmacy_msg') !!}
              @endif
            </div>
            <div class="card-body">
              <form action="/program/save" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <a href="/program/template" class="btn btn-block"><i class="fa fa-download"></i> Click to Download Template!</a>
                </div>
                <div class="form-group">
                  <label for="datafile" class="control-label mb-1">File</label>
                  <input id="datafile" name="datafile" type="file" class="form-control" accept=".csv" required />
                </div>
                <div>
                  <button type="submit" class="btn btn-lg btn-dark btn-block">
                    <i class="fa fa-save fa-lg"></i> Upload Data
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>