	<div class="row" align="center">
		<h2>Proses Orderan Cabang</h2>
	</div>
	
	<div class="row">

		<div class="back">
			<a href="<?= base_url('admin') ?>">
				<i class="fa fa-arrow-left"></i> Back
			</a>	
		</div>

		<form action="<?= base_url('admin/simpan_proses') ?>" method="post" style="width:98%">
			<table class="table" id="order_table">
				<tr class="bg-light">
					<th>No</th>
					<th>Nama Barang</th>
					<th>Jumlah</th>
					<th>Pemesan</th>
					<th></th>
					<th>Status Barang</th>
					<th>Dari </th>
					<th>Jadi ?</th>
					<th>Waktu Spesifik</th>
					<th>Keterangan</th>
					<th>PO</th>
				</tr>
				<?php $i=1; foreach($query as $row) {  ?>
				<tr>
					<td><?= $i++ ?></td>
					<input type="hidden" name="id_order[]" value="<?= $row['id_order'] ?>">
					<input type="hidden" name="id_konfirmasi[]" value="<?= $row['id_konfirmasi'] ?>">
					<td><?= $row['nama_barang'] ?></td>
					<td><?= $row['jumlah'] ?> <?= $row['kemasan'] ?></td>
					<td><?= $row['cabang'] ?> (<?= $row['pemesan'] ?>)</td>
					<td><input type="hidden" name="tanggal_konfirm[]" value="<?= date('Y-m-d'); ?>"></td>
					<td>
						<select name="status[]" id="">
							<option value="" <?php if($row['status']=="") { echo "selected"; } ?>>- Pilih -</option>
							<option value="Ada" <?php if($row['status']=="Ada") { echo "selected"; } ?> >Ada</option>
							<option value="Kosong" <?php if($row['status']=="Kosong") { echo "selected"; } ?>>Kosong</option>	
						</select>
					</td>
					<td><input type="text" name="dari[]" class="form-control" value="<?= $row['dari'] ?>"></td>
					<td>
						<select name="jadi[]" id="">
							<option value="" <?php if($row['jadi']=="") { echo "selected"; } ?>>- Pilih -</option>
							<option value="Ya" <?php if($row['jadi']=="Ya") { echo "selected"; } ?>>Ya</option>
							<option value="Tidak" <?php if($row['jadi']=="Tidak") { echo "selected"; } ?>>Tidak</option>	
						</select>
					</td>
					<td><input type="text" name="waktu_spesifik[]" class="form-control" value="<?= $row['waktu_spesifik'] ?>"></td>
					<td><input type="text" name="keterangan_konfirm[]" class="form-control" value="<?= $row['keterangan_konfirm'] ?>"></td>
					<td>
						<select name="progress[]" id="">
							<option value="" <?php if($row['progress']=="") { echo "selected"; } ?>>- Pilih -</option>
							<option value="Sudah" <?php if($row['progress']=="Sudah") { echo "selected"; } ?> >Sudah</option>
							<option value="Belum" <?php if($row['progress']=="Belum") { echo "selected"; } ?> >Belum</option>	
						</select>
					</td>
				</tr>
				<?php } ?>
			</table>
		
			<input type="submit" value="Simpan" class="btn btn-simpan">

		</form>
		<br>
	</div>