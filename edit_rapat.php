<?php
require_once 'core/init.php';
require_once 'view/header.php'; ?>

<h2>Edit Data Pengawai yang Mengikuti Rapat</h2>
<?php
$error='';
$id = $_GET['id'];
if(isset($_GET['id'])){
  $saturapat = tampilkan_rapat_id($id);
  while ($row = mysqli_fetch_assoc($saturapat)) {
    $id_pegawai = $row['id_pegawai'];
    $nama       = $row['nama'];
    $jenis_rapat = $row['jenis_rapat'];
    $tempat = $row['tempat'];
    $keterangan = $row['keterangan'];
  }

if(isset($_POST['submit'])){
  $id_pegawai   = $_POST['id_pegawai'];
  $jenis_rapat       = $_POST['jenis_rapat'];
  $tempat     = $_POST['tempat'];
  $keterangan     = $_POST['keterangan'];

  if(!empty(trim($id_pegawai)) && !empty(trim($jenis_rapat)) && !empty(trim($tempat)) && !empty(trim($keterangan))){

    if(edit_data_rapat($id_pegawai, $jenis_rapat, $tempat, $keterangan, $id)){
      header('Location: rapat.php');
    } else {
      $error = 'Ada masalah saat menambah data';
    }
  }else{
     $error='Ada data yang masih kosong, wajib di isi semua';
  }
}
 ?>

<form action="" method="POST">
<table class="rapat">
  <tr>
    <td><label for="nama">Nama</label></td>
    <td>&nbsp;:&nbsp;</td>
    <td>
      <select id="nama" name="id_pegawai">
				<option value="">--- Pilih pegawai ---</option>
					<?php
					$pegawai = tampilkan_pegawai();
					while($pilih = mysqli_fetch_assoc($pegawai)){
            if($pilih['id_pegawai']==$id_pegawai){
  							echo "<option value = '$pilih[id_pegawai]' selected>$pilih[nama]</option>";
  							}else{
  							echo "<option value = '$pilih[id_pegawai]' >$pilih[nama]</option>";
  							}}
					}
					?>
				</select>
    </td>
  </tr>
  <tr>
    <td><label for="jenis_rapat">Jenis Rapat</label> </td>
    <td>&nbsp;:&nbsp;</td>
    <td> <input type="text" name="jenis_rapat" id="jenis_rapat" value="<?= $jenis_rapat; ?>"> </td>
  </tr>
  <tr>
    <td><label for="tempat">Tempat</label> </td>
    <td>&nbsp;:&nbsp;</td>
    <td> <input type="text" name="tempat" id="tempat" value="<?= $tempat; ?>"></td>
  </tr>
  <tr>
    <td><label for="keterangan">Keterangan</label> </td>
    <td>&nbsp;:&nbsp;</td>
    <td> <input type="text" name="keterangan" id="keterangan" value="<?= $keterangan; ?>"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td><input type="submit" name="submit" value="Tambah">
  </tr>
</table>
<div class="error">
  <?= $error; ?>
</div>
</form>
<script>
<?php require_once 'view/footer.php'; ?>
