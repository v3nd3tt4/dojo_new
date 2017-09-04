<!-- Side-Nav-->
<aside class="main-sidebar hidden-print">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image" class="img-circle"></div>
      <div class="pull-left info">
        <p>John Doe</p>
        <p class="designation">Frontend Developer</p>
      </div>
    </div>
    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">
      <li <?=$link == '' || $link == 'dashboard' ? 'class="active"' : '' ?>><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
      
      <li class="treeview <?=$link == 'kelas' ? 'active' : '' ?>"><a href="#"><i class="fa fa-file-text"></i><span>Master</span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li class="<?=$link == 'kelas' ? 'activenew' : '' ?>"><a href="<?=base_url()?>kelas"><i class="fa fa-building-o"></i> Data Kelas</a></li>
          <li><a href="#"><i class="fa fa-calendar"></i>  Data Jam</a></li>
          <li><a href="#"><i class="fa fa-calendar"></i>  Data Hari</a></li>
          <li><a href="#"><i class="fa fa-calendar"></i>  Data User</a></li>
        </ul>
      </li>
      <li class="treeview <?=$link == 'penjadwalan' ? 'active' : '' ?>"><a href="#"><i class="fa fa-file-text"></i><span>Penjadwalan</span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-calendar"></i>  Buat Jadwal</a></li>
        </ul>
      </li>
    </ul>
  </section>
</aside>