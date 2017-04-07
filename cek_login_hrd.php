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
  
$sql = "SELECT * FROM user WHERE UserName ='$UserName' AND PassWord='$PassWord' AND Aktiv=1";
$login = mysqli_query($koneksi,$sql) OR die(mysqli_error());
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  include "timeout.php";

  $_SESSION['is_login'] = 'yes';
  $_SESSION['id_User'] = $r['id_User'];
  $_SESSION['nm_Lengkap'] = $r['nm_Lengkap'];
  $_SESSION['id_Skpd'] = $r['id_Skpd'];
  $_SESSION['UserLevel'] = $r[UserLevel];
    //arahkan sesuai userlevel user
    if($r[UserLevel]==1) {
      header('location:admin.php');
    } elseif($r[UserLevel]==2) {
      header('location:kepeg.php');
    } elseif($r[UserLevel]==0) {
      header('location:kepeg.php');
    } else {
      header('location:masuk2.php');
    }
  } else {
   header('location:masuk2.php');
  }
}

?>
