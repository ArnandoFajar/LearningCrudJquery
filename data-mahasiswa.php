<button id="addButton" class="btn btn-primary">Tambah Data</button>
<br>
<BR></BR>
<table border="1">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>JenisKelamin</th>
            <th>Alamat</th>
            <th>Agama</th>
            <th>No. HP</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php include "koneksi.php";
        $no =1;
        $query=mysqli_query($koneksi, "SELECT*FROM Mahasiswa ORDER BY IdMhsw DESC") or die(mysqli_error($koneksi));
        while($result=mysqli_fetch_array($query)){
        ?>
        <tr>
            <td>
                <?= $no++; ?>
            </td>
            <td>
                <?= $result['Nama']; ?>
            </td>
            <td>
                <?= $result['JenisKelamin']; ?>
            </td>
            <td>
                <?= $result['Alamat']; ?>
            </td>
            <td>
                <?= $result['Agama']; ?>
            </td>
            <td>
                <?= $result['NoHp']; ?>
            </td>
            <td>
                <?= $result['Email']; ?>
            </td>
            <td>
                <button id="EditButton" value="<?php echo $result['IdMhsw']; ?>">Edit</button>
                <button id="DeleteButton" value="<?php echo $result['IdMhsw'] ?>">Delete</button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>