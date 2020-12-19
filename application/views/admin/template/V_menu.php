<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


  <!-- Add icons to the links using the . class with font-awesome or any other icon font library -->
  <li class="nav-item">
    <a href="<?php echo site_url('C_home_admin') ?>" class="nav-link <?php if (isset($mn_home)) echo $mn_home;
                                                                      else echo ""; ?>">
      <i class="fa fa-tachometer"></i>
      <p>Home</p>
    </a>
  </li>

  <li class="nav-item nav-header">
    <a class="nav-link active">
      <center>
        <b>MENU</b>
      </center>
    </a>
  </li>

  <li class="nav-item user-panel">
    <a href="<?php echo site_url('C_menu_makanan') ?>" class="nav-link 
        <?php if (isset($mn_menu_makanan)) echo $mn_menu_makanan;
        else echo ""; ?>">
      <i class="fa fa-book"></i>
      <p>Menu Makanan</p>
    </a>
  </li>

  <!-- <li class="nav-item user-panel">
    <a href="<?php echo site_url('C_menu_pesta') ?>" class="nav-link 
        <?php if (isset($mn_menu_pesta)) echo $mn_menu_pesta;
        else echo ""; ?>">
      <i class="fa fa-book"></i>
      <p>Menu Pesta</p>
    </a>
  </li> -->

  <li class="nav-item user-panel">
    <a href="<?php echo site_url('C_pelanggan') ?>" class="nav-link 
        <?php if (isset($mn_pelanggan)) echo $mn_pelanggan;
        else echo ""; ?>">
      <i class="fa fa-users"></i>
      <p>Data Pelanggan</p>
    </a>
  </li>

  <li class=" nav-item user-panel">
    <a href="<?php echo site_url('admin/C_sewa_lapangan') ?>" class="nav-link
        <?php if (isset($mn_sewa_lapangan)) echo $mn_sewa_lapangan;
        else echo ""; ?>">
      <i class="fa fa-desktop"></i>
      <p>Data Pesanan Masuk</p>
    </a>
  </li>

  <li class=" nav-item user-panel">
    <a href="<?php echo site_url('C_pengeluaran') ?>" class="nav-link
        <?php if (isset($mn_pengeluaran)) echo $mn_pengeluaran;
        else echo ""; ?>">
      <i class="fa fa-money"></i>
      <p>Data Pengeluaran</p>
    </a>
  </li>

  <li class="nav-item user-panel">
    <a href="<?php echo site_url('C_karyawan') ?>" class="nav-link 
        <?php if (isset($mn_karyawan)) echo $mn_karyawan;
        else echo ""; ?>">
      <i class="fa fa-spoon"></i>
      <p>Data Karyawan</p>
    </a>
  </li>

  <li class="nav-item user-panel">
    <a href="<?php echo site_url('C_user') ?>" class="nav-link 
        <?php if (isset($mn_user)) echo $mn_user;
        else echo ""; ?>">
      <i class="fa fa-user"></i>
      <p>Data User</p>
    </a>
  </li>

  <li class="nav-item user-panel">
    <a href="<?php echo site_url('admin/C_laporan') ?>" class="nav-link 
        <?php if (isset($mn_laporan)) echo $mn_laporan;
        else echo ""; ?>">
      <i class="fa fa-files-o"></i>
      <p>Laporan</p>
    </a>
  </li>

</ul>