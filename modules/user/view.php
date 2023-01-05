<section class="content-header">
  <h1>
    <i class="fa fa-users icon-title"></i> Manajemen User

    <a class="btn btn-primary btn-social pull-right" href="?module=form_user&form=add" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>

  </h1>
</section>

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
        Data user baru berhasil disimpan.
        </div>";
      }

      elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
        Data user berhasil diubah.
        </div>";
      }

      elseif ($_GET['alert'] == 3) {
        echo "<div class='alert alert-success alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
        User berhasil diaktifkan.
        </div>";
      }

      elseif ($_GET['alert'] == 4) {
        echo "<div class='alert alert-success alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
        User berhasil diblokir.
        </div>";
      }

      elseif ($_GET['alert'] == 5) {
        echo "<div class='alert alert-danger alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4>  <i class='icon fa fa-times-circle'></i> Upload Gagal!</h4>
        Pastikan file yang diupload sudah benar.
        </div>";
      }

      elseif ($_GET['alert'] == 6) {
        echo "<div class='alert alert-danger alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4>  <i class='icon fa fa-times-circle'></i> Upload Gagal!</h4>
        Pastikan ukuran foto tidak lebih dari 1MB.
        </div>";
      }

      elseif ($_GET['alert'] == 7) {
        echo "<div class='alert alert-danger alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4>  <i class='icon fa fa-times-circle'></i> Upload Gagal!</h4>
        Pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG.
        </div>";
      }

      elseif ($_GET['alert'] == 8) {
        echo "<div class='alert alert-success alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
        User berhasil dihapus.
        </div>";
      }
      ?>

      <div class="box box-primary">
        <div class="box-body">
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Foto</th>
                <th class="center">Username</th>
                <th class="center">Nama User</th>
                <th class="center">Hak Akses</th>
                <th class="center">Status</th>
                <th class="center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 

              $no    = 1;
              $query = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id_user DESC");
              while ($data = mysqli_fetch_assoc($query)) { 

                ?>

                <tr class="text-center">
                  <td><?= $no ?></td>

                  <?php if ($data['foto']=="") { ?>
                    <td><img class='img-user' src='images/user/boy.png' width='45'></td>
                    <?php
                  } else { ?>
                    <td><img class='img-user' src='images/user/<?= $data['foto']; ?>' width='45'></td>
                    <?php
                  }
                  ?>  
                  <td><?= $data["username"] ?></td>
                  <td><?= $data["nama_user"] ?></td>
                  <td><?= $data["hak_akses"] ?></td>
                  <td><?= $data["status"] ?></td>
                  <td>
                    <?php  

                    if ($data['hak_akses'] != 'Super Admin') {


                      ?>
                      <div class="btn-group">

                        <?php if ($data['status']=='aktif') { ?>
                          <a data-toggle="tooltip" data-placement="top" title="Blokir" class="btn btn-warning btn-sm" href="modules/user/proses.php?act=off&id=<?php echo $data['id_user'];?>">
                            <i style="color:#fff" class="glyphicon glyphicon-off"></i>
                          </a>
                          <?php
                        } 
                        else { ?>
                          <a data-toggle="tooltip" data-placement="top" title="Aktifkan" class="btn btn-success btn-sm" href="modules/user/proses.php?act=on&id=<?php echo $data['id_user'];?>">
                            <i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                          </a>
                          <?php
                        }
                        ?>
                        <a data-toggle="tooltip" data-placement="top" title="Ubah" class="btn btn-info btn-sm" href="?module=form_user&form=edit&id=<?= $data['id_user'] ?>">
                          <i style="color:#fff" class="glyphicon glyphicon-edit"></i>
                        </a>

                        <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/user/proses.php?act=delete&id=<?= $data['id_user'];?>&foto=<?= $data['foto'];?>" onclick="return confirm('Anda yakin ingin menghapus <?= $data['nama_user']; ?> ?');">
                          <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                        </a>

                      </div>

                      <?php 
                    }

                    ?>

                  </td>
                </tr>
                <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>  
</section>