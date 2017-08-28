<?php
include "config.php";
include "header.php";
?>

<p>
<a href="create.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a> &nbsp; &nbsp;
 <a href="cetak.php" class="btn btn-success btn-md" target="_blank"><span class="glyphicon glyphicon-arrow-left"  aria-hidden="true"></span> Cetak Data</a>
 <br/>
</p>
<table id="ghatable" class="display table table-bordered table-striped table-responsive" cellspacing="0" width="100%">
<thead>
     <tr>
          <th>Nomor</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Nomor HP</th>
          <th>Alamat</th>
          <th>Aksi</th>
     </tr>
</thead>
<tbody>
<?php
$res = $mysqli->query("SELECT * FROM personal order by name");
$no = 1;
while ($row = $res->fetch_assoc()):
?>
     <tr>
          <td><?= $no ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['gender'] ?></td>
          <td><?= $row['telp'] ?></td>
          <td><?= $row['address'] ?></td>
          <td>
          <a href="update.php?u=<?= $row['id_personal'] ?>" class="btn btn-success"> Edit</a> &nbsp;&nbsp;
          <a onclick="return confirm('Yakin ingin menghapus ? ')" href="delete.php?d=<?= $row['id_personal'] ?>" class="btn btn-danger"> Delete</a>
          </td>
     </tr>

<?php
$no++;
endwhile;
?>

</tbody>
</table>

<?php
include "footer.php";
?>
