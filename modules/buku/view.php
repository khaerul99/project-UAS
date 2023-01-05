<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-book icon-title"></i> Data Buku
    <a class="btn btn-primary btn-social pull-right" href="?module=form_buku&form=add" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

      <?php  

      if (empty($_GET['alert'])) {
        echo "";
      } 

      elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-success alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
        Data buku baru berhasil disimpan.
        </div>";
      }

      elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
        Data buku berhasil diubah.
        </div>";
      }

      elseif ($_GET['alert'] == 3) {
        echo "<div class='alert alert-success alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
        Data buku berhasil dihapus.
        </div>";
      }
      elseif ($_GET['alert'] == 4) {
        echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        <strong><i class='fa fa-check-circle'></i> Upload Gagal!</strong> Pastikan file yang diupload sudah benar.
        </div>";
      }    elseif ($_GET['alert'] == 5) {
        echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        <strong><i class='fa fa-check-circle'></i> Upload Gagal!</strong> Pastikan ukuran foto tidak lebih dari 1MB.
        </div>";
      }
      elseif ($_GET['alert'] == 6) {
        echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        <strong><i class='fa fa-check-circle'></i> Upload Gagal!</strong> Pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG.
        </div>";
      }
      elseif ($_GET['alert'] == 7) {
        echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        <strong><i class='fa fa-check-circle'></i> Tidak bisa hapus buku!</strong> ada data buku masuk dan buku keluar
        </div>";
      }
      ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel obat -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Kode Buku</th>
                <th class="center">Judul Buku</th>
                <th class="center">Cover</th>
                <th class="center">Genre</th>
                <th class="center">Penulis</th>
                <th class="center">Penerbit</th>
                <th class="center">Tahun Terbit</th>
                <th class="center">Stok</th>
                <th class="center">Aksi</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
              
              <?php  
              $no = 1;

              $query = mysqli_query($mysqli, "SELECT * FROM buku ORDER BY kode_buku DESC");

              while ($data = mysqli_fetch_assoc($query)) { 

                ?>

                <tr class="text-center">
                  <td><?= $no ?></td>
                  <td><?= $data['kode_buku'] ?></td>
                  <td><?= $data['judul_buku'] ?></td>
                  <td><img src="images/buku/<?= $data['cover'] ?>" width="200px;"></td>
                  <td><?= $data['genre'] ?></td>
                  <td><?= $data['penulis'] ?></td>
                  <td><?= $data['penerbit'] ?></td>
                  <td><?= $data['tahun_terbit'] ?></td>
                  <td><?= $data['stok'] ?></td>
                  <td class='text-center'>
                    <div class="btn-group">
                      <a data-toggle="tooltip" data-placement="top" title="Ubah" class="btn btn-success btn-sm" href="?module=form_buku&form=edit&id=<?= $data['kode_buku'] ?>">
                       <i style="color:#fff" class="glyphicon glyphicon-edit"></i>
                     </a>
                     <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/buku/proses.php?act=delete&id=<?= $data['kode_buku'];?>&cover=<?= $data['cover'];?>" onclick="return confirm('Anda yakin ingin menghapus <?php echo $data['judul_buku']; ?> ?');">
                      <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                    </a>
                  </div>
                </td>
              </tr>
              <?php 
              $no++;
            }
            ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!--/.col -->
</div>   <!-- /.row -->
</section><!-- /.content