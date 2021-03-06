<script>
    $(document).ready(function(){
        
        function loadData(args) {
            $("#tampil").load("operator.php?view=tampil_tmp_odd");
        }
        loadData();
 
        function kosong(arg2s) {
            $("#warna").val('');
            $("#noResep").val('');
            $("#klasifikasi_warna").val('');
            $("#ongkos_clp").val('');
            $("#qty_roll").val('');
            $("#qty_killo").val('');
            $("#rib_roll").val('');
            $("#rib_killo").val('');
            $("#krah").val('');
            $("#manset").val('');
            $("#ket1").val('');
        }

        $("button#tambah").click(function(){
            var warna=$("#warna").val();
            var noODM=$("#noODM").val();
            var noResep=$("#noResep").val();
            var klasifikasi_warna=$("#klasifikasi_warna").val();
            var ongkos_clp=$("#ongkos_clp").val();
            var qty_roll=$("#qty_roll").val();
            var qty_killo=$("#qty_killo").val();
            var rib_roll=$("#rib_roll").val();
            var rib_killo=$("#rib_killo").val();
            var krah=$("#krah").val();
            var manset=$("#manset").val();
            var ket1=$("#ket1").val();
            
            if (warna=="") {
                //code
                alert("Warna tidak boleh kosong.");
                return false
            }else if (noResep=="") {
                //code
                alert("Nomor Resep tidak boleh kosong.");
                return false
            }else if (klasifikasi_warna=="") {
                //code
                alert("Klasifikasi Warna tidak boleh kosong.");
                return false
            }else if (ongkos_clp=="") {
                //code
                alert("Ongkos Celup tidak boleh kosong.");
                return false
            }else if (qty_roll=="") {
                //code
                alert("Qty Roll tidak boleh kosong.");
                return false
            }else{
                $.ajax({
                    url:"operator.php?view=aksi_tambah_order_dyeing_tmp",
                    type:"POST",
                    data: $('form#tambah_odm_detail').serialize(),
                    cache:false,
                    success:function(html){
                        loadData();
                        kosong();
                    },
                    error: function () {
                        alert("Gagal menambah order dyeing tmp baru");
                    }
                })    
            }
            
        })

        $(".simpan").live("click",function(){
            var tgl_order=$(this).attr("tgl_order");
            var nomor=$(this).attr("nomor");
            var idPel=$(this).attr("idPel");
            var nomor_po_pel=$(this).attr("nomor_po_pel");
            var idKain=$(this).attr("idKain");
            var idSupp=$(this).attr("idSupp");
            var cat=$(this).attr("cat");
            var gramasi=$(this).attr("gramasi");
            var lebar=$(this).attr("lebar");
            var handfeel=$(this).attr("handfeel");
            var keterangan=$(this).attr("keterangan");
            
            $("#tgl_order").val(tgl_order);
            $("#nomor").val(nomor);
            $("#idPel").val(idPel);
            $("#nomor_po_pel").val(nomor_po_pel);
            $("#idKain").val(idKain);
            $("#idSupp").val(idSupp);
            $("#cat").val(cat);
            $("#gramasi").val(gramasi);
            $("#lebar").val(lebar);
            $("#handfeel").val(handfeel);
            $("#keterangan").val(keterangan);
        })

        $("button#simpan").click(function(){
            var tgl_order=$("#tgl_order").val();
            var nomor=$("#nomor").val();
            var idPel=$("#idPel").val();
            var nomor_po_pel=$("#nomor_po_pel").val();
            var idKain=$("#idKain").val();
            var idSupp=$("#idSupp").val();
            var cat=$("#cat").val();
            var gramasi=$("#gramasi").val();
            var lebar=$("#lebar").val();
            var handfeel=$("#handfeel").val();
            var keterangan=$("#keterangan").val();
            
            if (tgl_order=="") {
                alert("Tanggal Order harus diisi.");
                return false;
            }else if (idPel=="") {
                alert("Pelanggan harus dipilih.");
                return false;
            }else if (idKain==0) {
                alert("Kain harus dipilih.");
                return false;
            }else if (idSupp==0) {
                alert("Supplier harus dipilih.");
                return false;
            }else if (cat=="") {
                alert("Cat harus dipilih.");
                return false;
            }else{
                $.ajax({
                    type:"POST",
                    url:"operator.php?view=aksi_tambah_order_dyeing",
                    data: $('form#tambah_odm').serialize(),

                    cache:false,
                    success:function(html){
                        alert("Transaksi Order Dyeing berhasil disimpan.");
                        //location.reload();
                        location.href = 'operator.php?view=tampil_order_dyeing';
                    },
                    error: function() {
                        alert("Gagal menambah order dyeing baru");
                    }
                })
            }
            
        })

        $(".hapus").live("click",function(){
            var idODD=$(this).attr("idODD");
            
            $("#idODD").val(idODD);

            $.ajax({
                type:"POST",
                url:"operator.php?view=aksi_hapus_order_dyeing_tmp",
                data:"idODD="+idODD,

                cache:false,
                success:function(html){
                    loadData();
                },
                error: function() {
                    alert("Gagal hapus detail.");
                }
            });
        })

        $(".tambah").live("click",function(){
            var motif=$(this).attr("motif");
            var noODM=$(this).attr("noODM");
            var warna=$(this).attr("warna");
            var qty_roll=$(this).attr("qty_roll");
            var qty_killo=$(this).attr("qty_killo");
            var rib_roll=$(this).attr("rib_roll");
            var rib_killo=$(this).attr("rib_killo");
            var krah=$(this).attr("krah");
            var manset=$(this).attr("manset");
            var ket1=$(this).attr("ket1");
            
            $("#motif").val(motif);
            $("#noODM").val(noODM);
            $("#warna").val(warna);
            $("#qty_roll").val(qty_roll);
            $("#qty_killo").val(qty_killo);
            $("#rib_roll").val(rib_roll);
            $("#rib_killo").val(rib_killo);
            $("#krah").val(krah);
            $("#manset").val(manset);
            $("#ket1").val(ket1);
            
            $("#myModal2").modal("hide");
        })

        $("#cari").click(function(){
            $("#myModal2").modal("show");
        })

    })    
</script>

<?php

    $today=date('Ymd');
    $thn = substr($today,2,2);
    $bln = substr($today,4,2);
    $no_temp = "OD/".$bln."/".$thn."/";       
    $query = mysql_query("SELECT MAX(nomor) AS last FROM t_order_dyeing_m WHERE nomor LIKE '%$no_temp%'");
    $data=mysql_fetch_array($query);
    $lasNomor=$data['last'];

    // if(mysql_num_rows($query) <= 1)
    //var_dump($lastNoFaktur);
    if($lasNomor == "")
    {
        $lasNomor = $no_temp."001";
    }
    else
    {
        (int)$no_temp = substr($lasNomor,9,3);
        $no_temp = $no_temp+1;
        $no_temp = sprintf("%03d", $no_temp);
        $lasNomor = substr($lasNomor,0,9).$no_temp;
    }
?>

<legend>Input Order Dyeing</legend>
<br/>
<a class="btn" href="operator.php?view=tampil_order_dyeing"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<div class="panel panel-default">
    <div class="panel-body">
        <form name="tambah_odm" id="tambah_odm" method="post">
        <!--<form class="form-horizontal" action="operator.php?view=aksi_tambah_order_dyeing" method="post">-->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Tanggal Order</label>
                    <div class="col-lg-7">
                        <input type="date" id="tgl_order" name="tgl_order" placeholder="Tanggal" class="form-control" required style="width: 50%;" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Nomor</label>
                    <div class="col-lg-7">
                        <input type="text" id="nomor" name="nomor" class="form-control" value="<?php echo $lasNomor;?>" readonly="readonly">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Nama Pelanggan</label>
                    <div class="col-lg-7">
                        <select name='idPel' id='idPel' class="form-control input-lg">
                            <option value=''>== Pilih Pelanggan ==</option>
                                <?php
                                    $query = "SELECT DISTINCT idPel, nama FROM m_pelanggan";
                                    $result = mysql_query($query);
                                    if (mysql_num_rows($result)) {
                                        while ($row = mysql_fetch_array($result)) {
                                            echo '<option value='.$row['idPel'].'>' . $row['nama'] . '</option>';
                                        }
                                    }
                                ?>
                        </select>    
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Nomor PO Pelanggan</label>
                    <div class="col-lg-7">
                        <input type="text" name="nomor_po_pel" id="nomor_po_pel" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Nama Kain</label>
                    <div class="col-lg-7">
                        <select name='idKain' id='idKain' class="form-control input-lg">
                            <option value=''>== Pilih Kain ==</option>
                                <?php
                                    $query = "SELECT DISTINCT idKain, nama FROM m_kain";
                                    $result = mysql_query($query);
                                    if (mysql_num_rows($result)) {
                                        while ($row = mysql_fetch_array($result)) {
                                            echo '<option value='.$row['idKain'].'>' . $row['nama'] . '</option>';
                                        }
                                    }
                                ?>
                        </select>    
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Nama Supplier</label>
                    <div class="col-lg-7">
                        <select name='idSupp' id='idSupp' class="form-control input-lg">
                            <option value=''>== Pilih Supplier ==</option>
                                <?php
                                    $query = "SELECT DISTINCT idSupp, nama FROM m_supplier";
                                    $result = mysql_query($query);
                                    if (mysql_num_rows($result)) {
                                        while ($row = mysql_fetch_array($result)) {
                                            echo '<option value='.$row['idSupp'].'>' . $row['nama'] . '</option>';
                                        }
                                    }
                                ?>
                        </select>    
                    </div>
                </div>
            </div>

            <div class="col-md-6">                    
                <div class="form-group">
                    <label class="col-lg-4 control-label">Cat</label>
                    <div class="col-lg-7">
                        <select name='cat' id='cat' class="form-control input-lg">
                            <option value=''>== Pilih Cat ==</option>
                            <option value='Disperse'>Disperse</option>
                            <option value='Disperse'>Reaktif</option>
                            <option value='Sulfur'>Sulfur</option>
                            <option value='Disperse Reaktif'>Disperse Reaktif</option>
                        </select>    
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Gramasi</label>
                    <div class="col-lg-7">
                        <input type="text" name="gramasi" id="gramasi" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Lebar</label>
                    <div class="col-lg-7">
                        <input type="text" name="lebar" id="lebar" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Handfeel</label>
                    <div class="col-lg-7">
                        <input type="text" name="handfeel" id="handfeel" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">Keterangan</label>
                    <div class="col-lg-7">
                        <textarea name="keterangan" class="form-control" rows="5" required></textarea>
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
    
    <div class="panel-body">
        <div class="form-inline">
            <div class="form-group">
                <button id="cari" class="btn btn-primary" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
        </div>
    </div>
    
    <div id = "tampil"></div>
    
    <div class="panel-footer" align="right">
        <!--<button type="button" id="simpan" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>-->
        <a href="#" class="simpan" 
            tgl_order = tgl_order
            nomor = nomor
            idPel = idPel
            nomor_po_pel = nomor_po_pel
            idKain = idKain
            idSupp = idSupp
            cat = cat
            gramasi = gramasi
            lebar = lebar
            handfeel = handfeel
            keterangan = keterangan>

            <button type="button" id="simpan" class="btn btn-success">simpan</button>
        </a>
    </div>
</div>


<!-- Modal Tambah Warna -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <b><h4 class="modal-title">Tambah Warna</h4></b>
            </div>

            <div class="modal-body">
                <form name="tambah_odm_detail" id="tambah_odm_detail" method="POST">    
                    <div class="input-group input-lg"> 
                        <span class="input-group-addon">
                            Warna
                        </span>
                        <input type="hidden" name="noODM" id="noODM" class="form-control" value="<?php echo $lasNomor;?>">
                        <input type="text" name="warna" id="warna" class="form-control">
                    </div>

                    <div class="input-group input-lg"> 
                        <span class="input-group-addon">
                            Nomor Resep
                        </span>
                        <input type="text" name="noResep" id="noResep" class="form-control">
                    </div>

                    <div class="input-group input-lg"> 
                        <span class="input-group-addon">
                            Klasifikasi Warna
                        </span>
                        <select name='klasifikasi_warna' id='klasifikasi_warna' class="form-control">
                            <option value=''>== Pilih Klasifikasi Warna ==</option>
                            <option value='Tua'>Tua</option>
                            <option value='Sedang'>Sedang</option>
                            <option value='Muda'>Muda</option>
                        </select>    
                    </div>

                    <div class="input-group input-lg"> 
                        <span class="input-group-addon">
                            Ongkos Celup
                        </span>
                        <input type="text" name="ongkos_clp" id="ongkos_clp" style="text-align: right;" class="form-control">
                    </div>
                    
                    <div class="input-group input-lg"> 
                        <span class="input-group-addon">
                            Qty Roll
                        </span>
                        <input type="text" name="qty_roll" id="qty_roll" style="text-align: right;" class="form-control">
                    </div>
                    
                    <div class="input-group input-lg"> 
                        <span class="input-group-addon">
                            Qty Killo
                        </span>
                        <input type="text" name="qty_killo" id="qty_killo" style="text-align: right;" class="form-control">
                    </div>

                    <div class="input-group input-lg"> 
                        <span class="input-group-addon">
                            Rib Roll
                        </span>
                        <input type="text" name="rib_roll" id="rib_roll" style="text-align: right;" class="form-control">
                    </div>
                    
                    <div class="input-group input-lg"> 
                        <span class="input-group-addon">
                            Rib Killo
                        </span>
                        <input type="text" name="rib_killo" id="rib_killo" style="text-align: right;" class="form-control">
                    </div>

                    <div class="input-group input-lg"> 
                        <span class="input-group-addon">
                            Krah
                        </span>
                        <input type="text" name="krah" id="krah" style="text-align: right;" class="form-control">
                    </div>
                    
                    <div class="input-group input-lg"> 
                        <span class="input-group-addon">
                            Manset
                        </span>
                        <input type="text" name="manset" id="manset" style="text-align: right;" class="form-control">
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Keterangan
                        </span>
                        <input type="text" name="ket1" id="ket1" class="form-control">
                    </div>   

                </form>
            </div>

            <div class="modal-footer">
                <td>
                    <a href="#" class="tambah" 
                        warna = warna
                        noODM = <?php echo $lasNomor;?>
                        noResep = noResep
                        klasifikasi_warna = klasifikasi_warna
                        ongkos_clp = ongkos_clp
                        qty_roll = qty_roll
                        qty_killo = qty_killo
                        rib_roll = rib_roll
                        rib_killo = rib_killo
                        krah = krah
                        manset = manset
                        ket1 = ket1>
                        <button type="button" id="tambah" class="btn btn-primary">Tambah</button>
                    </a>
                </td>

                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
