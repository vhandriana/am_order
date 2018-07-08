<div align="center">
    <h1>
        <label class="label label-success">Data Surat Jalan</label>
    </h1>
    <br>
    <button class="btn btn-primary btn-large" data-toggle="modal" data-target="#tambahModal">
        <i class="glyphicon glyphicon-plus-sign"></i> Tambah Data
    </button>
</div>
<hr>

<!--<table id="datatable" class="display stripe">-->
<table class="table table-striped">
    <thead>
        <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nomor</th>
        <th>Nama Kain</th>
        <th>Nama Supplier</th>
        <th>Nomor SJ Supplier</th>
        <th>QTY Roll</th>
        <th>QTY Killo</th>
        <th>RIB Roll</th>
        <th>RIB Killo</th>
        <th>Krah</th>
        <th>Manset</th>
        <th>Keterangan</th>
        <th>Aksi</th>
        </tr>
    </thead>

    <tr>
        <?php
            $query = "SELECT sj.idSJ, sj.nomor, sj.tgl, mk.nama as namaKain, ms.nama as namaSupplier, sj.no_external, sj.qtyRoll, sj.qtyKillo, sj.ribRoll, sj.ribKillo, sj.krah, sj.manset, sj.keterangan, sj.idUser FROM t_surat_jalan_m sj JOIN m_kain mk ON mk.idKain = sj.idKain LEFT JOIN m_supplier ms ON ms.idSupp = sj.idSupp ORDER BY sj.tgl, sj.nomor asc";
            $result = mysql_query($query);
            if (mysql_num_rows($result)) {
                //echo"ada isinya"; 
                $no = 1;
                while ($row = mysql_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $no; ?> </td>
                        <td><?php echo $row['tgl']; ?> </td>
                        <td><?php echo $row['nomor']; ?> </td>
                        <td><?php echo $row['namaKain']; ?> </td>
                        <td><?php echo $row['namaSupplier']; ?> </td>
                        <td><?php echo $row['no_external']; ?> </td>
                        <td><?php echo $row['qtyRoll']; ?> </td>
                        <td><?php echo $row['qtyKillo']; ?> </td>
                        <td><?php echo $row['ribRoll']; ?> </td>
                        <td><?php echo $row['ribKillo']; ?> </td>
                        <td><?php echo $row['krah']; ?> </td>
                        <td><?php echo $row['manset']; ?> </td>
                        <td><?php echo $row['keterangan']; ?> </td>
                        <td><?php echo "<a class='btn btn-info btn-sm' href='operator.php?view=tampil_ubah_surat_jalan&idSJ=" . $row['idSJ'] . "'><i class='glyphicon glyphicon-edit'></i></a> | 
                            <a class='btn btn-danger btn-sm' href='operator.php?view=aksi_hapus_surat_jalan&idSJ=" . $row['idSJ'] . "' onclick='return confirm(&quot;Apakah anda yakin akan menghapus data surat jalan tersebut?&quot;)'><i class='glyphicon glyphicon-trash'></i></a>";
                            ?>
                        </td>
                    </tr>
                    <?php
                    $no ++;
                }
            } else {
                echo"kosong";
            }
        ?>
    </tr>
</table>


<!---------------------------- tambah ------------------------->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Data Surat Jalan Baru</h4>
            </div> 

            <div class="modal-body">
                <form name="tambah_surat_jalan" id="tambah_surat_jalan" method="POST">
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Tanggal
                        </span>
                        <input type="date" id="tgl" name="tgl" placeholder="Tanggal" class="form-control input-lg" required style="width: 50%;" />
                    </div>
                    
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Nomor
                        </span>
                        <input type="text" name="nomor" value="" placeholder="Nomor" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Nama Kain
                        </span>
                        <select name='idKain' id='idKain' class="form-control input-lg">
                            <option value=''>Pilih Kain</option>
                            <?php
                            $query = "SELECT distinct idKain, nama from m_kain";
                            $result = mysql_query($query);
                            if (mysql_num_rows($result)) {
                                while ($row = mysql_fetch_array($result)) {
                                    echo '<option value='.$row['idKain'].'>' . $row['nama'] . '</option>';
                                }
                            }
                            ?>
                        </select>    
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Nama Supplier
                        </span>
                        <select name='idSupp' id='idSupp' class="form-control input-lg">
                            <option value=''>Pilih Supplier</option>
                            <?php
                            $query = "SELECT distinct idSupp, nama from m_supplier";
                            $result = mysql_query($query);
                            if (mysql_num_rows($result)) {
                                while ($row = mysql_fetch_array($result)) {
                                    echo '<option value='.$row['idSupp'].'>' . $row['nama'] . '</option>';
                                }
                            }
                            ?>
                        </select>    
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            No SJ Supplier
                        </span>
                        <input type="text" name="no_external" value="" placeholder="Nomor SJ Supplier" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Qty Roll
                        </span>
                        <input type="text" name="qtyRoll" value="" placeholder="Qty Roll" style="text-align:right" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Qty Killo
                        </span>
                        <input type="text" name="qtyKillo" value="" placeholder="Qty Killo" style="text-align:right" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Rib Roll
                        </span>
                        <input type="text" name="ribRoll" value="" placeholder="Rib Roll" style="text-align:right" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Rib Killo
                        </span>
                        <input type="text" name="ribKillo" value="" placeholder="Rib Killo" style="text-align:right" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Krah
                        </span>
                        <input type="text" name="krah" value="" placeholder="Krah" style="text-align:right" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Manset
                        </span>
                        <input type="text" name="manset" value="" placeholder="Manset" style="text-align:right" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Keterangan
                        </span>
                        <textarea name="keterangan" placeholder="Keterangan" class="form-control" rows="5" required></textarea>
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
<!-- edit -->

<script type="text/javascript">
    $(document).ready(function () {
        $("button#submit").click(function () {
            $.ajax({
                type: "POST",
                url: "operator/aksi_tambah_surat_jalan.php",
                data: $('form#tambah_surat_jalan').serialize(),
                success: function (msg) {
                    $("#tambahModal").modal('hide')
                    location.href = 'operator.php?view=tampil_surat_jalan';
                    ;
                },
                error: function () {
                    alert("Gagal menambah surat jalan baru");
                }
            });
        });
    });
</script>