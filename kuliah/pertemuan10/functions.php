<?php
function konek()
{
  return mysqli_connect("localhost", "root", "fandi020205", "web2020_3201716069");
}

function query($query)
{
  $conn = konek();

  $result = mysqli_query($conn, $query);

  // jika hasilnya 1 data 
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = konek();
  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO mahasiswa 
            VALUES(null, '$nama', '$nrp', '$email', '$jurusan', '$gambar')";

  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}
