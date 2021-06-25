<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
              <a class="dropdown-item" href="{{ url('logout') }}">
                <i class="ik ik-unlock dropdown-icon"></i>
                {{ __('Login')}}
              </a>
              <a class="dropdown-item" href="{{ url('signup') }}">
                <i class="ik ik-users dropdown-icon"></i>
                {{ __('Registration')}}
              </a>
            </div>
        </div>
    </div>
</header>
