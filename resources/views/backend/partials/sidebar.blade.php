<?php
	$segment =  Request::segment(2);
	$sub_segment =  Request::segment(3);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?=url('backend/dashboard');?>" class="brand-link">
    <img src="<?=url(getData('logo'));?>" alt="Lala Service Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Lala Service</span>
  </a>
        
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?=$avatar;?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?=url('backend/users-user/'.$userinfo['user_id'])?>" class="d-block"><?=$userinfo['firstname']." ".$userinfo['lastname']?></a>
      </div>
    </div>
        
        
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item {{ ($segment == 'dashboard' ? 'active' : '') }}">
          <a href="<?=url('backend/dashboard');?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p> Dashboard </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              System Admin
              <i class="fas fa-angle-right right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item {{ ($segment == 'setting' ? 'active' : '') }}">
              <a href="<?=url('backend/setting');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Setting</p>
              </a>
            </li>
            <?php
              // SUPER ADMIN //
              if ($userinfo['user_level_id'] == 1):
            ?>
            <li class="nav-item {{ ($segment == 'modules' ? 'active' : '') }}">
              <a href="<?=url('backend/modules');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Modules</p>
              </a>
            </li>
            <?php
              endif;
            ?>
            <li class="nav-item {{ ($segment == 'access-control' ? 'active' : '') }}">
              <a href="<?=url('backend/access-control');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Access Control</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{ ((($segment == 'users-level') || ($segment == 'users-user')) ? 'active' : '') }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Membership
              <i class="fas fa-angle-right right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item {{ ($segment == 'users-level' ? 'active' : '') }}">
              <a href="<?=url('backend/users-level');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Master User Level</p>
              </a>
            </li>
            <li class="nav-item {{ ($segment == 'users-user' ? 'active' : '') }}">
              <a href="<?=url('backend/users-user');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Master User</p>
              </a>
            </li>
          </ul>
        </li>
        <li class=" nav-item {{ ($segment == 'media-library' ? 'active' : '') }}">
          <a href="<?=url('backend/media-library');?>" class="nav-link">
            <i class="nav-icon fas fa-images"></i> 
            <p>Media Library</p>
          </a>
        </li>

        <li class="nav-header">MASTER</li>
          <li class="nav-item {{ ($segment == 'supplier' ? 'active' : '') }}">
            <a href="<?=url('backend/supplier');?>" class="nav-link">
              <i class="nav-icon fas fa-suitcase"></i>
              <p> Master Supplier </p>
            </a>
          </li>
          <li class="nav-item {{ ($segment == 'barang' ? 'active' : '') }}">
            <a href="<?=url('backend/barang');?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p> Master Barang </p>
            </a>
          </li>
        
        <li class="nav-header">TRANSAKSI</li>
          <li class="nav-item {{ ($segment == 'inden' ? 'active' : '') }}">
            <a href="<?=url('backend/inden');?>" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p> Daftar Inden </p>
            </a>
          </li>
          <li class="nav-item {{ ($segment == 'purchase-order' ? 'active' : '') }}">
            <a href="<?=url('backend/purchase-order');?>" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p> Purchase Order </p>
            </a>
          </li>
          <li class="nav-item {{ ($segment == 'penjualan' ? 'active' : '') }}">
            <a href="<?=url('backend/penjualan');?>" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p> Penjualan </p>
            </a>
          </li>
          <li class="nav-item {{ ($segment == 'koreksi-stok' ? 'active' : '') }}">
            <a href="<?=url('backend/koreksi-stok');?>" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p> Koreksi Stok </p>
            </a>
          </li>

        <li class="nav-header">LAPORAN</li>
          <li class="nav-item {{ ((($segment == 'report-purchase') || ($segment == 'report-penjualan') || ($segment == 'report-stok')) ? 'active' : '') }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Laporan
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ ($segment == 'report-purchase' ? 'active' : '') }}">
                <a href="<?=url('backend/report-purchase');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Order</p>
                </a>
              </li>
              <li class="nav-item {{ ($segment == 'report-penjualan' ? 'active' : '') }}">
                <a href="<?=url('backend/report-penjualan');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item {{ ($segment == 'report-stok' ? 'active' : '') }}">
                <a href="<?=url('backend/report-stok');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok</p>
                </a>
              </li>
            </ul>
          </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>