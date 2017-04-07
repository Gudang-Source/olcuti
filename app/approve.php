<?php
session_start();

//hak akses hanya untuk pegawai
if($_SESSION[UserLevel]==3) {
  //breadcrumbs
  echo '<ol class="breadcrumb">
    <li><a href="pegawai.php">Beranda</a></li>
    <li class="active">Riwayat Cuti</li>
  </ol>';

  //form cuti
  switch ($_GET[act]) {
    default:
      //daftar pengajuan cuti
      echo "<div class='panel panel-primary'>
        <div class='panel-heading'>
          <h3 class='panel-title'><i class='fa fa-list'></i> Daftar Permohonan Cuti</h3>
          </div>
          <div class='panel-body'>";

      //table data cuti pada tahun berjalan
      echo "<table class='table table-bordered table-striped'>
        <tr>
          <th>No</th>
          <th>Nama Pemohon</th>
          <th>Jenis Cuti</th>
          <th>Tahun</th>
          <th>Tgl Mulai</th>
          <th>Tgl Selesai</th>
          <th></th>
        </tr>
        <tr>
          <td>1</td>
          <td>A Reza</td>
          <td>Cuti Tahunan</td>
          <td>2016</td>
          <td>12 Januari 2016</td>
          <td>28 Januari 2016</td>
          <td><a href='' class='btn btn-xs btn-primary'><i class='fa fa-display'></i>View</a></td>
        </tr>
      </table>";
      //akhir panel body
      echo "</div>
      </div>";
      break;

  }

} else {
  echo "anda tidak memiliki hak akses";
}
?>
