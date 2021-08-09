<div class="main-content p-3">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card ">
            <div class="card-header">
              <h3 class="text-center title-2">View Facility Form</h3>
              @if (Session::has('pharmacy_msg'))
              {!! session('pharmacy_msg') !!}
              @endif
            </div>
            <div class="card-body">
              <form action="/facility/update/{{ $edit['id'] }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="mflcode" class="control-label mb-1">Mflcode</label>
                  <input id="mflcode" name="mflcode" type="text" class="form-control" value="{{ $edit['mflcode'] }}" required />
                </div>
                <div class="form-group">
                  <label for="name" class="control-label mb-1">Name</label>
                  <input id="name" name="name" type="text" class="form-control" value="{{ $edit['name'] }}" required />
                </div>
                <div class="form-group">
                  <label for="subcounty_id" class="control-label mb-1">SubCounty</label>
                  <select id="subcounty_id" name="subcounty_id" class="form-control" required>
                    <option value="">Select SubCounty</option>
                    @foreach($subcounties as $subcounty)
                    @if($subcounty['id'] == $edit['subcounty_id'])
                    <option value="{{ $subcounty['id'] }}" selected>{{ $subcounty['name'].' | '.$subcounty['county']['name'] }}</option>
                    @else
                    <option value="{{ $subcounty['id'] }}">{{ $subcounty['name'].' | '.$subcounty['county']['name'] }}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div>
                  <button type="submit" class="btn btn-lg btn-dark btn-block">
                    <i class="fa fa-save fa-lg"></i> Update Facility
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