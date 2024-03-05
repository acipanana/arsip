<div class="card-body">
    <div class="card-header bg-black text-warning mt-3">
        Data Arsip Surat
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <a href="?halaman=arsip_surat&hal=tambahdata" class="btn btn-outline-warning mb-3">Tambah Data</a>
            </div>
            <div class="col-md-6">
                <form method="post" class="form-inline float-right">
                    <div class="input-group">
                        <input type="text" name="tcari" class="form-control" placeholder="Mau Cari Apa Kakak">
                        <div class="input-group-append">
                            <button class="btn btn-warning" name="bcari" type="submit">Cari</button>
                            <button class="btn btn-danger" name="breset" type="submit">Ngak Jadi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hovered table-striped">
            <tr>
                <th>no</th>
                <th>No Surat</th>
                <th>Tanggal Surat</th>
                <th>Tanggal Diterima</th>
                <th>Perihal</th>
                <th>ID Departemen</th>
                <th class="text-center">ID Pengirim</th>
                <th>File</th>
                <th class="text-center">Aksi</th>
            </tr>
            <?php
            // untuk pencarian data
            // jika tombol cari di klik
           if (isset($_POST['bcari'])) {
                $keyword = $_POST['tcari'];
                $q = "SELECT tbl_arsip.*, tbl_departemen.nama_departemen, tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
        FROM tbl_arsip
        LEFT JOIN tbl_departemen ON tbl_arsip.id_departemen = tbl_departemen.id_departemen
        LEFT JOIN tbl_pengirim_surat ON tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim_surat
        WHERE tbl_arsip.no_surat LIKE '%$keyword%' 
             OR tbl_arsip.tanggal_surat LIKE '%$keyword%' 
             OR tbl_arsip.perihal LIKE '%$keyword%'
             OR tbl_arsip.tanggal_diterima LIKE '%$keyword%'
             OR tbl_departemen.nama_departemen LIKE '%$keyword%'
             OR tbl_pengirim_surat.nama_pengirim LIKE '%$keyword%'
             OR tbl_pengirim_surat.no_hp LIKE '%$keyword%'";

                } else {
                    $q =  "SELECT tbl_arsip.*, tbl_departemen.nama_departemen, tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
                            FROM tbl_arsip, tbl_departemen, tbl_pengirim_surat
                            WHERE tbl_arsip.id_departemen = tbl_departemen.id_departemen
                            AND tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim_surat";
                }

            $tampil = mysqli_query($koneksi, $q); // Letakkan query setelah definisi $q

            $no = 1;

            while ($data = mysqli_fetch_array($tampil)) :
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['no_surat'] ?></td>
                    <td><?= $data['tanggal_surat'] ?></td>
                    <td><?= $data['tanggal_diterima'] ?></td>
                    <td><?= $data['perihal'] ?></td>
                    <td><?= $data['nama_departemen'] ?></td>
                    <td><?= $data['nama_pengirim'] ?> / <?= $data['no_hp'] ?></td>
                    <td>
                        <?php
                        //uji file ada atau tidak
                        if (empty($data['file'])) {
                            echo " - ";
                        } else {
                        ?>
                            <a href="file/<?= $data['file'] ?>" target="_blank" class="btn btn-warning"> File </a>
                        <?php } ?>
                    </td>
                    <td>
                        <a href="?halaman=arsip_surat&hal=edit&id=<?= $data['id_arsip'] ?>" class="btn btn-outline-success"> Edit </a>
                        <a href="?halaman=arsip_surat&hal=hapus&id=<?= $data['id_arsip'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')" class="btn btn-outline-danger"> Hapus </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>
