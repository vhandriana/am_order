<div align="center">
    <h1><label class="label label-success">Data Order Printing</label></h1>
    <br>
    <a class='btn btn-primary btn-large' href='operator.php?view=tampil_simpan_order_printing'>Tambah Order Printing</a>
</div>
<br>
<table id="datatable" class="display stripe">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nomor</th>
        <th>Pelanggan</th>
        <th>Nomor PO</th>
        <th>Kain</th>
        <th>Supplier Maklun</th>
        <th>Motif</th>
        <th>Cat</th>
        <th>Ongkos Print</th>
        <th>Gramasi</th>
        <th>Lebar</th>
        <th>Handfeel</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>
    <tbody>

        <?php
            $query = "SELECT odm.idOPM as idOPM, mp.nama as namaPelanggan, ms.nama as namaSupplier, mk.nama as namaKain, odm.tgl_order, odm.nomor, odm.nomor_po_pel, odm.no_job, odm.tgl_job, odm.motif, odm.cat, odm.ongkos_prt, odm.gramasi, odm.lebar, odm.handfeel, odm.idUserOrder, odm.idUserjOB, odm.tgl_krm, odm.keterangan
                FROM t_order_printing_m odm, m_pelanggan mp, m_supplier ms, m_kain mk WHERE odm.idPel = mp.idPel AND odm.idSupp = ms.idSupp AND odm.idKain = mk.idKain order by  odm.nomor desc";

            $result = mysql_query($query);
            if (mysql_num_rows($result)) {
                //echo"ada isinya"; 
                $no = 1;
                while ($row = mysql_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $no; ?> </td>
                        <td><?php echo $row['tgl_order']; ?> </td>
                        <td><?php echo $row['nomor']; ?> </td>
                        <td><?php echo $row['namaPelanggan']; ?> </td>
                        <td><?php echo $row['nomor_po_pel']; ?> </td>
                        <td><?php echo $row['namaKain']; ?> </td>
                        <td><?php echo $row['namaSupplier']; ?> </td>
                        <td><?php echo $row['motif']; ?> </td>
                        <td><?php echo $row['cat']; ?> </td>
                        <td><?php echo $row['ongkos_prt']; ?> </td>
                        <td><?php echo $row['gramasi']; ?> </td>
                        <td><?php echo $row['lebar']; ?> </td>
                        <td><?php echo $row['handfeel']; ?> </td>
                        <td><?php echo $row['keterangan']; ?> </td>
                        <td><?php echo "<a class='btn btn-info btn-sm' href='operator.php?view=tampil_ubah_order_printing&idOPM=" . $row['idOPM'] . "'><i class='glyphicon glyphicon-edit'></i></a> | 
                            <a class='btn btn-danger btn-sm' href='operator.php?view=aksi_hapus_order_printing_m&idOPM=" . $row['idOPM'] . "' onclick='return confirm(&quot;Apakah anda yakin akan menghapus data order printing tersebut?&quot;)'><i class='glyphicon glyphicon-trash'></i></a>";
                    ?></td>
                    </tr>
                    <?php
                    $no ++;
                }
            } else {
                echo"kosong";
            }
        ?>
    </tbody>
</table>

<!------------------------- edit -------------------->

<script type="text/javascript">
    $(document).ready(function () {
        $("button#submit").click(function () {
            $.ajax({
                type: "POST",
                url: "operator/aksi_tambah_odm.php",
                data: $('form#aksi_tambah_odm').serialize(),
                success: function (msg) {
                    $("#tambahModal").modal('hide')
                    location.href = 'operator.php?view=tampil_odm';
                    ;
                },
                error: function () {
                    alert("Gagal menambah pelanggan baru");
                }
            });
        });
    });
</script>

