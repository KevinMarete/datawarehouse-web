<div class="main-content p-3">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card ">
            <div class="card-header">
              <h3 class="text-center title-2">View SubCounty Form</h3>
              @if (Session::has('pharmacy_msg'))
              {!! session('pharmacy_msg') !!}
              @endif
            </div>
            <div class="card-body">
              <form action="/subcounty/update/{{ $edit['id'] }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="name" class="control-label mb-1">Name</label>
                  <input id="name" name="name" type="text" class="form-control" value="{{ $edit['name'] }}" required />
                </div>
                <div class="form-group">
                  <label for="county_id" class="control-label mb-1">County</label>
                  <select id="county_id" name="county_id" class="form-control" required>
                    <option value="">Select County</option>
                    @foreach($counties as $county)
                    @if($county['id'] == $edit['county_id'])
                    <option value="{{ $county['id'] }}" selected>{{ $county['name'] }}</option>
                    @else
                    <option value="{{ $county['id'] }}">{{ $county['name'] }}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div>
                  <button type="submit" class="btn btn-lg btn-dark btn-block">
                    <i class="fa fa-save fa-lg"></i> Update SubCounty
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