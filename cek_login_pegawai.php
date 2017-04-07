<?php
session_start();
include "config/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$UserName = anti_injection($_POST['UserName']);
$PassWord  = anti_injection(md5($_POST['PassWord']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($UserName) OR !ctype_alnum($PassWord)){
  echo "nope";
} else {
$sql = "SELECT * FROM pegawai WHERE id_Pegawai ='$UserName' AND KunciLewat='$PassWord' AND Aktiv=1";
$login = mysqli_query($koneksi,$sql) OR die(mysqli_error());
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

//$login=mysql_query("SELECT * FROM pegawai WHERE id_Pegawai ='$UserName' AND KunciLewat='$PassWord' AND Aktiv=1");
//$ketemu=mysql_num_rows($login);
//$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan

if ($ketemu > 0){
  include "timeout.php";

  $_SESSION['is_login'] = 'yes';
  $_SESSION['id_Pegawai'] = $r['id_Pegawai'];
  $_SESSION['nm_Pegawai'] = $r['nm_Pegawai'];
  $_SESSION['id_Skpd'] = $r['id_Skpd'];
  //userl level 3 adalah pegawai
  $_SESSION['UserLevel'] = 3;

  header('location:pegawai.php');
  } else{
   header('location:masuk.php');
  }
}

?>
