<?php

//pegawai

function tampilkan_pegawai(){
  global $koneksi;


  $query = "SELECT * FROM pegawai";
  $result = mysqli_query($koneksi, $query) or die('gagal menampilkan data');

  return $result;
}

function tampilkan_pegawai_id($id){
  global $koneksi;


  $query = "SELECT * FROM pegawai WHERE id_pegawai='$id'";
  $result = mysqli_query($koneksi, $query) or die('gagal menampilkan data');

  return $result;
}

function tambah_data_pegawai($nama, $jenis_kelamin, $jabatan, $nohp, $alamat){
  $query = "INSERT INTO pegawai(nama, jenis_kelamin, jabatan, nohp, alamat)
  VALUES ('$nama', '$jenis_kelamin', '$jabatan', '$nohp', '$alamat')";
  return run($query);
}

function hapus_data_pegawai($id){
  $query = "DELETE FROM pegawai where id_pegawai='$id'";
  return run($query);
}

function edit_data_pegawai($nama, $jenis_kelamin, $jabatan, $nohp, $alamat, $id){
  $query = "UPDATE pegawai SET nama='$nama', jenis_kelamin='$jenis_kelamin', jabatan='$jabatan',
  nohp='$nohp', alamat='$alamat' WHERE id_pegawai=$id";
  return run($query);
}

// rapat

function tampilkan_rapat(){
  global $koneksi;


  $query = "SELECT * FROM rapat join pegawai on rapat.id_pegawai=pegawai.id_pegawai";
  $result = mysqli_query($koneksi, $query) or die('gagal menampilkan data');

  return $result;
}

function tambah_data_rapat( $id_pegawai, $jenis_rapat, $tempat, $keterangan ){
  $query = "INSERT INTO rapat(id_pegawai, jenis_rapat, tempat, keterangan)
  VALUES ('$id_pegawai', '$jenis_rapat', '$tempat', '$keterangan')";
  return run($query);
}

function hapus_data_rapat($id){
  $query = "DELETE FROM rapat where id_rapat=$id";
  return run($query);
}

function tampilkan_rapat_id($id){
  global $koneksi;


  $query = "SELECT * FROM rapat join pegawai on rapat.id_pegawai=pegawai.id_pegawai WHERE id_rapat=$id";
  $result = mysqli_query($koneksi, $query) or die('gagal menampilkan data');

  return $result;
}

function edit_data_rapat($id_pegawai, $tanggal, $jamdatang, $jampulang, $id){
  $query = "UPDATE rapat SET id_pegawai='$id_pegawai', tanggal='$tanggal', jam_datang='$jamdatang',
  jam_pulang='$jampulang' WHERE id_rapat=$id";
  return run($query);
}

  function run($query){
    global $koneksi;

    if(mysqli_query($koneksi, $query)) return true;
    else return false;
  }

//tanggal indonesia


// function tanggal_indo($tanggal, $cetak_hari = false)
// {
// $hari = array ( 1 =>    'Senin',
//     'Selasa',
//     'Rabu',
//     'Kamis',
//     'Jumat',
//     'Sabtu',
//     'Minggu'
//   );

// $bulan = array (1 =>   'Januari',
//     'Februari',
//     'Maret',
//     'April',
//     'Mei',
//     'Juni',
//     'Juli',
//     'Agustus',
//     'September',
//     'Oktober',
//     'November',
//     'Desember'
//   );
// $split 	  = explode('-', $tanggal);
// $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

// if ($cetak_hari) {
// $num = date('N', strtotime($tanggal));
// return $hari[$num] . ', ' . $tgl_indo;
// }
// return $tgl_indo;
// }

//  ?>
