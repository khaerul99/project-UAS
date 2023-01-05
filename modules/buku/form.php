<?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Buku
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=buku"> Buku </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" enctype="multipart/form-data" action="modules/buku/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  

              $query_id = mysqli_query($mysqli, "SELECT RIGHT(kode_buku,6) as kode FROM buku
                ORDER BY kode_buku DESC LIMIT 1");

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {

                $data_id = mysqli_fetch_assoc($query_id);
                $kode    = $data_id['kode']+1;
              } else {
                $kode = 1;
              }

              $buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
              $kode_buku = "B$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Buku</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_buku" value="<?php echo $kode_buku; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Judul Buku</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="judul_buku" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Cover</label>
                <div class="col-sm-5">
                  <input type="file" class="form-control" name="cover" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Genre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="genre" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Penulis</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="penulis" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Penerbit</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="penerbit" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tahun Terbit</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tahun_terbit" autocomplete="off" required>
                </div>
              </div>


            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=buku" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->

  <?php
}
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {

    $query = mysqli_query($mysqli, "SELECT * FROM buku WHERE kode_buku='$_GET[id]'");
    $data  = mysqli_fetch_assoc($query);
  }
  ?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Buku
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=buku"> Buku </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" enctype="multipart/form-data" action="modules/buku/proses.php?act=update" method="POST">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Buku</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_buku" value="<?php echo $data['kode_buku']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Judul Buku</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="judul_buku" autocomplete="off" value="<?php echo $data['judul_buku']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="col-sm-2 control-label">Cover</label>
                  <div class="col-sm-5">
                    <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/buku/<?php echo $data['cover']; ?>" width="150px">
                  </div>
                </div>
                <div class="row" style="padding-top: 10px;">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-5">
                    <input type="file" class="form-control" name="cover" autocomplete="off">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Genre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="genre" autocomplete="off" value="<?php echo $data['genre']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Penulis</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="penulis" autocomplete="off" value="<?php echo $data['penulis']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Penerbit</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="penerbit" autocomplete="off" value="<?php echo $data['penerbit']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tahun Terbit</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tahun_terbit" autocomplete="off" value="<?php echo $data['tahun_terbit']; ?>" required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=buku" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
  <?php
}
?>