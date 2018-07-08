<?php
include '../konfig.php';

extract($_POST);


$result = mysql_query("SELECT * FROM t_order_printing_d_tmp WHERE noOPM = '$nomor' ")or die(mysql_error());

while ($row = mysql_fetch_array($result)) {
	$noOPM = $row['noOPM']; $warna = $row['warna'];$qtyRoll = $row['qtyRoll']; $qtyKillo = $row['qtyKillo']; 
	$ribRoll = $row['ribRoll'];	$ribKillo = $row['ribKillo']; $krah = $row['krah']; 
	$manset = $row['manset']; $keterangan = $row['keterangan'];

	$odd = "INSERT INTO t_order_printing_d 
			(noOPM, warna, qtyRoll, qtyKillo, ribRoll, ribKillo, krah, manset, keterangan)
			VALUES 
			('$noOPM', '$warna', $qtyRoll, $qtyKillo, $ribRoll, $ribKillo, $krah, $manset, '$keterangan') ";

	mysql_query($odd)or die(mysql_error());
}

$opm = "INSERT INTO t_order_printing_m
		(idPel, idKain, idSupp, tgl_order, nomor, nomor_po_pel, motif, cat, ongkos_prt, gramasi, lebar, handfeel, keterangan, idUserOrder) 
		VALUES 
		('$idPel', '$idKain', '$idSupp', '$tgl_order', '$nomor', '$nomor_po_pel', '$motif', '$cat', '$ongkos_prt', '$gramasi', '$lebar', '$handfeel', '$keterangan', '{$_SESSION['id_user']}') ";
mysql_query($opm)or die(mysql_error());



$hapus = "DELETE FROM t_order_printing_d_tmp WHERE noOPM = '$nomor' ";
mysql_query($hapus)or die(mysql_error());
