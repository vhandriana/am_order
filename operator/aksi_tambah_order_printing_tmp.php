 <?php
include '../konfig.php';

extract($_POST);
$query = "INSERT INTO t_order_printing_d_tmp VALUES('','$noOPM', '$warna', '$qty_roll', '$qty_killo', '$rib_roll', '$rib_killo', '$krah','$manset', '$ket1') ";

mysql_query($query)or die(mysql_error());