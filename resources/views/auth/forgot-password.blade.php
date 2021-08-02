<!DOCTYPE html>
<html lang="en">

<head>
  @include('template.styles')
</head>

<body class="animsition">
  <div class="page-wrapper">
    <div class="page-content--bge5">
      <div class="container">
        <div class="login-wrap">
          <div class="login-content">
            <div class="login-logo">
              <a href="#">
                <img src="/theme/images/icon/logo.png" alt="DataWarehouse">
              </a>
              @if (Session::has('pharmacy_msg'))
              {!! session('pharmacy_msg') !!}
              @endif
            </div>
            <div class="login-form">
              <form action="/reset-account" method="post">
                @csrf
                <div class="form-group">
                  <label>Email Address</label>
                  <input class="au-input au-input--full" type="email" name="email" placeholder="Email" required>
                </div>
                <div class="login-checkbox float-right">
                  <label>
                    <a href="/login"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a>
                  </label>
                </div>
                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Reset</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  @include('template.scripts')

</body>

</html>
<!-- end document-->