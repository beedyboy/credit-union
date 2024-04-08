<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item d-none d-xl-flex">
          <a href="{{ url('account/dashboard') }}" class="nav-link">Account</a>
        </li>
        <li class="nav-item d-none d-md-flex">
          <a href="{{ url('account/dashboard') }}" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item d-none d-md-flex">
          <a href="{{ url('account/transfer') }}" class="nav-link">Transfers</a>
        </li>
        <li class="nav-item dropdown d-none d-lg-flex">
          <a class="nav-link dropdown-toggle" id="quickDropdown" href="#" role="button" data-toggle="dropdown" aria-expanded="false">More</a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown pt-3" aria-labelledby="quickDropdown">
            <a href="{{ url('loans') }}" class="dropdown-item">Loans</a>
            <a href="{{ url('investment') }}" class="dropdown-item">Investments</a>
            <a href="#" class="dropdown-item">Branch Locator</a>
          </div>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown d-xl-inline-block">
          <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            <span class="profile-text d-md-inline-flex">{{ $user['name'] }}</span>
            <img class="img-xs rounded-circle" src="{{ !empty($user['logo']) ? asset('dist/img/'.$user['logo']) : url('assets/images/faces-clipart/pic-1.png') }}" alt="Profile image">
            <!-- <img class="img-xs rounded-circle" src="{{ url('assets/images/faces/face8.jpg') }}" alt="Profile image"> -->
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="d-flex border-bottom w-100 justify-content-center">
              <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                <a class="dropdown-item p-0" href="{{ url('settings') }}">
                  <i class="mdi mdi-settings-outline mr-0 text-gray"></i>
                </a>
              </div>
              <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                <a class="dropdown-item p-0" href="{{ url('settings/notifications') }}"> <i class="mdi mdi-bell-outline mr-0 text-gray"></i>
                </a>
              </div>
              <div class="py-3 px-4 d-flex align-items-center justify-content-center">

                <a class="dropdown-item p-0" href="{{ url('auth') }}"> <i class="mdi mdi-logout mr-0 text-gray"></i>
                </a>
              </div>
            </div>
            <a class="dropdown-item" href="{{ url('/auth') }}" style="color: #000000;">Sign Out</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>