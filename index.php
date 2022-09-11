<?php
require_once 'core/init.php';
require_once 'view/header.php'; ?>



<h2>Data Pegawai</h2>
<?php
$pegawai = tampilkan_pegawai();
?>
<table border=1px>
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Jabatan</th>
    <th>No Hp</th>
    <th>Alamat</th>
    <th>Action</th>
  </tr>

<?php
  $no=1;
while($row=mysqli_fetch_assoc($pegawai)) { ?>
  <tr>
  <td><?= $no; ?></td>
  <td><?= $row['nama']; ?></td>
  <td align="center"><?= $row['jenis_kelamin']; ?></td>
  <td><?= $row['jabatan']; ?></td>
  <td><?= $row['nohp']; ?></td>
  <td><?= $row['alamat']; ?></td>
  <td><a href="edit_pegawai.php?id=<?= $row['id_pegawai']; ?>">Edit</a> | <a href="hapus_pegawai.php?id=<?= $row['id_pegawai']; ?>">Hapus</a></td>
  </tr>
  <?php
    $no++;
    }
	?>


</table>
Tambah Data Pegawai :
<a href="tambah_pegawai.php"><button>Tambah Data</button></a>
</body>
<?php require_once 'view/footer.php'; ?>
