<script type="text/javascript">
  function tampil_buku(input){
    var num = input.value;

    $.post("modules/buku-keluar/buku.php", {
      dataidbuku: num,
    }, function(response) {      
      $('#stok').html(response)

      document.getElementById('jumlah_keluar').focus();
    });
  }

  function cek_jumlah_keluar(input) {
    jml = document.formBukuKeluar.jumlah_keluar.value;
    var jumlah = eval(jml);
    if(jumlah < 1){
      alert('Jumlah Keluar Tidak Boleh Nol !!');
      input.value = input.value.substring(0,input.value.length-1);
    }
  }

  function hitung_total_stok() {
    bil1 = document.formBukuKeluar.stok.value;
    bil2 = document.formBukuKeluar.jumlah_keluar.value;

    // if (bil2 == "") {
    //   var hasil = "";
    // }
    // else if (bil2 >= bil1){
    //   alert('jumlah keluar harus lebih sedikit/sama dengan jumlah stok');
    // }
    // else {
      var hasil = eval(bil1) - eval(bil2);
    // }

    document.formBukuKeluar.total_stok.value = (hasil);
  }
</script>

<?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Data Buku Keluar
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-dashboard"></i> Dashboard </a></li>
      <li><a href="?module=buku_keluar"> Buku Keluar </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/buku-keluar/proses.php?act=insert" method="POST" name="formBukuKeluar">
            <div class="box-body">
              <?php  
              
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(kode_transaksi,7) as kode FROM buku_keluar
                ORDER BY kode_transaksi DESC LIMIT 1");

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {

                $data_id = mysqli_fetch_assoc($query_id);
                $kode    = $data_id['kode']+1;
              } else {
                $kode = 1;
              }

              $tahun          = date("Y");
              $buat_id        = str_pad($kode, 7, "0", STR_PAD_LEFT);
              $kode_transaksi = "TK-$tahun-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Transaksi</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_transaksi" value="<?php echo $kode_transaksi; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_keluar" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
                </div>
              </div>

              <hr>

              <div class="form-group">
                <label class="col-sm-2 control-label">Buku</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="kode_buku" data-placeholder="-- Pilih Buku --" onchange="tampil_buku(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    $query_buku = mysqli_query($mysqli, "SELECT kode_buku, judul_buku FROM buku ORDER BY judul_buku ASC");
                    while ($data_buku = mysqli_fetch_assoc($query_buku)) {
                      echo"<option value=\"$data_buku[kode_buku]\"> $data_buku[kode_buku] | $data_buku[judul_buku] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              
              <span id='stok'>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Stok</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="stok" name="stok" readonly required>
                  </div>
                </div>
              </span>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Keluar</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="jumlah_keluar" name="jumlah_keluar" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="hitung_total_stok(this)&cek_jumlah_keluar(this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Total Stok</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="total_stok" name="total_stok" readonly required>
                </div>
              </div>

            </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=obat_keluar" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>  
  </section>
  <?php
}
?>
