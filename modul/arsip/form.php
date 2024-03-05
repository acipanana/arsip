<?php
// panggil function untuk upload file
include "config/function.php";




if (isset($_POST['bsimpan'])) {

    // Pengujian apakah data akan diedit
    if ($_GET['hal'] == "edit") {
        // Perintah edit data
        if ($_FILES['file']['error'] === 4) {
            $file = $vfile;
        }else{
            $file = upload ();
        }
        $ubah = mysqli_query($koneksi, "UPDATE tbl_arsip SET no_surat = '$_POST[no_surat]', tanggal_surat = '$_POST[tanggal_surat]', tanggal_diterima = '$_POST[tanggal_diterima]', perihal = '$_POST[perihal]', id_departemen = '$_POST[id_departemen]', id_pengirim = '$_POST[id_pengirim]', file = '$file' WHERE id_arsip = '$_GET[id]'");
        
        if($ubah){
            echo "<script>
                alert('Ubah data sukses');
                document.location='admin.php?halaman=arsip_surat';
                </script>";
        }
    } else {
        // Perintah simpan data baru
        // Simpan data
        $file = upload();
        $simpan = mysqli_query($koneksi, "INSERT INTO tbl_arsip VALUES ('', '$_POST[no_surat]', '$_POST[tanggal_surat]', '$_POST[tanggal_diterima]', '$_POST[perihal]', '$_POST[id_departemen]', '$_POST[id_pengirim]', '$file')");
            
        if($simpan){
            echo "<script>
                alert('Simpan data sukses');
                document.location='admin.php?halaman=arsip_surat';
                </script>";
        } else {
            echo "<script>
                alert('Maaf Untuk No Surat Tidak Boleh Sama Yaaaa');
                document.location='admin.php?halaman=arsip_surat';
                </script>";
        }
    }
}

if (isset($_GET['hal'])){
    if ($_GET['hal'] == "edit") {
        $tampil=mysqli_query($koneksi, "SELECT tbl_arsip.*, tbl_departemen.nama_departemen, 
            tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
            FROM tbl_arsip, tbl_departemen, tbl_pengirim_surat
            WHERE tbl_arsip.id_departemen = tbl_departemen.id_departemen
            AND tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim_surat
            AND tbl_arsip.id_arsip='$_GET[id]'");

        $data = mysqli_fetch_array($tampil);
        if($data){
            $vno_surat = $data['no_surat'];
            $vtanggal_surat= $data['tanggal_surat'];
            $vtanggal_diterima = $data['tanggal_diterima'];
            $vperihal = $data['perihal'];
            $vid_departenmen = $data['id_departemen'];
            $vnama_departenmen = $data['nama_departemen'];
            $vid_pengirim = $data['id_pengirim'];
            $vnama_pengirim = $data['nama_pengirim'];
            $vfile = $data['file'];
        }
    } else if($_GET['hal'] == 'hapus'){
        $hapus = mysqli_query($koneksi,"DELETE FROM tbl_arsip WHERE id_arsip='$_GET[id]'");
        if ($hapus) {
            echo "<script>
                alert('Hapus data sukses');
                document.location='admin.php?halaman=arsip_surat';
                </script>";
        }
    }
}
?>




<div class="card bg">
  <div class="card-header bg-black text-warning mt-3">
    Form Data Arsip Surat
  </div>
  <div class="card-body">
  <form method="post" action="" enctype="multipart/form-data">
      <div class="form-group">
        <label for="no_surat">No Surat</label>
        <input type="text" class="form-control mb-3" id="no_surat" name="no_surat" value="<?=@$vno_surat?>">
      </div>
      <div class="form-group">
        <label for="tanggal_surat">Tanggal Surat</label>
        <input type="date" class="form-control mb-3" id="tanggal_surat" name="tanggal_surat" value="<?=@$vtanggal_surat?>">
      </div>
      <div class="form-group">
        <label for="tanggal_diterima">Tanggal Diterima</label>
        <input type="date" class="form-control mb-3" id="tanggal_diterima" name="tanggal_diterima" value="<?=@$vtanggal_diterima?>">
      </div>
      <div class="form-group">
        <label for="perihal">Perihal</label>
        <input type="text" class="form-control mb-3" id="perihal" name="perihal" value="<?=@$vperihal?>">
      </div>
      <div class="form-group">
    <label for="id_departemen">Departemen / Tujuan</label>
    <select class="form-control" name="id_departemen">
            <?php
            $tampil_departemen = mysqli_query($koneksi, "SELECT * FROM tbl_departemen ORDER BY nama_departemen ASC");
            while($data_departemen = mysqli_fetch_array($tampil_departemen)){
                   $nana = ($data_departemen['id_departemen'] == $vid_departenmen) ? "nana" : "";
                   echo "<option value='$data_departemen[id_departemen]' $selected>$data_departemen[nama_departemen]</option>";
               }
             ?>
          </select>
        </div>      

      <div class="form-group">
        <label for="id_pengirim">Pengirim Surat</label>
        <select class="form-control" name="id_pengirim">
          <option value="<?=@$vid_pengirim?>"><?=@$vnama_pengirim?></option>
          <?php

          $tampil = mysqli_query($koneksi, "SELECT*from tbl_pengirim_surat order by nama_pengirim asc");
          while($data = mysqli_fetch_array($tampil)){
            echo "<option value = '$data[id_pengirim_surat]'> $data[nama_pengirim]</option>";
          }

          ?>
           <div class="form-group">
        <label for="file">file</label>
        <input type="file" class="form-control mb-3" id="file" name="file" value="<?=@$vfile?>">
      </div>
      <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
      <button type="reset" name="batal" class="btn btn-danger">batal</button>
        </select>
    </form>
  </div>
</div>
