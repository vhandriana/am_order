<script>
    $(document).ready(function(){
        function loadData(args) {
            $("#tampil").load("follow-up.php?view=tampil_ubah_tmp_odd");
        }
        loadData();
    })
</script>

<?php
if (isset($_GET)) {
    include './konfig.php';
    $idODM = $_GET['idODM'];

    $ambil = mysql_query("SELECT nomor FROM t_order_dyeing_m WHERE idODM = '$idODM' ");
    $data=mysql_fetch_array($ambil);
    $nomor=$data['nomor'];

    $query = "SELECT odm.idODM as idODM, mp.nama as namaPelanggan, ms.nama as namaSupplier, mk.nama as namaKain, odm.tgl_order, odm.nomor, odm.nomor_po_pel, odm.cat, odm.gramasi, odm.lebar, odm.handfeel, odm.idUserOrder, odm.idUserjOB, odm.keterangan
        FROM t_order_dyeing_m odm, m_pelanggan mp, m_supplier ms, m_kain mk WHERE odm.idPel = mp.idPel AND odm.idSupp = ms.idSupp AND odm.idKain = mk.idKain AND odm.idODM = '$idODM' ";

    $result = mysql_query($query);

    if (mysql_num_rows($result)) {
        while ($row = mysql_fetch_array($result)) {
            ?>
            <legend>Detail Order Dyeing</legend>
            <br/>
            <a class="btn" href="marketing.php?view=tampil_order_dyeing"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

            <div class="panel panel-default">
                <div class="panel-body">
                    <form name="tambah_odm" id="tambah_odm" method="post">
                    <!--<form class="form-horizontal" action="follow-up.php?view=aksi_tambah_order_dyeing" method="post">-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Tanggal Order</label>
                                <div class="col-lg-7">
                                    <input type="date" id="tgl_order" name="tgl_order" value="<?php echo $row['tgl_order']; ?>" class="form-control" required style="width: 50%;" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label">Nomor</label>
                                <div class="col-lg-7">
                                    <input type="text" id="nomor" name="nomor" class="form-control" value="<?php echo $row['nomor']; ?>" readonly="readonly">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Nama Pelanggan</label>
                                <div class="col-lg-7">
                                    <input type="text" id="idPel" name="idPel" class="form-control" value="<?php echo $row['namaPelanggan']; ?>" readonly="readonly">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Nomor PO Pelanggan</label>
                                <div class="col-lg-7">
                                    <input type="text" name="nomor_po_pel" id="nomor_po_pel" class="form-control" value="<?php echo $row['nomor_po_pel']; ?>" readonly="readonly">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label">Nama Kain</label>
                                <div class="col-lg-7">
                                    <input type="text" id="idKain" name="idKain" class="form-control" value="<?php echo $row['namaKain']; ?>" readonly="readonly">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label">Nama Supplier</label>
                                <div class="col-lg-7">
                                    <input type="text" id="idSupp" name="idSupp" class="form-control" value="<?php echo $row['namaSupplier']; ?>" readonly="readonly">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">                    
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Cat</label>
                                <div class="col-lg-7">
                                    <input type="text" id="cat" name="cat" class="form-control" value="<?php echo $row['cat']; ?>" readonly="readonly">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label">Gramasi</label>
                                <div class="col-lg-7">
                                    <input type="text" name="gramasi" id="gramasi" class="form-control" value="<?php echo $row['gramasi']; ?>" readonly="readonly">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label">Lebar</label>
                                <div class="col-lg-7">
                                    <input type="text" name="lebar" id="lebar" class="form-control" value="<?php echo $row['lebar']; ?>" readonly="readonly">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label">Handfeel</label>
                                <div class="col-lg-7">
                                    <input type="text" name="handfeel" id="handfeel" class="form-control" value="<?php echo $row['handfeel']; ?>" readonly="readonly">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label">Keterangan</label>
                                <div class="col-lg-7">
                                    <textarea name="keterangan" class="form-control" rows="5" required> <?php echo $row['keterangan']; ?></textarea>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="panel panel-success">
                <div class="panel-heading">
                    Data Warna
                </div>
                
                <table class="table table-striped">
                    <thead>
                        <b>
                        <tr>
                            <td>Warna</td>
                            <td>Nomor Resep</td>
                            <td>Klasifikasi Warna</td>
                            <td>Ongkos Celup</td>
                            <td>Qty Roll</td>
                            <td>Qty Killo</td>
                            <td>Rib Roll</td>
                            <td>Rib Killo</td>
                            <td>Krah</td>
                            <td>Manset</td>
                            <td>Keterangan</td>
                            <td></td>
                        </tr>
                        </b>
                    </thead>

                    <tbody>
                        <?php
                            $query = "SELECT * FROM t_order_dyeing_d WHERE noODM = '$nomor' ";
                            $result = mysql_query($query);
                            $no = 1;
                            while ($row = mysql_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['warna']; ?> </td>
                                    <td><?php echo $row['noResep']; ?> </td>
                                    <td><?php echo $row['klasifikasi_warna']; ?> </td>
                                    <td><?php echo $row['ongkos_clp']; ?> </td>
                                    <td><?php echo $row['qtyRoll']; ?> </td>
                                    <td><?php echo $row['qtyKillo']; ?> </td>
                                    <td><?php echo $row['ribRoll']; ?> </td>
                                    <td><?php echo $row['ribKillo']; ?> </td>
                                    <td><?php echo $row['krah']; ?> </td>
                                    <td><?php echo $row['manset']; ?> </td>
                                    <td><?php echo $row['keterangan']; ?> </td> 
                                </tr>
                                <?php
                                $no ++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>

          <?php
        }
    }
}
?>