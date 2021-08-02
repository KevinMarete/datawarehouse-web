<div class="main-content p-5">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          @if (Session::has('pharmacy_msg'))
          {!! session('pharmacy_msg') !!}
          @endif
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">Manage Profile</div>
            <div class="card-body card-block">
              <form action="/update-profile" method="POST">
                @csrf
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">Firstname</div>
                    <input type="hidden" name="id" value="{{ $profile['id'] }}" />
                    <input type="hidden" name="role_id" value="{{ $profile['role_id'] }}" />
                    <input type="hidden" name="is_active" value="{{ $profile['is_active'] }}" />
                    <input type="text" id="firstname" name="firstname" value="{{ $profile['firstname'] }}" class="form-control">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">Lastname</div>
                    <input type="text" id="lastname" name="lastname" value="{{ $profile['lastname'] }}" class="form-control">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">Email</div>
                    <input type="email" id="email" name="email" value="{{ $profile['email'] }}" class="form-control">
                    <div class="input-group-addon">
                      <i class="fa fa-envelope"></i>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">Phone</div>
                    <input type="text" id="phone" name="phone" value="{{ $profile['phone'] }}" class="form-control">
                    <div class="input-group-addon">
                      <i class="fa fa-asterisk"></i>
                    </div>
                  </div>
                </div>
                <div class="form-actions form-group">
                  <button type="submit" class="btn btn-secondary btn-md"><i class="fas fa-save"></i> Update Profile</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">Change Password</div>
            <div class="card-body card-block">
              <form action="/change-password" method="POST">
                @csrf
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-asterisk"></i>
                    </div>
                    <input type="hidden" name="email" value="{{ $profile['email'] }}" />
                    <input type="password" id="password" name="password" placeholder="Current Password" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-asterisk"></i>
                    </div>
                    <input type="password" id="new_password" name="new_password" placeholder="New Password" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-asterisk"></i>
                    </div>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="form-control">
                  </div>
                </div>
                <div class="form-actions form-group">
                  <button type="submit" class="btn btn-secondary btn-md"><i class="fas fa-save"></i> Change Password</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>