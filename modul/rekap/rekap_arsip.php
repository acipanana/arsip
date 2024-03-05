<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #print-table, #print-table * {
            visibility: visible;
        }
        #print-table {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>
	<div class="col-md-12">
		<div class="card shadow mb-4 mt-3">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Data Rekap Surat
				[<?= date('d-m-y')?>]</h6>
			</div>
			<div class="card-body">
				<form method="post" action="" class="text-center">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Dari Tanggal</label>
								<input class="form-control" type="date" name="tanggal1" value="<?= isset($_POST['tanggal1'])?$_POST['tanggal1']: date('y-m-d')?>" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Sampai Tanggal</label>
								<input class="form-control" type="date" name="tanggal2" value="<?= isset($_POST['tanggal2'])?$_POST['tanggal2']: date('y-m-d')?>" required>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-4"></div>
							<div class="col-md-2">
								<button class="btn btn-warning form-control mt-3" name="btampilkan"><i class="fa fa-search"></i>Tampilkan</button>
   							</div>
   							<div class="col-md-2">
								<a href="admin.php?halaman=arsip_surat" class="btn btn-danger form-control mt-3">Ngak Jadi Ahh</a>
   							</div>

						</div>
					</form>

		<?php
if (isset($_POST['btampilkan'])) {
    // Eksekusi kode PHP untuk menampilkan tabel hanya ketika tombol "Tampilkan" ditekan
?>
    <div class="float-right mt-5">
    </div>
    <div class="col-md-2">
        <button class="btn btn-success form-control mt-3 mb-3" onclick="printData()"><i class="fa fa-print"></i> Print</button>
    </div>
    <table id="print-table" class="table table_borderd table-hovered table-striped">
        <tr>
            <th>no</th>
            <th>No Surat</th>
            <th>Tanggal Surat</th>
            <th>Tanggal Diterima</th>
            <th>Perihal</th>
            <th>ID Departemen</th>
            <th class="text-center">ID Pengirim</th>
            <th>File</th>
        </tr>
        <?php
            // Eksekusi query
            $tgl1 = $_POST['tanggal1'];
            $tgl2 = $_POST['tanggal2'];

            $tampil = mysqli_query($koneksi, "SELECT tbl_arsip.*, tbl_departemen.nama_departemen, 
                tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
                FROM tbl_arsip, tbl_departemen, tbl_pengirim_surat
                WHERE tbl_arsip.id_departemen = tbl_departemen.id_departemen
                AND tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim_surat 
                AND tbl_arsip.tanggal_surat BETWEEN '$tgl1' AND '$tgl2' 
                ORDER BY tbl_arsip.tanggal_surat DESC");

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
                if (empty($data['file'])) {
                    echo " - ";
                } else {
                ?>
                    <a href="file/<?= $data['file'] ?>" target="_blank"> Lihat File </a>
                <?php } ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
<?php
}
?>
			<?php

					if (isset($_POST['btampilkan'])) :

					?>

					<div class="float-right mt-5">
        			</div>
        			<div class="col-md-2">
						<button class="btn btn-success form-control mt-3 mb-3" onclick="printData()"><i class="fa fa-print"></i> Print</button>
					</div>
        <table id="print-table" class="table table_borderd table-hovered table-striped">
            <tr>
                <th>no</th>
                <th>No Surat</th>
                <th>Tanggal Surat</th>
                <th>Tanggal Diterima</th>
                <th>Perihal</th>
                <th>ID Departemen</th>
                <th class="text-center">ID Pengirim</th>
                <th>File</th>
            </tr>
            <?php
				$tgl1 = $_POST['tanggal1'];
				$tgl2 = $_POST['tanggal2'];

				$tampil = mysqli_query($koneksi, "SELECT tbl_arsip.*, tbl_departemen.nama_departemen, 
				        tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
				        FROM tbl_arsip, tbl_departemen, tbl_pengirim_surat
				        WHERE tbl_arsip.id_departemen = tbl_departemen.id_departemen
				        AND tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim_surat 
				        AND tbl_arsip.tanggal_surat BETWEEN '$tgl1' AND '$tgl2' 
				        ORDER BY tbl_arsip.tanggal_surat DESC");


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
                            <a href="file/<?= $data['file'] ?>" target="_blank"> Lihat File </a>
                        <?php } ?>
                    </td>
                    
                </tr>
            <?php endwhile; ?>
           </table>

       <?php endif; ?>
				</div>
			</div>
		</div>
	</div>

<script>
    function printData() {
        window.print();
    }
</script>
