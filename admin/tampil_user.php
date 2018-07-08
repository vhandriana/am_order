<div align="center">
    <h1><label class="label label-success">Data User Terdaftar</label></h1>
    <br>
    <button class="btn btn-primary btn-large" data-toggle="modal" data-target="#tambahModal">
        <i class="glyphicon glyphicon-plus-sign"></i> Tambah Data User
    </button>
</div>
<br>
<table id="datatable" class="display stripe">
    <thead>
    <th>No</th>
    <th>Username</th>
    <th>Password</th>
    <th>Hak Akses</th>
    <th>Aksi</th>
</thead>
<tbody>
    <?php
    $query = "SELECT * FROM tbl_user order by id_user desc";
    $result = mysql_query($query);
    if (mysql_num_rows($result)) {
        //echo"ada isinya"; 
        $no = 1;
        while ($row = mysql_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $no; ?> </td>
                <td><?php echo $row['username']; ?> </td>
                <td><?php echo $row['password']; ?> </td>
                <td><?php echo $row['hak_akses']; ?> </td>
                <td><?php echo "<a class='btn btn-info btn-sm' href='admin.php?view=tampil_ubah_user&id_user=" . $row['id_user'] . "'><i class='glyphicon glyphicon-edit'></i></a> | 
                    <a class='btn btn-danger btn-sm' href='admin.php?view=aksi_hapus_user&id_user=" . $row['id_user'] . "' onclick='return confirm(&quot;Apakah anda yakin akan menghapus data user tersebut?&quot;)'><i class='glyphicon glyphicon-trash'></i></a>";
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
<tfoot>
<th hidden="yes">No</th>
<th hidden="yes">Kode</th>
<th hidden="yes">Nama</th>
<th hidden="yes">Keterangan</th>
<th hidden="yes">Aksi</th></tfoot>
</table>

<!-- tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Biodata User Baru</h4>
            </div> 
            <div class="modal-body">
                <form name="tambah_user" id="tambah_user" method="POST">

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="username" placeholder="Username" class="form-control input-lg" required autofocus  />
                    </div>
                    
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <input type="text" name="password" value="" placeholder="Password" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg ">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-plus-sign"></i>
                        </span>
                        <select name='hak_akses' id='hak_akses' class="form-control input-lg">
                            <option value='Admin'>Admin</option>
                            <option value='Follow Up'>Follow Up</option>
                            <option value='Marketing'>Marketing</option>
                            <option value='Operator'>Operator</option>
                        </select>    
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
                url: "admin/aksi_tambah_user.php",
                data: $('form#tambah_user').serialize(),
                success: function (msg) {
                    $("#tambahModal").modal('hide')
                    location.href = 'admin.php?view=tampil_user';
                    alert("Data tersimpan.");   
                },
                error: function () {
                    alert("Gagal menambah kain baru !");
                }
            });
        });
    });
</script>

