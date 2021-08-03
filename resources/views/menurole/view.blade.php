<div class="main-content p-3">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card ">
            <div class="card-header">
              <h3 class="text-center title-2">View Menu Role Form</h3>
              @if (Session::has('pharmacy_msg'))
              {!! session('pharmacy_msg') !!}
              @endif
            </div>
            <div class="card-body">
              <form action="/menurole/update/{{ $edit['id'] }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="menu_id" class="control-label mb-1">Menu</label>
                  <select id="menu_id" name="menu_id" class="form-control" required>
                    <option value="">Select Menu</option>
                    @foreach($menus as $menu)
                    @if($menu['id'] == $edit['menu_id'])
                    <option value="{{ $menu['id'] }}" selected>{{ $menu['name'] }}</option>
                    @else
                    <option value="{{ $menu['id'] }}">{{ $menu['name'] }}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="role_id" class="control-label mb-1">Role</label>
                  <select id="role_id" name="role_id" class="form-control" required>
                    <option value="">Select Role</option>
                    @foreach($roles as $role)
                    @if($role['id'] == $edit['role_id'])
                    <option value="{{ $role['id'] }}" selected>{{ $role['name'] }}</option>
                    @else
                    <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div>
                  <button type="submit" class="btn btn-lg btn-dark btn-block">
                    <i class="fa fa-save fa-lg"></i> Update Menu Role
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