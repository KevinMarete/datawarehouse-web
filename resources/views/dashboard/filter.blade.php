<div class="row float-right">
  <div class="col-12">
    <form class="form-inline" role="form" action="/dashboard/filter" method="POST">
      @csrf
      <div class="form-group mb-2">
        <label for="facility" class="m-2">Facility</label>
        <select id="facility" name="facility" class="form-control required">
          <option value="">All</option>
          @foreach($facilities as $facility)
          @if($facility['id'] == $facility_selected)
          <option value="{{ $facility['id'] }}" selected>{{ $facility['name'] }}</option>
          @else
          <option value="{{ $facility['id'] }}">{{ $facility['name'] }}</option>
          @endif
          @endforeach
        </select>
      </div>
      <div class="form-group mb-2">
        <label for="subcounty" class="m-2">SubCounty</label>
        <select id="subcounty" name="subcounty" class="form-control required">
          <option value="">All</option>
          @foreach($counties as $county => $subcounties)
          <optgroup data-id="{{ $county }}" label="{{ ucwords($county) }}">
            @foreach($subcounties as $subcounty)
            @if($subcounty['id'] == $subcounty_selected)
            <option value="{{ $subcounty['id'] }}" selected>{{ $subcounty['name'] }}</option>
            @else
            <option value="{{ $subcounty['id'] }}">{{ $subcounty['name'] }}</option>
            @endif
            @endforeach
          </optgroup>
          @endforeach
        </select>
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <input type="hidden" id="report_start" name="report_start" value="{{ $from }}" required />
        <input type="hidden" id="report_end" name="report_end" value="{{ $to }}" required />
        <label for="periodrange" class="m-2">Period</label>
        <div id="periodrange" class="form-control">
          <i class="fa fa-calendar"></i>&nbsp;
          <span></span> <i class="fa fa-caret-down"></i>
        </div>
      </div>
      <button type="submit" class="btn btn-dark mb-2"><i class="fa fa-filter"></i> Filter</button>
    </form>
  </div>
</div>