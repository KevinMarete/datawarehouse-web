<div class="main-content pt-3">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <form action="/query/run" method="POST" class="form-horizontal" id="query_run_form">
              @csrf
              <div class="card-header">
                <h3 class="text-center title-2"><strong>Query Executor</strong></h3>
              </div>
              <div class="card-body card-block">
                <div class="form-group">
                  <button type="submit" class="btn btn-dark btn-sm pull-right m-2">
                    <i class="fa fa-dot-circle-o"></i> Run Query
                  </button>
                </div>
                <div class="form-group">
                  <label for="query_description" class="control-label mb-1">Query</label>
                  <select id="query_description" name="query_description" class="form-control filter-select" required>
                    <option value="">Select Query</option>
                    @foreach($querycategories as $querycategory)
                    <optgroup label="{{ ucwords($querycategory['name']) }}">
                      @foreach($querycategory['queries'] as $query)
                      <option value="{{ $query['description'] }}">{{ ucwords($query['name']) }}</option>
                      @endforeach
                    </optgroup>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <input type="hidden" id="filter_start" name="from" value=" {{ $default_from }}" required />
                  <input type="hidden" id="filter_end" name="to" value="{{ $default_to }}" required />
                  <label for="periodrange" class="control-label mb-1">Period</label>
                  <div id="periodrange" class="form-control">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                  </div>
                </div>
              </div>
              <div class="card-footer pt-2">
                <div class="table-responsive-sm">
                  <table class="table table-sm table-hover table-bordered display nowrap" id="query_result" style="width:100%">
                    <thead></thead>
                    <tbody></tbody>
                  </table>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>