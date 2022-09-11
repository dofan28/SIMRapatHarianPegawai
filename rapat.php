<?php
require_once 'core/init.php';
require_once 'view/header.php'; ?>



<h2>Data Pegawai yang Mengikuti Rapat</h2>
<?php
$pegawai = tampilkan_rapat();
?>
<table border=1px>
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Jenis Rapat</th>
    <th>Tempat</th>
    <th>Keterangan</th>
    <th>Action</th>
  </tr>

<?php
  $no=1;
while($row=mysqli_fetch_assoc($pegawai)) { ?>
  <tr>
  <td><?= $no; ?></td>
  <td><?= $row['nama']; ?></td>
  <td><?= $row['jenis_rapat'] ?>
  </td>
  <td align="center">
  <?= $row['tempat']?></td>
  <td align="center">
    <?= $row['keterangan'] ?>
  </td>
  <td><a href="edit_rapat.php?id=<?= $row['id_rapat']; ?>">Edit</a> | <a href="hapus_rapat.php?id=<?= $row['id_rapat']; ?>">Hapus</a></td>
  </tr>
  <?php
    $no++;
    }
	?>


</table>
Tambah Data Pegawai Ikut Rapat :
<a href="tambah_rapat.php"><button>Tambah Data</button></a>
</body>
<?php require_once 'view/footer.php'; ?>
