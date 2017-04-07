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
          <h3 class='panel-title'><i class='fa fa-user-o'></i> Tabel Pegawai</h3>
          </div>
          <div class='panel-body'>
          <p><a href='?mod=asn&act=create' class='btn btn-primary btn-lg'> Tambah</a></p>";
      echo "<table class='table table-bordered table-striped'>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>User Name</th>
              <th>Userl Level</th>
              <th>Aktiv</th>
              <th></th>
            </tr>";
      //data pegawi dari table pegawai
      $sql = "SELECT * FROM user";
      $q = mysqli_query($koneksi,$sql) OR die(mysqli_error());
      $arrLevel = array('1' => 'Admin','2'=>'SKPD','3'=>'Pegawai','0'=>'Sekda' );
      $arrAktiv = array('0' =>'Tidak Aktiv' , '1'=>'Aktiv');
      $no = 1;
      while ($r=mysqli_fetch_array($q)) {
        $Level = $r[UserLevel];
        $Aktiv = $r[Aktiv];
        echo "<tr>
          <td>".$no++."</td>
          <td>$r[nm_Lengkap]</td>
          <td>$r[UserName]</td>
          <td>$arrLevel[$Level]</td>
          <td>$arrAktiv[$Aktiv]</td>
          <td><a href='?mod=asn&act=edit&NIP=$r[id_Pegawai]' class='btn btn-xs btn-primary'><i class='fa fa-pencil-o'></i> Edit</a>
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
      $sql = "SELECT a.*,b.nm_Skpd FROM pegawai a, skpd b
              WHERE a.id_Skpd = b.id_Skpd
              AND a.id_Pegawai = '$_GET[NIP]'";
      $q = mysqli_query($koneksi,$sql) OR die(mysqli_error());
      $r = mysqli_fetch_array($q);

      echo "<div class='panel panel-primary'>
        <div class='panel-heading'>
          <h3 class='panel-title'><i class='fa fa-user-o'></i> Edit Pegawai</h3>
          </div>
          <div class='panel-body'>
            <form class='form-horizontal' method=post action='act_pegawai.php'>
              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> NIP </label>
                <div class='col-sm-5'>
                  <input type='text' name='' class='form-control' value=$r[id_Pegawai] disabled required/>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> Nama Pegawai </label>
                <div class='col-sm-5'>
                  <input type='text' name='nm_Pegawai' value='$r[nm_Pegawai]' class='form-control' required/>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> Jabatan </label>
                <div class='col-sm-5'>
                  <input type='text' name='Jabatan' value='Jabatan' class='form-control' required/>
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
              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> OPD </label>
                <div class='col-sm-5'>
                  <select class='form-control' name='id_Skpd'>";
                  $sql1 = "SELECT nm_Skpd,id_Skpd FROM skpd";
                  $q1 = mysqli_query($koneksi,$sql1) OR die(mysqli_error());
                  while ($r1=mysqli_fetch_array($q1)) {
                    if($r1[id_Skpd] ==$r[$id_Skpd]) {
                      echo "<option value=$r1[id_Skpd] selected>$r1[nm_Skpd]</option>";
                    } else {
                      echo "<option value=$r1[id_Skpd]>$r1[nm_Skpd]</option>";
                    }
                  }

                echo "<select></div>
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
