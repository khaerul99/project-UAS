<?php

require_once "config/database.php";
require_once "config/fungsi_tanggal.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {

	if ($_GET['module'] == 'beranda') {
		include "modules/beranda/view.php";
	}

	elseif ($_GET['module'] == 'buku') {
		include "modules/buku/view.php";
	}

	elseif ($_GET['module'] == 'form_buku') {
		include "modules/buku/form.php";
	}
	
	elseif ($_GET['module'] == 'buku_masuk') {
		include "modules/buku-masuk/view.php";
	}

	elseif ($_GET['module'] == 'form_buku_masuk') {
		include "modules/buku-masuk/form.php";
	}

	elseif ($_GET['module'] == 'buku_keluar') {
		include "modules/buku-keluar/view.php";
	}

	elseif ($_GET['module'] == 'form_buku_keluar') {
		include "modules/buku-keluar/form.php";
	}
	
	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}

	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}
	
	elseif ($_GET['module'] == 'profil') {
		include "modules/profil/view.php";
	}

	elseif ($_GET['module'] == 'form_profil') {
		include "modules/profil/form.php";
	}
	
	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}
}
?>