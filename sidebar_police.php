
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
      <img src="dist/img/BACCIMS.png" alt="Logo"  class="brand-image">
      <span class="brand-text">BACCIMS</span>
    
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://cdn-icons-png.flaticon.com/512/1022/1022331.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a data-toggle="modal" role="button" data-target="#profile" class="d-block"><?php if (isset($_SESSION['USERNAME'])) {
                                        echo $_SESSION['USERNAME'];
                                      } ?></a>
          <a data-toggle="modal" role="button" data-target="#profile" class="small mt-0 pt-0">
           Police
                                        
                                        
         </a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-close">
            <a id="sidebar-info-board" class="nav-link " role="button">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Info Board
              </p>
            </a>
           </li>
           <li class="nav-item menu-close">
            <a id="sidebar-reports"  class="nav-link " role="button">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Reports
              </p>
            </a>
           </li>
             <li class="nav-item menu-close">
            <a id="sidebar-form" class="nav-link " role="button">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Incident Record Form
              </p>
            </a>
           </li>
            <li class="nav-item menu-close">
            <a id="sidebar-map" class="nav-link " role="button">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Crime Map
              </p>
            </a>
           </li>
            <li class="nav-item menu-close">
            <a id="sidebar-message" class="nav-link " role="button">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
              Alert Message
              </p>
            </a>
           </li>
           <li class="nav-item menu-close">
            <a id="sidebar-contact" class="nav-link " role="button">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
              About Us
              </p>
            </a>
           </li>
           <li class="nav-item menu-close">
            <a id="sidebar-help" class="nav-link " role="button">
              <i class="nav-icon fas fa-question"></i>
              <p>
              Help
              </p>
            </a>
           </li>
        </ul>
      </nav>


      <!-- /.sidebar-menu -->



    </div>
    <!-- /.sidebar -->
  </aside>