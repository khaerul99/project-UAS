<?php

session_start();

require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {

    if ($_GET['act']=='insert') {

        if (isset($_POST['simpan'])) {

            $kode_buku      = mysqli_real_escape_string($mysqli, trim($_POST['kode_buku']));
            $judul_buku     = mysqli_real_escape_string($mysqli, trim($_POST['judul_buku']));
            $genre          = mysqli_real_escape_string($mysqli, trim($_POST['genre']));
            $penulis        = mysqli_real_escape_string($mysqli, trim($_POST['penulis']));
            $penerbit       = mysqli_real_escape_string($mysqli, trim($_POST['penerbit']));
            $tahun_terbit   = mysqli_real_escape_string($mysqli, trim($_POST['tahun_terbit']));

            $created_user   = $_SESSION['id_user'];

            $nama_file      = $_FILES['cover']['name'];
            $ukuran_file    = $_FILES['cover']['size'];
            $tipe_file      = $_FILES['cover']['type'];
            $tmp_file       = $_FILES['cover']['tmp_name'];

            $allowed_extensions = array('jpg','jpeg','png');
            $path_file          = "../../images/buku/".$nama_file;
            $file               = explode(".", $nama_file);
            $extension          = array_pop($file);

            if (empty($_FILES['cover']['name'])) {

                $query = mysqli_query($mysqli, "INSERT INTO buku(kode_buku,judul_buku,genre,penulis,penerbit,tahun_terbit,created_user,updated_user) 
                    VALUES('$kode_buku','$judul_buku','$genre','$penulis','$penerbit','$tahun_terbit','$created_user','$created_user')");   

                if ($query) {
                    header("location: ../../main.php?module=buku&alert=1");
                }   
            }

            else{

                if (in_array($extension, $allowed_extensions)) {

                    if($ukuran_file <= 1000000) { 

                        if(move_uploaded_file($tmp_file, $path_file)) { 

                            $query = mysqli_query($mysqli, "INSERT INTO buku(kode_buku,judul_buku,cover,genre,penulis,penerbit,tahun_terbit,created_user,updated_user) 
                                VALUES('$kode_buku','$judul_buku','$nama_file','$genre','$penulis','$penerbit','$tahun_terbit','$created_user','$created_user')");   

                            if ($query) {
                                header("location: ../../main.php?module=buku&alert=1");
                            }

                        } else {
                            header("location: ../../main.php?module=buku&alert=4");
                        }

                    } else {

                        header("location: ../../main.php?module=buku&alert=5");
                    }

                } else {
                    header("location: ../../main.php?module=buku&alert=6");
                } 
            }
        }
    }   


    elseif ($_GET['act']=='update') {

        if (isset($_POST['simpan'])) {

            if (isset($_POST['kode_buku'])) {

                $kode_buku  = mysqli_real_escape_string($mysqli, trim($_POST['kode_buku']));
                $judul_buku  = mysqli_real_escape_string($mysqli, trim($_POST['judul_buku']));
                $genre     = mysqli_real_escape_string($mysqli, trim($_POST['genre']));
                $penulis     = mysqli_real_escape_string($mysqli, trim($_POST['penulis']));
                $penerbit     = mysqli_real_escape_string($mysqli, trim($_POST['penerbit']));
                $tahun_terbit     = mysqli_real_escape_string($mysqli, trim($_POST['tahun_terbit']));

                $updated_user = $_SESSION['id_user'];

                $nama_file          = $_FILES['cover']['name'];
                $ukuran_file        = $_FILES['cover']['size'];
                $tipe_file          = $_FILES['cover']['type'];
                $tmp_file           = $_FILES['cover']['tmp_name'];

                
                $allowed_extensions = array('jpg','jpeg','png');
                $path_file          = "../../images/buku/".$nama_file;
                $file               = explode(".", $nama_file);
                $extension          = array_pop($file);

                if (empty($_FILES['cover']['name'])) {

                    $query = mysqli_query($mysqli, "UPDATE buku SET  
                        judul_buku       = '$judul_buku',
                        genre            = '$genre',
                        penulis          = '$penulis',
                        penerbit         = '$penerbit',
                        tahun_terbit     = '$tahun_terbit',
                        updated_user     = '$updated_user'
                        WHERE kode_buku  = '$kode_buku'");

                    if ($query) {
                        header("location: ../../main.php?module=buku&alert=2");
                    }      
                }else{

                    if (in_array($extension, $allowed_extensions)) {

                        if($ukuran_file <= 1000000) { 

                            if(move_uploaded_file($tmp_file, $path_file)) { 

                             $query = mysqli_query($mysqli, "UPDATE buku SET  
                                judul_buku       = '$judul_buku',
                                cover            = '$nama_file',
                                genre            = '$genre',
                                penulis          = '$penulis',
                                penerbit         = '$penerbit',
                                tahun_terbit     = '$tahun_terbit',
                                updated_user     = '$updated_user'
                                WHERE kode_buku  = '$kode_buku'");


                             if ($query) {
                                 header("location: ../../main.php?module=buku&alert=2");
                             }

                         } else {
                            header("location: ../../main.php?module=buku&alert=4");
                        }

                    } else {
                        header("location: ../../main.php?module=buku&alert=5");
                    }

                } else {
                    header("location: ../../main.php?module=buku&alert=6");
                } 
            }    
        }
    }
}

elseif ($_GET['act']=='delete') {

    if (isset($_GET['id'])) {

        $kode_buku = $_GET['id'];
        $file = $_GET['cover'];
        $folder = '../../images/buku';
        $files = glob($folder . '/'.$file);

        foreach($files as $fl){
            if(is_file($fl)){
                unlink($fl);
            }
        }


        $query = mysqli_query($mysqli, "DELETE FROM buku WHERE kode_buku='$kode_buku'");

        if ($query) {
            header("location: ../../main.php?module=buku&alert=3");
        }else{
            header("location: ../../main.php?module=buku&alert=7");
        }
    }   
}
}       
?>