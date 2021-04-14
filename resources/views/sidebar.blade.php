<div class="sidebar-menu sticky-sidebar-menu">

    <!-- logo start -->
    <div class="logo">
      <h1><a href="{{ route('dashboard') }}">Admin</a></h1>
    </div>

    <div class="logo-icon text-center">
      <a href="{{ route('dashboard') }}" title="logo"><img src="{{ asset('') }}assets/images/logo.png" alt="logo-icon"> </a>
    </div>
    <!-- //logo end -->

    <div class="sidebar-menu-inner">

      <!-- sidebar nav start -->
      <ul class="nav nav-pills nav-stacked custom-nav">
        <li class="active"><a href="{{ route('dashboard') }}"><i class="fa fa-tachometer"></i><span> Trang chủ</span></a></li>
        <li><a href="{{ route('new-bacarat-game') }}"><i class="fa fa-gamepad"></i><span> Bacarat game</span></a>
        <li class="menu-list d-none">
          <a href="#"><i class="fa fa-cogs"></i>
            <span>Elements <i class="lnr lnr-chevron-right"></i></span></a>
          <ul class="sub-menu-list">
            <li><a href="carousels.html">Carousels</a> </li>
            <li><a href="cards.html">Default cards</a> </li>
            <li><a href="people.html">People cards</a></li>
          </ul>
        </li>
        <li class="d-none"><a href="pricing.html"><i class="fa fa-table"></i> <span>Pricing tables</span></a></li>
        <li class="d-none"><a href="blocks.html"><i class="fa fa-th"></i> <span>Content blocks</span></a></li>
        <li class="d-none"><a href="forms.html"><i class="fa fa-file-text"></i> <span>Forms</span></a></li>
      </ul>
      <!-- //sidebar nav end -->
      <!-- toggle button start -->
      <a class="toggle-btn">
        <i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>
        <i class="fa fa-angle-double-right menu-collapsed__right"></i>
      </a>
      <!-- //toggle button end -->
    </div>
  </div>