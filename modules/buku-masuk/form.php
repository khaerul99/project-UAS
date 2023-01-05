<script type="text/javascript">
  function tampil_buku(input){
    var num = input.value;

    $.post("modules/buku-masuk/buku.php", {
      dataidbuku: num,
    }, function(response) {      
      $('#stok').html(response)

      document.getElementById('jumlah_masuk').focus();
    });
  }

  function cek_jumlah_masuk(input) {
    jml = document.formBukuMasuk.jumlah_masuk.value;
    var jumlah = eval(jml);
    if(jumlah < 1){
      alert('Jumlah Masuk Tidak Boleh Nol !!');
      input.value = input.value.substring(0,input.value.length-1);
    }
  }

  function hitung_total_stok() {
    bil1 = document.formBukuMasuk.stok.value;
    bil2 = document.formBukuMasuk.jumlah_masuk.value;

    if (bil2 == "") {
      var hasil = "";
    }
    else {
      var hasil = eval(bil1) + eval(bil2);
    }

    document.formBukuMasuk.total_stok.value = (hasil);
  }
</script>

<?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Data Buku Masuk
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-dashboard"></i> Dashboard </a></li>
      <li><a href="?module=buku_masuk"> Buku Masuk </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">

          <form role="form" class="form-horizontal" action="modules/buku-masuk/proses.php?act=insert" method="POST" name="formBukuMasuk">
            <div class="box-body">
              <?php  
              
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(kode_transaksi,7) as kode FROM buku_masuk
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
              $kode_transaksi = "TM-$tahun-$buat_id";
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
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_masuk" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
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
                <label class="col-sm-2 control-label">Jumlah Masuk</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="jumlah_masuk" name="jumlah_masuk" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="hitung_total_stok(this)&cek_jumlah_masuk(this)" required>
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
                  <a href="?module=buku_masuk" class="btn btn-default btn-reset">Batal</a>
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