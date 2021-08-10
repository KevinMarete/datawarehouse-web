<div class="row">
  <div class="col-12">
    <form class="form-inline" role="form" action="/dashboard/filter" method="POST">
      @csrf
      <div class="form-row align-items-center">
        <div class="col-sm-12 col-md-6 col-lg-3 m-2">
          <div class="form-group row">
            <label class="col-2 col-form-label" for="facility"><strong>
                <h6>Facility</h6>
              </strong></label>
            <div class="col-10">
              <select id="facility" name="facility[]" class="form-control filter-select" multiple="multiple" style="width: 100%">
                @foreach($facilities as $facility)
                @if(in_array($facility['mflcode'], $filters['facility']))
                <option value="{{ $facility['mflcode'] }}" selected>{{ $facility['name'] }}</option>
                @else
                <option value="{{ $facility['mflcode'] }}">{{ $facility['name'] }}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 m-2">
          <div class="form-group row">
            <label class="col-2 col-form-label" for="subcounty"><strong>
                <h6>SubCounty</h6>
              </strong></label>
            <div class="col-10">
              <select id="subcounty" name="subcounty[]" class="form-control filter-select" multiple="multiple" style="width: 100%">
                @foreach($counties as $county)
                <optgroup data-id="{{ $county['name'] }}" label="{{ ucwords($county['name']) }}">
                  @foreach($county['subcounties'] as $subcounty)
                  @if(in_array($subcounty['id'], $filters['subcounty']))
                  <option value="{{ strtolower($subcounty['name']) }}" selected>{{ $subcounty['name'] }}</option>
                  @else
                  <option value="{{ strtolower($subcounty['name']) }}">{{ $subcounty['name'] }}</option>
                  @endif
                  @endforeach
                </optgroup>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 m-2">
          <div class="form-group row">
            <input type="hidden" id="filter_facility" value=" {{ json_encode($filters['facility']) }}" required />
            <input type="hidden" id="filter_subcounty" value=" {{ json_encode($filters['subcounty']) }}" required />
            <input type="hidden" id="filter_start" name="filter_from" value=" {{ $filters['from'] }}" required />
            <input type="hidden" id="filter_end" name="filter_to" value="{{ $filters['to'] }}" required />
            <input type="hidden" name="category" value="{{ $category }}" />
            <label for="periodrange" class="col-2 col-form-label"><strong>
                <h6>Period</h6>
              </strong></label>
            <div class="col-10">
              <div id="periodrange" class="form-control">
                <i class="fa fa-calendar"></i>&nbsp;
                <span></span> <i class="fa fa-caret-down"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-auto m-2">
          <button type="submit" class="btn btn-md btn-dark"><i class="fa fa-filter"></i> Filter</button>
        </div>
    </form>
  </div>
</div>