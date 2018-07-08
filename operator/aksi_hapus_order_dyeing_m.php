<?php
	include 'konfig.php';

	$idODM = $_GET['idODM'];

	$ambil = mysql_query("SELECT nomor FROM t_order_dyeing_m WHERE idODM = '$idODM' ");
	$data=mysql_fetch_array($ambil);
	$nomor=$data['nomor'];

	$query = "DELETE FROM t_order_dyeing_m WHERE idODM = $idODM ";
	mysql_query($query)or die(mysql_error());

	$hapus = "DELETE FROM t_order_dyeing_d WHERE noODM = '$nomor' ";
	mysql_query($hapus)or die(mysql_error());

?>