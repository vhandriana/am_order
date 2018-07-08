<?php
	include 'konfig.php';

	$idODM = $_GET['idOPM'];

	$ambil = mysql_query("SELECT nomor FROM t_order_printing_m WHERE idOPM = '$idOPM' ");
	$data=mysql_fetch_array($ambil);
	$nomor=$data['nomor'];

	$query = "DELETE FROM t_order_printing_m WHERE idOPM = $idOPM ";
	mysql_query($query)or die(mysql_error());

	$hapus = "DELETE FROM t_order_printing_d WHERE noOPM = '$nomor' ";
	mysql_query($hapus)or die(mysql_error());

?>