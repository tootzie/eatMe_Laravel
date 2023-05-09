
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <br/>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/user*') ? 'active' : ''}}" href="/dashboard/user">
            <span data-feather="user"></span>
            User
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/bisnis*') ? 'active' : ''}}" href="/dashboard/bisnis">
            <span data-feather="briefcase"></span>
            Bisnis Kuliner
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/ewallet*') ? 'active' : ''}}" href="/dashboard/ewallet">
            <span data-feather="dollar-sign"></span>
            E-Wallet
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/validasibisnis*') ? 'active' : ''}}" href="/dashboard/validasibisnis">
            <span data-feather="file-text"></span>
            Validasi Bisnis Kuliner
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/transaksi*') ? 'active' : ''}}" href="/dashboard/transaksi">
            <span data-feather="shopping-cart"></span>
            Transaksi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/pendapatan*') ? 'active' : ''}}" href="/dashboard/pendapatan">
            <span data-feather="activity"></span>
            Pendapatan Bisnis Kuliner
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/komplain*') ? 'active' : ''}}" href="/dashboard/komplain">
            <span data-feather="alert-circle"></span>
            Komplain
          </a>
        </li>
      </ul>
    </div>
  </nav>