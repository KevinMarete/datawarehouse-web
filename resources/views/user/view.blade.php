<div class="main-content p-3">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card ">
            <div class="card-header">
              <h3 class="text-center title-2">View User Form</h3>
              @if (Session::has('pharmacy_msg'))
              {!! session('pharmacy_msg') !!}
              @endif
            </div>
            <div class="card-body">
              <form action="/user/update/{{ $edit['id'] }}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="firstname" class="control-label mb-1">Firstname</label>
                      <input id="firstname" name="firstname" type="text" class="form-control" value="{{ $edit['firstname'] }}" required />
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="lastname" class="control-label mb-1">Lastname</label>
                    <div class="input-group">
                      <input id="lastname" name="lastname" type="text" class="form-control" value="{{ $edit['lastname'] }}" required />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="email" class="control-label mb-1">Email Address</label>
                      <input id="email" name="email" type="email" class="form-control" value="{{ $edit['email'] }}" required />
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="phone" class="control-label mb-1">Phone Number</label>
                      <input id="phone" name="phone" type="text" class="form-control" value="{{ $edit['phone'] }}" required />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8">
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
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="is_active" class="control-label mb-1">IsActive</label>
                      <select id="is_active" name="is_active" class="form-control" required>
                        @if($edit['is_active'])
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                        @else
                        <option value="1">Yes</option>
                        <option value="0" selected>No</option>
                        @endif
                      </select>
                    </div>
                  </div>
                </div>
                <div>
                  <button type="submit" class="btn btn-lg btn-dark btn-block">
                    <i class="fa fa-save fa-lg"></i> Update User
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