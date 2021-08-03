<div class="main-content p-3">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card ">
            <div class="card-header">
              <h3 class="text-center title-2">New Menu Form</h3>
              @if (Session::has('pharmacy_msg'))
              {!! session('pharmacy_msg') !!}
              @endif
            </div>
            <div class="card-body">
              <form action="/menu/save" method="POST">
                @csrf
                <div class="form-group">
                  <label for="name" class="control-label mb-1">Name</label>
                  <input id="name" name="name" type="text" class="form-control" value="" required />
                </div>
                <div class="form-group">
                  <label for="link" class="control-label mb-1">Link</label>
                  <input id="link" name="link" type="text" class="form-control" value="" required />
                </div>
                <div class="form-group">
                  <label for="menu_group_id" class="control-label mb-1">MenuGroup</label>
                  <select id="menu_group_id" name="menu_group_id" class="form-control" required>
                    <option value="">Select MenuGroup</option>
                    @foreach($menugroups as $menugroup)
                    <option value="{{ $menugroup['id'] }}">{{ $menugroup['name'] }}</option>
                    @endforeach
                  </select>
                </div>
                <div>
                  <button type="submit" class="btn btn-lg btn-dark btn-block">
                    <i class="fa fa-save fa-lg"></i> Save Menu
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