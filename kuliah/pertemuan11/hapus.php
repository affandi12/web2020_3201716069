<?php
require 'functions.php';

// mengambil id daru URL
$id = $_GET['id'];

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

if (hapus($id) > 0) {
  echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'index.php';
          </script>";
} else {
  echo "Data gagal dihapus";
}
