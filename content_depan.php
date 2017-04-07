<?php
session_start();
include "config/koneksi.php";

	if ($_GET['module']=='home'){
	    include "module/mod_home/home.php";
	} elseif ($_GET['module']=='jenisijin') {
		include "module/mod_ijin/jenis.php";
	} elseif ($_GET['module']=='berita') {
		include "module/mod_berita/berita.php";
	} else {
		include "module/mod_depan/default.php";
	}


?>