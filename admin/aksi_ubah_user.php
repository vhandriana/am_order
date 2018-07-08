<?php
include '../konfig.php';

extract($_POST);
$query = "UPDATE tbl_user SET username='$username', password='$password', hak_akses = '$hak_akses' WHERE id_user='$id_user' ";
mysql_query($query)or die(mysql_error());
header("location:../admin.php?view=tampil_user");

