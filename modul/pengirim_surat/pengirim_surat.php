<?php
if (isset($_POST['bsimpan'])) {

    // Periksa apakah "hal" diatur dalam array $_GET
    if (isset($_GET['hal'])) {
        // Pengujian apakah data akan diedit
        if ($_GET['hal'] == "edit") {
            // Perintah edit data
            $ubah = mysqli_query($koneksi, "UPDATE tbl_pengirim_surat SET nama_pengirim = '$_POST[nama_pengirim]', alamat = '$_POST[alamat]', no_hp = '$_POST[no_hp]', email = '$_POST[email]' WHERE id_pengirim_surat = '$_GET[id]'");
            if ($ubah) {
                echo "<script>
                    alert('Ubah data sukses');
                    document.location='admin.php?halaman=pengirim_surat';
                </script>";
            }
        }
    } else {
        // Perintah simpan data baru
        // Simpan data
        $nama_pengirim = mysqli_real_escape_string($koneksi, $_POST['nama_pengirim']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
        $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);

        // Periksa email duplikat sebelum memasukkan
        $check_duplicate = mysqli_query($koneksi, "SELECT id_pengirim_surat FROM tbl_pengirim_surat WHERE email = '$email'");
        if (mysqli_num_rows($check_duplicate) > 0) {
            echo "<script>
                alert('Maaf untuk Email Tidak Boleh Sama Yaaaa');
                document.location='admin.php?halaman=pengirim_surat';
            </script>";
        } else {
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_pengirim_surat (nama_pengirim, alamat, no_hp, email) VALUES ('$nama_pengirim','$alamat','$no_hp','$email')");

            if ($simpan) {
                echo "<script>
                    alert('Simpan data sukses');
                    document.location='admin.php?halaman=pengirim_surat';
                </script>";
            } else {
                echo "<script>
                    alert('Simpan data Gagal');
                    document.location='admin.php?halaman=pengirim_surat';
                </script>";
            }
        }
    }
}

if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "edit") {
        $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengirim_surat where id_pengirim_surat='$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            $vnama_pengirim = $data['nama_pengirim'];
            $valamat = $data['alamat'];
            $vno_hp = $data['no_hp'];
            $vemail = $data['email'];
        }
    } elseif ($_GET['hal'] == "hapus") {
        $hapus = mysqli_query($koneksi, "DELETE FROM tbl_pengirim_surat WHERE id_pengirim_surat='$_GET[id]'");
        if ($hapus) {
            echo "<script>
                alert('Hapus Data Sukses');
                document.location='admin.php?halaman=pengirim_surat';
            </script>";
        }
    }
}
?>



<div class="card bg">
  <div class="card-header bg-black text-warning mt-3">
    Form data pengirim suratt
  </div>
  <div class="card-body">
   <form method="post" action="">
      <div class="form-group">
        <label for="nama_pengirim">nama pengirim</label>
        <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" value="<?=@$vnama_pengirim?>">
      </div>
      <div class="form-group">
        <label for="alamat">alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="<?=@$valamat?>">
      </div>
      <div class="form-group">
        <label for="no_hp">No_Hp</label>
        <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?=@$vno_hp?>">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?=@$vemail?>">
      </div>
      <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
      <button type="reset" name="bbatal" class="btn btn-danger">batal</button>
    </form>
  </div>
</div>


<div class="card-body">
  <div class="card-header bg-black text-warning mt-3">
    data departemen
  </div>
  <div class="card-body">
    <table class="table table-bordered table-hovered table-striped">
     <tr>
       <th>no</th>
       <th>nama pengirim surat</th>
       <th>alamat</th>
       <th>no hp</th>
       <th>email</th>
       <th>aksi</th>
     </tr>
     <?php
     $tampil = mysqli_query($koneksi, "SELECT*from tbl_pengirim_surat order by id_pengirim_surat desc");
     $no=1;

     while ($data = mysqli_fetch_array($tampil)) :
      ?>
     <tr>
       <td><?=$no++?></td>
       <td><?=$data['nama_pengirim']?></td>
       <td><?=$data['alamat']?></td>
       <td><?=$data['no_hp']?></td>
       <td><?=$data['email']?></td>

       <td>
         <a href="?halaman=pengirim_surat&hal=edit&id=<?=$data['id_pengirim_surat']?>" class="btn btn-outline-success"> Edit </a>
         <a href="?halaman=pengirim_surat&hal=hapus&id=<?=$data['id_pengirim_surat']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')" class="btn btn-outline-danger"> Hapus </a>
       </td>
     </tr>
     <?php endwhile;
     ?>
   </table>
  </div>
</div>



