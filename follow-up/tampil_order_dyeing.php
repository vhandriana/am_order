<div align="center">
    <h1><label class="label label-success">Data Order Dyeing</label></h1>
    <br>
</div>
<br>
<table id="datatable" class="display stripe">
    <tr>
        <th>No</th>
        <th colspan="2">Aksi</th>
        <th>Tanggal</th>
        <th>Nomor</th>
        <th>Pelanggan</th>
        <th>Nomor PO</th>
        <th>Kain</th>
        <th>Supplier Maklun</th>
        <th>Cat</th>
        <th>Gramasi</th>
        <th>Lebar</th>
        <th>Handfeel</th>
        <th>Tgl Job Order</th>
        <th>Nomor Job Order</th>
        <th>Inspect</th>
        <th>Preset</th>
        <th>Celup</th>
        <th>Santex</th>
        <th>Dryer</th>
        <th>Compact</th>
        <th>Finish</th>
        <th>Packing</th>
        <th>Tgl Kirim</th>
        <th>Keterangan</th>
    </tr>
    <tbody>

        <?php
            $query = "SELECT odm.idODM as idODM, mp.nama as namaPelanggan, ms.nama as namaSupplier, mk.nama as namaKain, odm.tgl_order, odm.nomor, odm.nomor_po_pel, odm.no_job, odm.tgl_job, odm.cat, odm.gramasi, odm.lebar, odm.handfeel, odm.inspect, odm.preset, odm.celup, odm.santex, odm.dryer, odm.compact, odm.finish, odm.packing, odm.idUserOrder, odm.idUserjOB, odm.tgl_krm, odm.keterangan
                FROM t_order_dyeing_m odm, m_pelanggan mp, m_supplier ms, m_kain mk WHERE odm.idPel = mp.idPel AND odm.idSupp = ms.idSupp AND odm.idKain = mk.idKain order by  odm.nomor desc";

            $result = mysql_query($query);
            if (mysql_num_rows($result)) {
                //echo"ada isinya"; 
                $no = 1;
                while ($row = mysql_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $no; ?> </td>
                        <td><?php echo "<a class='btn btn-info btn-sm' href='follow-up.php?view=tampil_ubah_order_dyeing&idODM=" . $row['idODM'] . "'><i class='glyphicon glyphicon-eye-open'></i></a> 
                            <a class='btn btn-warning btn-sm' href='follow-up.php?view=tampil_update_status_dyeing&idODM=" . $row['idODM'] . "'><i class='glyphicon glyphicon-pencil'></i></a>";
                        ?></td>
                        <td><?php echo $row['tgl_order']; ?> </td>
                        <td><?php echo $row['nomor']; ?> </td>
                        <td><?php echo $row['namaPelanggan']; ?> </td>
                        <td><?php echo $row['nomor_po_pel']; ?> </td>
                        <td><?php echo $row['namaKain']; ?> </td>
                        <td><?php echo $row['namaSupplier']; ?> </td>
                        <td><?php echo $row['cat']; ?> </td>
                        <td><?php echo $row['gramasi']; ?> </td>
                        <td><?php echo $row['lebar']; ?> </td>
                        <td><?php echo $row['handfeel']; ?> </td>
                        <td><?php echo $row['tgl_job']; ?> </td>
                        <td><?php echo $row['no_job']; ?> </td>
                        <td><?php echo $row['inspect']; ?> </td>
                        <td><?php echo $row['preset']; ?> </td>
                        <td><?php echo $row['celup']; ?> </td>
                        <td><?php echo $row['santex']; ?> </td>
                        <td><?php echo $row['dryer']; ?> </td>
                        <td><?php echo $row['compact']; ?> </td>
                        <td><?php echo $row['finish']; ?> </td>
                        <td><?php echo $row['packing']; ?> </td>
                        <td><?php echo $row['tgl_krm']; ?> </td>
                        <td><?php echo $row['keterangan']; ?> </td>
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

<!---------------------------- tambah ------------------------->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Data Pelanggan Baru</h4>
            </div> 
            <div class="modal-body">
                <form name="tambah_pelanggan" id="tambah_pelanggan" method="POST">

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="kode" placeholder="Kode Pelanggan" class="form-control input-lg" required autofocus  />
                    </div>
                    
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <input type="text" name="nama" value="" placeholder="Nama Pelanggan" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-phone"></i>
                        </span>
                        <input type="text" name="noTelp1" value="" placeholder="No Telepon 1" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-phone"></i>
                        </span>
                        <input type="text" name="noTelp2" value="" placeholder="No Telepon 2" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-phone"></i>
                        </span>
                        <input type="text" name="noTelp3" value="" placeholder="No Telepon 3" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <textarea name="alamat" placeholder="Alamat" class="form-control" rows="5" required></textarea>
                    </div>   

                </form>

            </div>
            <div class="modal-footer"> 
                <button type="reset" class="btn btn-inverse"><i class="glyphicon glyphicon-refresh"></i> Reset </button>
                <button type="submit" class="btn btn-primary" id="submit"><i class="glyphicon glyphicon-floppy-disk"></i>  Simpan </button>

            </div>

        </div> 
    </div><!-- /.modal-content --> 
</div><!-- /.modal -->
<!------------------------- edit -------------------->

<script type="text/javascript">
    $(document).ready(function () {
        $("button#submit").click(function () {
            $.ajax({
                type: "POST",
                url: "follow-up/aksi_tambah_odm.php",
                data: $('form#aksi_tambah_odm').serialize(),
                success: function (msg) {
                    $("#tambahModal").modal('hide')
                    location.href = 'follow-up.php?view=tampil_odm';
                    ;
                },
                error: function () {
                    alert("Gagal menambah pelanggan baru");
                }
            });
        });
    });
</script>

