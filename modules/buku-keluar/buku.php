<?php
session_start();

require_once "../../config/database.php";

if(isset($_POST['dataidbuku'])) {
	$kode_buku = $_POST['dataidbuku'];

  $query = mysqli_query($mysqli, "SELECT kode_buku,judul_buku,stok FROM buku WHERE kode_buku='$kode_buku'");

  $data = mysqli_fetch_assoc($query);

  $stok   = $data['stok'];

  if($stok != '') {
    echo "<div class='form-group'>
    <label class='col-sm-2 control-label'>Stok</label>
    <div class='col-sm-5'>
    <div class='input-group'>
    <input type='text' class='form-control' id='stok' name='stok' value='$stok' readonly>
    </div>
    </div>
    </div>";
  } else {
    echo "<div class='form-group'>
    <label class='col-sm-2 control-label'>Stok</label>
    <div class='col-sm-5'>
    <div class='input-group'>
    <input type='text' class='form-control' id='stok' name='stok' value='Stok buku tidak ditemukan' readonly>
    </div>
    </div>
    </div>";
  }		
}
?> 