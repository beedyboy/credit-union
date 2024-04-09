<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item d-none d-sm-flex">
          <a href="{{ url('account/dashboard') }}" class="nav-link">Account details</a>
        </li>
        <li class="nav-item d-none d-sm-flex">
          <a href="{{ url('account/transfer') }}" class="nav-link">Transfer</a>
        </li>
        <li class="nav-item d-lg-none">
          <a href="{{ url('account/dashboard') }}" class="nav-link">Account</a>
        </li>
        <li class="nav-item d-lg-none">
          <a href="{{ url('account/transfer') }}" class="nav-link">Transfer</a>
        </li>
        <li class="nav-item d-lg-none">
          <a href="#" class="nav-link">BPay</a>
        </li>
        <li class="nav-item d-lg-none">
          <a href="#" class="nav-link">Mobile deposit</a>
        </li>
        <li class="nav-item dropdown d-none d-sm-none d-lg-flex">
          <a class="nav-link dropdown-toggle" id="quickDropdown" href="#" role="button" data-toggle="dropdown" aria-expanded="false">More</a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown pt-3" aria-labelledby="quickDropdown">
            <a href="{{ url('loans') }}" class="dropdown-item">Loans</a>
            <a href="{{ url('investment') }}" class="dropdown-item">Investments</a>
            <a href="#" class="dropdown-item">Branch Locator</a>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <div class="ml-auto">
    <ul class="navbar-nav">
      <li class="nav-item dropdown d-xl-inline-block">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          <!-- <span class="profile-text d-md-inline-flex d-lg-none">{{ $user['short_name'] }}</span> -->
          <span class="profile-text d-none d-lg-inline-flex">{{ $user['short_name'] }}</span>
          <img class="img-xs rounded-circle" src="{{ !empty($user['logo']) ? asset('dist/img/'.$user['logo']) : url('assets/images/faces-clipart/pic-1.png') }}" alt="Profile image">
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-item py-2">
            <span class="profile-text">{{ $user['name'] }}</span>
          </div>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ url('settings') }}">
            <i class="mdi mdi-settings-outline mr-2"></i>Settings
          </a>
          <a class="dropdown-item" href="{{ url('settings/notifications') }}">
            <i class="mdi mdi-bell-outline mr-2"></i>Notifications
          </a>
          <a class="dropdown-item" href="{{ url('auth') }}">
            <i class="mdi mdi-logout mr-2"></i>Sign Out
          </a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="offcanvas offcanvas-left" id="mobileDrawer" tabindex="-1">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Menu</h5>
    <button type="button" class="close" data-toggle="offcanvas" data-target="#mobileDrawer" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
