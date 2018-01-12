	<div class="row justify-content-md-center">
		<h3>Tambah Orderan Cabang</h3>
	</div>

	<div class="row">

		<div class="back">
			<a href="<?= base_url('admin') ?>">
				<i class="fa fa-arrow-left"></i> Back
			</a>	
		</div>
		<form action="<?= base_url('admin/edit/'.$input['id_order'])?>" method="post" style="width:98%">
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
					<input type="hidden" name="id_order" class="form-control">
					<td><input type="text" name="tanggal" class="form-control" required value="<?= $input['tanggal'] ?>" readonly></td>
					<td>
						<input type="hidden" name="id_user" value="<?= $user ?>">
						<input type="text" class="form-control" required placeholder="<?= $username ?>" readonly>
					</td>
					<td><input type="text" name="nama_barang" value="<?= $input['nama_barang'] ?>" class="form-control" required></td>
					<td><input type="text" name="jumlah" value="<?= $input['jumlah'] ?>" class="form-control" required></td>
					<td><input type="text" name="kemasan" value="<?= $input['kemasan'] ?>" class="form-control" required></td>
					<td><?= form_dropdown('cabang', getDropdownList('cabang', ['nama_cabang', 'nama_cabang']), $input['cabang']) ?></td>
					<td><input type="text" name="pemesan" value="<?= $input['pemesan'] ?>" class="form-control" required></td>
					<td><input type="text" name="keterangan" value="<?= $input['keterangan'] ?>" class="form-control"></td>
				</tr>
			</table>
			
			<input type="submit" value="Simpan" class="btn btn-simpan">
		</form>
		
	</div>