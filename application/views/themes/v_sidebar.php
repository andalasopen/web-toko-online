<?php

echo "<body id='page-top'>
  <div id='wrapper'>";


echo "<ul class='navbar-nav bg-gradient-primary sidebar sidebar-dark accordion' id='caccordionSidebar'>";
echo "<a class='sidebar-brand d-flex align-items-center justify-content-center' href='" . base_url() . "'>
          <div class='sidebar-brand-icon'>
              <i class='fas fa-bags-shopping'></i>
          </div>
          <div class='sidebar-brand-text mx-3'>OLSHOP</div>
      </a>";
$menu = $this->db->query('SELECT * FROM menu');
foreach ($menu->result_array() as $rows) {

  echo "<li class='nav-item'>
            <a class='nav-link' href='" . base_url() . "$rows[url_menu]'>
                 <i class='$rows[icon_menu]'></i>
                <span>$rows[title_menu]</span></a>
         </li>";
}
echo "<hr class='sidebar-divider d-none d-md-block'>";

echo "<div class='text-center d-none d-md-inline'>
      <button class='rounded-circle border-0' id='sidebarToggle'></button>
      </div>";
echo "</ul>";

echo "<div id='content-wrapper' class='d-flex flex-column'>
      <div id='content'>";

echo "<nav class='navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow'>

          <button id='sidebarToggleTop' class='btn btn-link d-md-none rounded-circle mr-3'>
            <i class='fas fa-bars'></i>
          </button>";

echo "<form class='d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search'>
        <div class='input-group'>
          <input type='text' class='form-control bg-light border-0 small' placeholder='Search for...' aria-label='Search' aria-describedby='basic-addon2'>
          <div class='input-group-append'>
            <button class='btn btn-primary' type='button'>
              <i class='fad fa-search fa-sm'></i>
            </button>
          </div>
        </div>
        </form>";

echo "<ul class='navbar-nav ml-auto'>

          <li class='nav-item dropdown no-arrow d-sm-none'>
              <a class='nav-link dropdown-toggle' href='#' id='searchDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <i class='fad fa-search fa-fw'></i>
              </a>
              <div class='dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in' aria-labelledby='searchDropdown'>
                <form class='form-inline mr-auto w-100 navbar-search'>
                  <div class='input-group'>
                    <input type='text' class='form-control bg-light border-0 small' placeholder='Search for...' aria-label='Search' aria-describedby='basic-addon2'>
                    <div class='input-group-append'>
                      <button class='btn btn-primary' type='button'>
                        <i class='fad fa-search fa-sm'></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>";



echo "<div class='navbar'>
        <ul class='nav navbar-nav navbar-right'>
          <li>
            <i class='fas fa-shopping-cart fa-2x'></i>
          </li>
        </ul>";



echo "<div class='topbar-divider d-none d-sm-block'></div>
      <ul class='nav navbar-nav navbar-right'>
        <li class='ml-2'>" . anchor('auth/login', 'login') . "</li>
      </ul>";


echo "</div";
echo "</ul>";

echo "</nav>";
