<?php
session_start();

//hak akses hanya untuk pegawai
if($_SESSION[UserLevel]==1) {
  //breadcrumbs
  echo '<ol class="breadcrumb">
    <li><a href="pegawai.php">Beranda</a></li>
    <li class="active">Profil</li>
  </ol>';

  //form cuti
  switch ($_GET[act]) {
    default:
      //daftar pengajuan cuti
      echo "<div class='panel panel-primary'>
        <div class='panel-heading'>
          <h3 class='panel-title'><i class='fa fa-user-o'></i> Tabel SKPD</h3>
          </div>
          <div class='panel-body'>";
      echo "<table class='table table-bordered table-striped'>
            <tr>
              <th>No</th>
              <th>Nama SKPD</th>
              <th>Kepala SKPD</th>
              <th>Eselon</th>
              <th></th>
            </tr>";
      //data pegawi dari table pegawai
      $sql = "SELECT id_Skpd,nm_Skpd,Eselon FROM skpd";
      $q = mysqli_query($koneksi,$sql) OR die(mysqli_error());
      $no = 1;
      while ($r=mysqli_fetch_array($q)) {
        $Eselon = $r[Eselon];
        echo "<tr>
          <td>".$no++."</td>
          <td>$r[nm_Skpd]</td>
          <td>$r[nm_Kepala]</td>
          <td>$arrEselon[$Eselon]</td>
          <td><a href='?mod=skpd&act=edit&skpd=$r[id_Skpd]' class='btn btn-xs btn-primary'><i class='fa fa-pencil-o'></i> Edit</a>
              <a href='' class='btn btn-xs btn-danger'><i class='fa fa-trash'></i> Delete</a></td>
        </tr>";
      }
      echo "</table>";
      //akhir panel body
      echo "</div>
      </div>";

    break;
    case 'create':
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
    case 'edit':
      //profil pegawai
      $sql = "SELECT id_Skpd,nm_Skpd,Eselon FROM skpd WHERE id_Skpd ='$_GET[skpd]'";
      $q = mysqli_query($koneksi,$sql) OR die(mysqli_error());
      $r = mysqli_fetch_array($q);

      echo "<div class='panel panel-primary'>
        <div class='panel-heading'>
          <h3 class='panel-title'><i class='fa fa-user-o'></i> Edit SKPD</h3>
          </div>
          <div class='panel-body'>
            <form class='form-horizontal' method=post action='act_skpd.php'>

              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> Nama SKPD </label>
                <div class='col-sm-5'>
                  <input type='text' name='nm_Pegawai' value='$r[nm_Skpd]' class='form-control' readonly/>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> Kepala </label>
                <div class='col-sm-5'>
                  <input type='text' name='nm_Kepala' value='$r[nm_Kepala]' class='form-control' required/>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> NIP </label>
                <div class='col-sm-5'>
                  <input type='text' name='nip_Kepala' value='$r[nip_Kepala]' class='form-control' required/>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> Eselon </label>
                <div class='col-sm-5'>
                  <select class='form-control' name='Eselon'>";
                  foreach ($arrPangkat as $key => $value) {
                    if($key==$r[Eselon]) {
                      echo "<option value='$key' selected>$value</option>";
                    } else {
                      echo "<option value='$key'>$value</option>";
                    }
                  }

                echo "</select></div>
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

  }

} else {
  echo "anda tidak memiliki hak akses";
}
?>
