<?php 

if ($_SESSION['hak_akses']=='Super Admin') { ?>

  <ul class="sidebar-menu">
    <li class="header">MAIN MENU</li>

    <?php 

    if ($_GET["module"]=="beranda") { ?>
      <li class="active">
        <a href="?module=beranda">
          <i class="fa fa-dashboard"></i> Dashboard 
        </a>
      </li>
      <?php
    }else { 
      ?>
      <li>
       <a href="?module=beranda">
        <i class="fa fa-dashboard"></i> Dashboard 
      </a>
    </li>
    <?php
  }

  if ($_GET["module"]=="buku" || $_GET["module"]=="form_buku") { ?>
    <li class="active">
      <a href="?module=buku">
        <i class="fa fa-folder"></i> Data Buku 
      </a>
    </li>
    <?php
  }
  else { ?>
    <li>
      <a href="?module=buku">
        <i class="fa fa-folder"></i> Data Buku
      </a>
    </li>
    <?php
  }

  if ($_GET["module"]=="buku_masuk" || $_GET["module"]=="form_buku_masuk") { ?>
    <li class="active">
      <a href="?module=buku_masuk">
        <i class="fa fa-arrow-circle-left"></i> Data Buku Masuk 
      </a>
    </li>
    <?php
  }
  
  else { ?>
    <li>
      <a href="?module=buku_masuk">
        <i class="fa fa-arrow-circle-left"></i> Data Buku Masuk 
      </a>
    </li>
    <?php
  }

  if ($_GET["module"]=="buku_keluar" || $_GET["module"]=="form_buku_keluar") { ?>
    <li class="active">
      <a href="?module=buku_keluar">
        <i class="fa fa-arrow-circle-right"></i> Data Buku Keluar 
      </a>
    </li>
    <?php
  }
  
  else { ?>
    <li>
      <a href="?module=buku_keluar">
        <i class="fa fa-arrow-circle-right"></i> Data Buku Keluar 
      </a>
    </li>
    <?php
  }

  if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
    <li class="active">
     <a href="?module=user">
      <i class="fa fa-users"></i> Manajemen User
    </a>
  </li>
  <?php
}
else { ?>
  <li>
   <a href="?module=user">
    <i class="fa fa-users"></i> Manajemen User
  </a>
</li>
<?php
}

if ($_GET["module"]=="password") { ?>
  <li class="active">
   <a href="?module=password">
    <i class="fa fa-lock"></i> Ubah Password
  </a>
</li>
<?php
}

else { ?>
  <li>
   <a href="?module=password">
    <i class="fa fa-lock"></i> Ubah Password
  </a>
</li>
<?php
}
?>
</ul>
<?php
}

if ($_SESSION['hak_akses']=='Petugas') { ?>
	
  <ul class="sidebar-menu">
    <li class="header">MAIN MENU</li>

    <?php 

    if ($_GET["module"]=="beranda") { ?>
      <li class="active">
        <a href="?module=beranda">
          <i class="fa fa-dashboard"></i> Dashboard 
        </a>
      </li>
      <?php
    }else { 
      ?>
      <li>
       <a href="?module=beranda">
        <i class="fa fa-dashboard"></i> Dashboard 
      </a>
    </li>
    <?php
  }

  if ($_GET["module"]=="buku" || $_GET["module"]=="form_buku") { ?>
    <li class="active">
      <a href="?module=buku">
        <i class="fa fa-folder"></i> Data Buku 
      </a>
    </li>
    <?php
  }
  else { ?>
    <li>
      <a href="?module=buku">
        <i class="fa fa-folder"></i> Data Buku
      </a>
    </li>
    <?php
  }

  if ($_GET["module"]=="buku_masuk" || $_GET["module"]=="form_buku_masuk") { ?>
    <li class="active">
      <a href="?module=buku_masuk">
        <i class="fa fa-arrow-circle-left"></i> Data Buku Masuk 
      </a>
    </li>
    <?php
  }
  
  else { ?>
    <li>
      <a href="?module=buku_masuk">
        <i class="fa fa-arrow-circle-left"></i> Data Buku Masuk 
      </a>
    </li>
    <?php
  }

  if ($_GET["module"]=="buku_keluar" || $_GET["module"]=="form_buku_keluar") { ?>
    <li class="active">
      <a href="?module=buku_keluar">
        <i class="fa fa-arrow-circle-right"></i> Data Buku Keluar 
      </a>
    </li>
    <?php
  }
  
  else { ?>
    <li>
      <a href="?module=buku_keluar">
        <i class="fa fa-arrow-circle-right"></i> Data Buku Keluar 
      </a>
    </li>
    <?php
  }

  if ($_GET["module"]=="password") { ?>
    <li class="active">
     <a href="?module=password">
      <i class="fa fa-lock"></i> Ubah Password
    </a>
  </li>
  <?php
}

else { ?>
  <li>
   <a href="?module=password">
    <i class="fa fa-lock"></i> Ubah Password
  </a>
</li>
<?php
}
?>
</ul>
<?php
}
?>