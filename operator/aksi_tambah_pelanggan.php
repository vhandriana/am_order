<?php
include '../konfig.php';

extract($_POST);
$query = "insert into m_pelanggan values(null,'$kode','$nama', '$noTelp1', '$noTelp2', '$noTelp3', '$alamat', '{$_SESSION['id_user']}') ";
mysql_query($query);