<div class="row">
  <div class="col-12">
    <form class="form-inline" role="form" action="/dashboard/filter" method="POST">
      @csrf
      <div class="form-row align-items-center">
        <div class="col-auto">
          <label class="sr-only" for="facility">Facility</label>
          <select id="facility" name="facility" class="form-control m-2 filter-select">
            <option value="">All Facilities</option>
            @foreach($facilities as $facility)
            @if(in_array($facility['mflcode'], $filters['facility']))
            <option value="{{ $facility['mflcode'] }}" selected>{{ $facility['name'] }}</option>
            @else
            <option value="{{ $facility['mflcode'] }}">{{ $facility['name'] }}</option>
            @endif
            @endforeach
          </select>
        </div>
        <div class="col-auto">
          <label class="sr-only" for="subcounty">SubCounty</label>
          <select id="subcounty" name="subcounty" class="form-control m-2 filter-select">
            <option value="">All Counties</option>
            @foreach($counties as $county)
            <optgroup data-id="{{ $county['name'] }}" label="{{ ucwords($county['name']) }}">
              @foreach($county['subcounties'] as $subcounty)
              @if(in_array($subcounty['id'], $filters['subcounty']))
              <option value="{{ $subcounty['id'] }}" selected>{{ $subcounty['name'] }}</option>
              @else
              <option value="{{ $subcounty['id'] }}">{{ $subcounty['name'] }}</option>
              @endif
              @endforeach
            </optgroup>
            @endforeach
          </select>
        </div>
        <div class="col-auto">
          <input type="hidden" id="filter_start" name="filter_from" value=" {{ $filters['from'] }}" required />
          <input type="hidden" id="filter_end" name="filter_to" value="{{ $filters['to'] }}" required />
          <input type="hidden" name="category" value="{{ $category }}" />
          <label for="periodrange" class="sr-only">Period</label>
          <div id="periodrange" class="form-control m-2">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
          </div>
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-md btn-dark m-2"><i class="fa fa-filter"></i> Filter</button>
        </div>
    </form>
  </div>
</div>