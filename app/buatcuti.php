<?php
session_start();

//hak akses hanya untuk pegawai
if($_SESSION[UserLevel]==3) {
  //breadcrumbs
  echo '<ol class="breadcrumb">
    <li><a href="pegawai.php">Beranda</a></li>
    <li class="active">Buat Cuti</li>
  </ol>';

  //form cuti
  switch ($_GET[act]) {
    default:
      //daftar pengajuan cuti
      echo "<div class='panel panel-primary'>
        <div class='panel-heading'>
          <h3 class='panel-title'>Panel title</h3>
          </div>
          <div class='panel-body'>
          <p><a href='?mod=new&act=create' class='btn btn-primary btn-lg'> Tambah</a></p>
      ";

      //table data cuti pada tahun berjalan
      echo "<table class='table table-bordered table-striped'>
        <tr>
          <th>No</th>
          <th>Jenis Cuti</th>
          <th>Tahun</th>
          <th>Tgl Mulai</th>
          <th>Tgl Selesai</th>
          <th>Status</th>
          <th></th>
        </tr>
        <tr>
          <td>1</td>
          <td>Cuti Tahunan</td>
          <td>2016</td>
          <td>12 Januari 2016</td>
          <td>28 Januari 2016</td>
          <td>Status</td>
          <td><a href='' class='btn btn-xs btn-primary'><i class='fa fa-pencil-o'></i> Edit</a>
              <a href='' class='btn btn-xs btn-danger'><i class='fa fa-trash'></i> Delete</a></td>
        </tr>
      </table>";
      //akhir panel body
      echo "</div>
      </div>";

      break;

    case 'create':
      echo "<div class='panel panel-primary'>
        <div class='panel-heading'>
          <h3 class='panel-title'>Form Cuti</h3>
          </div>
          <div class='panel-body'>
            <form class='form-horizontal' method=post action='act_buatcuti.php'>
              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> Jenis Cuti </label>
                <div class='col-sm-5'>
                  <select class='form-control' name='jeniscuti' required>
                    <option value=''>[Pilih Jenis Cuti]</option>";
                  $jeniscuti  = array(1 => 'Cuti Tahunan' , 2=>'Cuti Hamil',3=>'Cuti Besar',4=>'Cuti Karena Alasan Penting');
                  foreach ($jeniscuti as $key => $value) {
                    echo "<option value=$key>$value</option>";
                  }
                  echo "</select>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> Nama Pegawai </label>
                <div class='col-sm-5'>
                  <input type='text' name='' class='form-control' required/>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> NIP </label>
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
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> Tgl Cuti </label>
                <div class='col-sm-2'>
                  <input type='date' name='' class='form-control'/>
                </div>
                <label class='col-sm-1 control-label no-padding-right' for='form-field-1'> s.d </label>
                <div class='col-sm-2'>
                  <input type='date' name='' class='form-control'>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> Jumlah Hari Kerja </label>
                <div class='col-sm-5'>
                  <input type='text' name='' class='form-control' required/>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label no-padding-right' for='form-field-1'> Alamat saat cuti </label>
                <div class='col-sm-5'>
                  <textarea name='' class='form-control'></textarea>
                </div>
              </div>
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
