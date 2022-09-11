<?php require_once "core/init.php";

if(isset($_GET['id'])){
  if(hapus_data_rapat($_GET['id'])) {
    header('Location: rapat.php');
  }else{
  echo "gagal menghapus data";
  }
}
