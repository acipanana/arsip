<?php
if (isset($_POST['bsimpan'])) {
    $nama_departemen = mysqli_real_escape_string($koneksi, $_POST['nama_departemen']);

    if (isset($_GET['hal']) && $_GET['hal'] == "edit") {
        // Check for duplicate entry before updating
        $check_duplicate = mysqli_query($koneksi, "SELECT id_departemen FROM tbl_departemen WHERE nama_departemen = '$nama_departemen' AND id_departemen != '$_GET[id]'");
        if (mysqli_num_rows($check_duplicate) > 0) {
            echo "<script>
                alert('Maaf Nama Departemen Tidak Boleh sama');
            </script>";
        } else {
            // Update data
            $ubah = mysqli_query($koneksi, "UPDATE tbl_departemen SET nama_departemen = '$nama_departemen' WHERE id_departemen = '$_GET[id]'");

            if ($ubah) {
                echo "<script>
                    alert('Ubah data sukses');
                    document.location='admin.php?halaman=departemen';
                </script>";
            }
        }
    } else {
        // Check for duplicate entry before inserting
        $check_duplicate = mysqli_query($koneksi, "SELECT id_departemen FROM tbl_departemen WHERE nama_departemen = '$nama_departemen'");
        if (mysqli_num_rows($check_duplicate) > 0) {
            echo "<script>
                alert('Maaf Nama Departemen Tidak Boleh sama');
            </script>";
        } else {
            // Insert data
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_departemen (nama_departemen) VALUES ('$nama_departemen')");
            
            if ($simpan) {
                echo "<script>
                    alert('Simpan data sukses');
                    document.location='admin.php?halaman=departemen';
                </script>";
            }
        }
    }
}

if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "edit") {
        $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_departemen where id_departemen='$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            $vnama_departemen = $data['nama_departemen'];
        }
    } else {
        $hapus = mysqli_query($koneksi, "DELETE FROM tbl_departemen WHERE id_departemen='$_GET[id]'");
        if ($hapus) {
            echo "<script>
                alert('Hapus data sukses');
                document.location='admin.php?halaman=departemen';
            </script>";
        }
    }
}
?>

<!-- Your HTML Form -->
<div class="card bg">
    <div class="card-header bg-black text-warning mt-3">
        Form data departemen
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group">
                <label for="nama_departemen">Nama Departemen</label>
                <input type="text" class="form-control" id="nama_departemen" name="nama_departemen" value="<?= @$vnama_departemen ?>">
            </div>
            <button type="submit" name="bsimpan" class="btn btn-primary mb-3">Simpan</button>
            <button type="reset" name="bbatal" class="btn btn-danger mb-3">Batal</button>
        </form>
    </div>
</div>

<!-- Display Data in a Table -->
<div class="card-body">
    <div class="card-header bg-black text-warning mt-3">
        Data departemen
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hovered table-striped">
            <tr>
                <th>No</th>
                <th>Nama Departemen</th>
                <th>Aksi</th>
            </tr>
            <?php
            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_departemen ORDER BY id_departemen DESC");
            $no = 1;

            while ($data = mysqli_fetch_array($tampil)) :
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_departemen'] ?></td>
                    <td>
                        <a href="?halaman=departemen&hal=edit&id=<?= $data['id_departemen'] ?>" class="btn btn-outline-success"> Edit </a>
                        <a href="?halaman=departemen&hal=hapus&id=<?= $data['id_departemen'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')" class="btn btn-outline-danger"> Hapus </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>
