<?php
if (isset($_GET)) {
    include './konfig.php';
    $idODM = $_GET['idODM'];

    $query = "SELECT odm.idODM as idODM, mp.nama as namaPelanggan, ms.nama as namaSupplier, mk.nama as namaKain, odm.tgl_order, odm.nomor, odm.nomor_po_pel, odm.no_job, odm.tgl_job, odm.cat, odm.gramasi, odm.lebar, odm.handfeel, odm.inspect, odm.preset, odm.celup, odm.santex, odm.dryer, odm.compact, odm.finish, odm.packing, odm.idUserOrder, odm.idUserjOB, odm.tgl_krm, odm.keterangan
                FROM t_order_dyeing_m odm, m_pelanggan mp, m_supplier ms, m_kain mk WHERE odm.idPel = mp.idPel AND odm.idSupp = ms.idSupp AND odm.idKain = mk.idKain AND odm.idODM = '$idODM'";

    $result = mysql_query($query);

    if (mysql_num_rows($result)) {
        while ($row = mysql_fetch_array($result)) {
            ?>
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Update Status Order Dyeing</h4>
            </div>
            <a class="btn" href="follow-up.php?view=tampil_order_dyeing"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
            <div class="modal-body">
                <form name="update_status" id="update_status" method="POST" action="follow-up/aksi_update_status.php">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Tanggal Job Order</label>
                            <div class="col-lg-7">
                                <input type="hidden" name="idODM"vhan value="<?php echo $idODM; ?>"/>
                                <input type="date" id="tgl_job" name="tgl_job" value="<?php echo $row['tgl_job']; ?>" class="form-control" required style="width: 50%;" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Nomor Job Order</label>
                            <div class="col-lg-7">
                                <input type="text" id="no_job" name="no_job" class="form-control" value="<?php echo $row['no_job']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                                <label class="col-lg-4 control-label">Tanggal Order</label>
                                <div class="col-lg-7">
                                    <input type="date" id="tgl_order" name="tgl_order" value="<?php echo $row['tgl_order']; ?>" class="form-control" readonly="readonly" style="width: 50%;" />
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
                            <label class="col-lg-4 control-label">Inspect</label>
                            <div class="col-lg-7">
                                <input type="date" id="inspect" name="inspect" value="<?php echo $row['inspect']; ?>" class="form-control" style="width: 50%;" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Preset</label>
                            <div class="col-lg-7">
                                <input type="date" id="preset" name="preset" value="<?php echo $row['preset']; ?>" class="form-control" style="width: 50%;" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Celup</label>
                            <div class="col-lg-7">
                                <input type="date" id="celup" name="celup" value="<?php echo $row['celup']; ?>" class="form-control" style="width: 50%;" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Santex</label>
                            <div class="col-lg-7">
                                <input type="date" id="santex" name="santex" value="<?php echo $row['santex']; ?>" class="form-control" style="width: 50%;" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Dryer</label>
                            <div class="col-lg-7">
                                <input type="date" id="dryer" name="dryer" value="<?php echo $row['dryer']; ?>" class="form-control" style="width: 50%;" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Compact</label>
                            <div class="col-lg-7">
                                <input type="date" id="compact" name="compact" value="<?php echo $row['compact']; ?>" class="form-control" style="width: 50%;" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Finish</label>
                            <div class="col-lg-7">
                                <input type="date" id="finish" name="finish" value="<?php echo $row['finish']; ?>" class="form-control" style="width: 50%;" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Packing</label>
                            <div class="col-lg-7">
                                <input type="date" id="packing" name="packing" value="<?php echo $row['packing']; ?>" class="form-control" style="width: 50%;" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Tgl Kirim</label>
                            <div class="col-lg-7">
                                <input type="date" id="tgl_krm" name="tgl_krm" value="<?php echo $row['tgl_krmtgl_krm']; ?>" class="form-control" style="width: 50%;" />
                            </div>
                        </div>
                    </div>
                        
                    <div align="left">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-floppy-disk"></i>  Update </button>
                    </div>
                </form>
            </div>

          <?php
        }
    }
}
?>