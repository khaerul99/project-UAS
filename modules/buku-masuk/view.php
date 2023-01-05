
<section class="content-header">
  <h1>
    <i class="fa fa-arrow-circle-left icon-title"></i> Data Buku Masuk

    <a class="btn btn-primary btn-social pull-right" href="?module=form_buku_masuk&form=add" title="Tambah Data" data-toggle="tooltip">
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
        Data Buku Masuk berhasil disimpan.
        </div>";
      }
      ?>

      <div class="box box-primary">
        <div class="box-body">

          <table id="dataTables1" class="table table-bordered table-striped table-hover">

            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Kode Transaksi</th>
                <th class="center">Tanggal</th>
                <th class="center">Kode Buku</th>
                <th class="center">Judul Buku</th>
                <th class="center">Jumlah Masuk</th>
              </tr>
            </thead>
            
            <tbody>
              <?php  
              $no = 1;

              $query = mysqli_query($mysqli, "SELECT a.kode_transaksi,a.tanggal_masuk,a.kode_buku,a.jumlah_masuk,b.kode_buku,b.judul_buku FROM buku_masuk as a INNER JOIN buku as b ON a.kode_buku=b.kode_buku ORDER BY kode_transaksi DESC");

              while ($data = mysqli_fetch_assoc($query)) { 
                $tanggal   = tgl_eng_to_ind($data['tanggal_masuk']);
                ?>

                <tr class="text-center">
                  <td><?= $no ?></td>
                  <td><?= $data['kode_transaksi'] ?></td>
                  <td><?= $tanggal ?></td>
                  <td><?= $data['kode_buku'] ?></td>
                  <td><?= $data['judul_buku'] ?></td>
                  <td><?= $data['jumlah_masuk'] ?></td>
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