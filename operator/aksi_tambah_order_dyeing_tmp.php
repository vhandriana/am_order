 <?php
include '../konfig.php';

extract($_POST);
$query = "INSERT INTO t_order_dyeing_d_tmp VALUES('','$noODM', '$warna', '$noResep', '$klasifikasi_warna', '$ongkos_clp', '$qty_roll', '$qty_killo', '$rib_roll', '$rib_killo', '$krah','$manset', '$ket1') ";

mysql_query($query)or die(mysql_error());