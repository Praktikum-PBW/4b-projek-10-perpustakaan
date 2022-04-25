<?php

include '../koneksi.php';
?>

<div class="container" style="margin-top: 200px;">
    <center><font size="6"> Data Buku</font></center>
    <hr>
    <a href="tambah.php"><button class="btn btn-dark right">Tambah Buku</button></a>
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action" border="1">
            <thead>
                <tr>
                    <th>no</th>
                    <th>id</th>
                    <th>Nama Buku</th>
                    <th>Nama Penulis</th>
                    <th>Genre</th>
                    <th>Sinopsis</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM buku ORDER BY id DESC") or die(mysqli_error($conn));

                if(mysqli_num_rows($sql) >0 ){
                    $no = 1;
                    while($data = mysqli_fetch_assoc($sql)){
                        echo '
                        <tr>
                            <td>'.$no.'</td>
                            <td>'.$data['id'].'</td>
                            <td>'.$data['nama_buku'].'</td>
                            <td>'.$data['nama_pembuat'].'</td>
                            <td>'.$data['genre'].'</td>
                            <td>'.$data['sinopsis'].'</td>
                            <td>
                            <a href="edit.php?id='.$data['id'].'" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="delete.php?id='.$data['id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'yakin ingin menghapus data ini\')">Delete</a>
                            </td>
                        </tr>';
                        $no++;
                    }
                }else{
                    echo'
                    <tr>
                    <td colspan="6"> Tidak ada data. </td>
                    </tr>
                    ';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>