    <!-- HEADER DESKTOP-->
    <header class="header-desktop3 d-none d-lg-block bg-success">
      <div class="section__content section__content--p35">
        <div class="header3-wrap">
          <div class="header__logo">
            <a href="#">
              <img src="/theme/images/icon/logo-white.png" class="img-fluid rounded" alt="DataWarehouse" width="200" height="50" />
            </a>
          </div>
          <div class="header__navbar">
            <input type="hidden" class="main-menu" value="{{ $main_menu }}" />
            <input type="hidden" class="sub-menu" value="{{ $sub_menu }}" />
            <ul class="list-unstyled font-weight-bold">
              @foreach($menugroups as $menugroup)
              <li class="has-sub {{ str_ireplace(' ', '-', strtolower($menugroup['name'])) }}">
                <a href="#">
                  <i class="{{ $menugroup['icon'] }}"></i>{{ ucwords($menugroup['name']) }}
                  <span class="bot-line"></span>
                </a>
                <ul class="header3-sub-list list-unstyled">
                  @foreach($menugroup['menus'] as $menu)
                  <li class="{{ str_ireplace(' ', '-', strtolower($menu['name'])) }}">
                    <a href="{{ $menu['link'] }}">{{ ucwords($menu['name']) }}</a>
                  </li>
                  @endforeach
                </ul>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="header__tool">
            <div class="account-wrap">
              <div class="account-item account-item--style2 clearfix js-item-menu">
                <div class="image">
                  <img src="/theme/images/icon/avatar.png" class="img-fluid rounded" alt="Default User" width="45" height="45" />
                </div>
                <div class="content">
                  <a class="js-acc-btn font-weight-bold" href="#">{{ ucwords(session()->get('firstname').' '.session()->get('lastname')) }}</a>
                </div>
                <div class="account-dropdown js-dropdown">
                  <div class="p-2 info clearfix">
                    <div class="image text-center">
                      <a href="#">
                        <img src="/theme/images/icon/avatar.png" class="img-fluid rounded mx-auto d-block" alt="Default User" width="45" height="45" />
                      </a>
                    </div>
                    <div class="content">
                      <h5 class="name">
                        <a href="#">{{ ucwords(session()->get('firstname').' '.session()->get('lastname')) }}</a>
                      </h5>
                      <span class="email">{{ session()->get('email') }}</span>
                    </div>
                  </div>
                  <div class="account-dropdown__body">
                    <div class="account-dropdown__item">
                      <a href="/profile">
                        <i class="zmdi zmdi-account"></i>Profile</a>
                    </div>
                  </div>
                  <div class="account-dropdown__footer">
                    <a href="/logout">
                      <i class="zmdi zmdi-power"></i>Logout</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END HEADER DESKTOP-->

    <!-- HEADER MOBILE-->
    <header class="header-mobile header-mobile-2 d-block d-lg-none bg-success">
      <div class="header-mobile__bar">
        <div class="container-fluid">
          <div class="header-mobile-inner">
            <a class="logo" href="/dashboard">
              <img src="/theme/images/icon/logo-white.png" alt="DataWarehouse" width="200" height="50" />
            </a>
            <button class="hamburger hamburger--slider" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
      </div>
      <nav class="navbar-mobile">
        <div class="container-fluid">
          <ul class="navbar-mobile__list list-unstyled">
            @foreach($menugroups as $menugroup)
            <li class="has-sub {{ str_ireplace(' ', '-', strtolower($menugroup['name'])) }}">
              <a class="js-arrow" href="#">
                <i class="{{ $menugroup['icon'] }}"></i>{{ ucwords($menugroup['name']) }}
              </a>
              <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                @foreach($menugroup['menus'] as $menu)
                <li class="{{ str_ireplace(' ', '-', strtolower($menu['name'])) }}">
                  <a href="{{ $menu['link'] }}">{{ ucwords($menu['name']) }}</a>
                </li>
                @endforeach
              </ul>
            </li>
            @endforeach
          </ul>
        </div>
      </nav>
    </header>
    <div class="sub-header-mobile-2 d-block d-lg-none bg-success">
      <div class="header__tool">
        <div class="account-wrap">
          <div class="account-item account-item--style2 clearfix js-item-menu">
            <div class="image">
              <img src="/theme/images/icon/avatar.png" class="img-fluid rounded" alt="Default User" width="45" height="45" />
            </div>
            <div class="content">
              <a class="js-acc-btn" href="#">{{ ucwords(session()->get('firstname').' '.session()->get('lastname')) }}</a>
            </div>
            <div class="account-dropdown js-dropdown">
              <div class="p-2 info clearfix">
                <div class="image">
                  <a href="#">
                    <img src="/theme/images/icon/avatar.png" class="img-fluid rounded mx-auto d-block" alt="Default User" width="45" height="45" />
                  </a>
                </div>
                <div class="content">
                  <h5 class="name">
                    <a href="#">{{ ucwords(session()->get('firstname').' '.session()->get('lastname')) }}</a>
                  </h5>
                  <span class="email">{{ session()->get('email') }}</span>
                </div>
              </div>
              <div class="account-dropdown__body">
                <div class="account-dropdown__item">
                  <a href="/profile">
                    <i class="zmdi zmdi-account"></i>Profile</a>
                </div>
              </div>
              <div class="account-dropdown__footer">
                <a href="/logout">
                  <i class="zmdi zmdi-power"></i>Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END HEADER MOBILE -->