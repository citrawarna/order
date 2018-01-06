	<div class="row justify-content-md-center">
		<h3>Tambah Orderan Cabang</h3>
	</div>

	<div class="row">

		<div class="back">
			<a href="<?= base_url('admin') ?>">
				<i class="fa fa-arrow-left"></i> Back
			</a>	
		</div>
		<form action="<?= base_url('admin/tambah')?>" method="post" style="width:98%">
			<table class="table" id="order_table">
				<tr class="bg-light">
					<td>Tanggal</td>
					<td>Nama</td>
					<td>Nama Barang</td>
					<td>Jumlah</td>
					<td>Kemasan</td>
					<td>Cabang</td>
					<td>Pemesan</td>
					<td>Keterangan</td>
				</tr>
				<tr>
					<input type="hidden" name="id_order[]" class="form-control">
					<td><input type="text" name="tanggal[]" class="form-control" required value="<?= date('Y-m-d') ?>" readonly></td>
					<td>
						<input type="hidden" name="id_user[]" value="<?= $user ?>">
						<input type="text" class="form-control" required placeholder="<?= $username ?>" readonly>
					</td>
					<td><input type="text" name="nama_barang[]" class="form-control" required></td>
					<td><input type="text" name="jumlah[]" class="form-control" required></td>
					<td><input type="text" name="kemasan[]" class="form-control" required></td>
					<td><?= form_dropdown('cabang[]', getDropdownList('cabang', ['nama_cabang', 'nama_cabang'])) ?></td>
					<td><input type="text" name="pemesan[]" class="form-control" required></td>
					<td><input type="text" name="keterangan[]"class="form-control"></td>
				</tr>
			</table>
			<div class="order-btn">
				<a href="#" class="btn-plus"><i class="fa fa-plus"></i> Tambah</a>
			</div>
			
			<input type="submit" value="Simpan" class="btn btn-simpan">
		</form>
		
	</div>