<?php
session_start();

require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {

            $kode_transaksi = mysqli_real_escape_string($mysqli, trim($_POST['kode_transaksi']));
            
            $tanggal         = mysqli_real_escape_string($mysqli, trim($_POST['tanggal_masuk']));
            $exp             = explode('-',$tanggal);
            $tanggal_masuk   = $exp[2]."-".$exp[1]."-".$exp[0];
            
            $kode_buku       = mysqli_real_escape_string($mysqli, trim($_POST['kode_buku']));
            $jumlah_masuk    = mysqli_real_escape_string($mysqli, trim($_POST['jumlah_masuk']));
            $total_stok      = mysqli_real_escape_string($mysqli, trim($_POST['total_stok']));
            
            $created_user    = $_SESSION['id_user'];

            $query = mysqli_query($mysqli, "INSERT INTO buku_masuk(kode_transaksi,tanggal_masuk,kode_buku,jumlah_masuk,created_user) 
                VALUES('$kode_transaksi','$tanggal_masuk','$kode_buku','$jumlah_masuk','$created_user')");

            
            if ($query) {
             
                $query1 = mysqli_query($mysqli, "UPDATE buku SET stok        = '$total_stok'
                  WHERE kode_buku   = '$kode_buku'");

                
                if ($query1) {                       
                 
                    header("location: ../../main.php?module=buku_masuk&alert=1");
                }
            }   
        }   
    }
}       
?>