  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-dashboard icon-title"></i> Dashboard
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p style="font-size:15px">
            <i class="icon fa fa-user"></i> Selamat datang <strong><?php echo $_SESSION['nama_user']; ?></strong> di Aplikasi Stok Buku
          </p>        
        </div>
      </div>
    </div>

    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <?php  
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($mysqli, "SELECT COUNT(kode_buku) as jumlah FROM buku");
            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data Buku</p>
          </div>
          <div class="icon">
            <i class="fa fa-folder"></i>
          </div>
          <?php  
          if ($_SESSION['hak_akses']!='admin') { ?>
            <a href="?module=form_buku&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
            <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
            <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00a65a;color:#fff" class="small-box">
          <div class="inner">
            <?php   
            // fungsi query untuk menampilkan data dari tabel obat masuk
            $query = mysqli_query($mysqli, "SELECT COUNT(kode_transaksi) as jumlah FROM buku_masuk");

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data Buku Masuk</p>
          </div>
          <div class="icon">
            <i class="fa fa-arrow-circle-left"></i>
          </div>
          <?php  
          if ($_SESSION['hak_akses']!='admin') { ?>
            <a href="?module=form_buku_masuk&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
            <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
            <?php
          }
          ?>
        </div>
      </div>
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background-color:steelblue;color:#fff" class="small-box">
          <div class="inner">
            <?php   
            // fungsi query untuk menampilkan data dari tabel obat masuk
            $query = mysqli_query($mysqli, "SELECT COUNT(kode_transaksi) as jumlah FROM buku_keluar");

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data Obat Keluar</p>
          </div>
          <div class="icon">
            <i class="fa fa-arrow-circle-right"></i>
          </div>
          <?php  
          if ($_SESSION['hak_akses']!='admin') { ?>
            <a href="?module=form_buku_keluar&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
            <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
    
    
  </section><!-- /.content -->