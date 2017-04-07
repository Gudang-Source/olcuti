<?php
session_start();

//hak akses hanya untuk pegawai
if($_SESSION[UserLevel]==3) {
  //breadcrumbs
  echo '<ol class="breadcrumb">
    <li><a href="pegawai.php">Beranda</a></li>
    <li class="active">Profil</li>
  </ol>';

  //form cuti
  switch ($_GET[act]) {
    default:
      //profil pegawai
      echo "<div class='panel panel-primary'>
        <div class='panel-heading'>
          <h3 class='panel-title'><i class='fa fa-user-o'></i> Profil Pegawai</h3>
          </div>
          <div class='panel-body'>
            <form class='form-horizontal' method=post action='act_buatcuti.php'>
              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> NIP </label>
                <div class='col-sm-5'>
                  <input type='text' name='' class='form-control' disabled required/>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> Nama Pegawai </label>
                <div class='col-sm-5'>
                  <input type='text' name='' class='form-control' required/>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> Jabatan </label>
                <div class='col-sm-5'>
                  <input type='text' name='' class='form-control' required/>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> OPD </label>
                <div class='col-sm-5'>
                  <input type='text' name='' class='form-control' required/>
                </div>
              </div>
              <hr>
              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'></label>
                <div class='col-sm-5'>
                  <button type=submit value='simpan' class='btn btn-primary btn-lg'>Simpan</button>
                  <button type=reset value='reset' class='btn btn-success btn-lg'>Reset</button>
                  <button type=submit value='simpan' class='btn btn-warning btn-lg'>Kembali</button>
                </div>
              </div>
            </form>
          </div>
      </div>";

    break;

    case 'create':

    break;

  }

} else {
  echo "anda tidak memiliki hak akses";
}
?>
