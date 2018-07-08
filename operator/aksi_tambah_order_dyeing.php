<?php
include '../konfig.php';

extract($_POST);


$result = mysql_query("SELECT * FROM t_order_dyeing_d_tmp WHERE noODM = '$nomor' ")or die(mysql_error());

while ($row = mysql_fetch_array($result)) {
	$noODM = $row['noODM']; $warna = $row['warna']; $noResep = $row['noResep']; $klasifikasi_warna = $row['klasifikasi_warna'];
	$ongkos_clp = $row['ongkos_clp'];
	$qtyRoll = $row['qtyRoll']; $qtyKillo = $row['qtyKillo']; 
	$ribRoll = $row['ribRoll'];	$ribKillo = $row['ribKillo']; $krah = $row['krah']; 
	$manset = $row['manset']; $keterangan = $row['keterangan'];

	$odd = "INSERT INTO t_order_dyeing_d 
			(noODM, warna, noResep, klasifikasi_warna, ongkos_clp, qtyRoll, qtyKillo, ribRoll, ribKillo, krah, manset, keterangan)
			VALUES 
			('$noOPM', '$warna', '$noResep', '$klasifikasi_warna', '$ongkos_clp'
			$qtyRoll, $qtyKillo, $ribRoll, $ribKillo, $krah, $manset, '$keterangan') ";

	mysql_query($odd)or die(mysql_error());
}

$opm = "INSERT INTO t_order_dyeing_m
		(idPel, idKain, idSupp, tgl_order, nomor, nomor_po_pel, cat, gramasi, lebar, handfeel, keterangan, idUserOrder) 
		VALUES 
		('$idPel', '$idKain', '$idSupp', '$tgl_order', '$nomor', '$nomor_po_pel', '$cat', '$gramasi', '$lebar', '$handfeel', '$keterangan', '{$_SESSION['id_user']}') ";
mysql_query($opm)or die(mysql_error());


$hapus = "DELETE FROM t_order_dyeing_d_tmp WHERE noOPM = '$nomor' ";
mysql_query($hapus)or die(mysql_error());