<table class="table table-striped">
        <thead>
            <b>
            <tr>
                <td>Warna</td>
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
                $query = "SELECT * FROM t_order_printing_d_tmp ";
                $result = mysql_query($query);
                $no = 1;
                while ($row = mysql_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['warna']; ?> </td>
                        <td><?php echo $row['qtyRoll']; ?> </td>
                        <td><?php echo $row['qtyKillo']; ?> </td>
                        <td><?php echo $row['ribRoll']; ?> </td>
                        <td><?php echo $row['ribKillo']; ?> </td>
                        <td><?php echo $row['krah']; ?> </td>
                        <td><?php echo $row['manset']; ?> </td>
                        <td><?php echo $row['keterangan']; ?> </td>  
                        <td><a href="#" class="hapus" idOPD="<?php echo $row['idOPD']; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                    </tr>
                    <?php
                    $no ++;
                }
            ?>
        </tbody>
</table>