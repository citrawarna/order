	<div class="row justify-content-md-center">
		<h3>Proses Orderan Cabang</h3>
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
					<td>No</td>
					<td>Nama Barang</td>
					<td>Jumlah</td>
					<td>Pemesan</td>
					<td>Status Barang</td>
					<td>Jadi ?</td>
					<td>Dari </td>
					<td>Waktu Spesifik</td>
					<td>Keterangan</td>
				</tr>
				<?php $i=1; foreach($query as $row) {  ?>
				<tr>
					<td><?= $i++ ?></td>
					<input type="hidden" name="id_order[]" value="<?= $row['id_order'] ?>">
					<input type="hidden" name="id_konfirmasi[]" value="<?= $row['id_konfirmasi'] ?>">
					<td><?= $row['nama_barang'] ?></td>
					<td><?= $row['jumlah'] ?> <?= $row['kemasan'] ?></td>
					<td><?= $row['cabang'] ?> (<?= $row['pemesan'] ?>)</td>
					
					<td>
						<select name="status[]" id="">
							<option value="" <?php if($row['status']=="") { echo "selected"; } ?>>- Pilih -</option>
							<option value="Ada" <?php if($row['status']=="Ada") { echo "selected"; } ?> >Ada</option>
							<option value="Kosong" <?php if($row['status']=="Kosong") { echo "selected"; } ?>>Kosong</option>	
						</select>
					</td>
					<td>
						<select name="jadi[]" id="">
							<option value="" <?php if($row['jadi']=="") { echo "selected"; } ?>>- Pilih -</option>
							<option value="Ya" <?php if($row['jadi']=="Ya") { echo "selected"; } ?>>Ya</option>
							<option value="Tidak" <?php if($row['jadi']=="Tidak") { echo "selected"; } ?>>Tidak</option>	
						</select>
					</td>
					<td><input type="text" name="dari[]" class="form-control" value="<?= $row['dari'] ?>"></td>
					<td><input type="text" name="waktu_spesifik[]" class="form-control" value="<?= $row['waktu_spesifik'] ?>"></td>
					<td><input type="text" name="keterangan_konfirm[]" class="form-control" value="<?= $row['keterangan_konfirm'] ?>"></td>
				</tr>
				<?php } ?>
			</table>
		
			<input type="submit" value="Simpan" class="btn btn-simpan">
		</form>
		
	</div>