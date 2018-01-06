<!-- HEADER -->
<?php $this->load->view('layout/header') ?>


<!-- navbar -->
<?php $this->load->view('layout/navs') ?>
	
	
		<div class="row justify-content-md-center">
			<h3>List Orderan Cabang</h3>
		</div>

		<div class="row">
			<div class="col-md-8">
				<div class="paragraph">
					<b><p>Tampilkan orderan dari tanggal <input type="text" id="datepicker1" placeholder="YYYY-MM-DD"> s.d <input type="text" id="datepicker2" placeholder="YYYY-MM-DD"> <a href="#" class="btn btn-secondary">OK</a> </p></b> 
				</div>
			</div>
			<div class="col-md-4" align="right">
				<input type="text" style="margin:25px 0; width:270px" placeholder="Masukan Nama Barang / Cabang"><input type="submit" value="Cari">
			</div>
		</div>

		<div class="row">
			<table class="table table-striped table-sm">				
				<tr class="bg-light">
					<td align="center">No</td>
					<td>Tanggal</td>
					<td>Nama</td>
					<td>Nama Barang</td>
					<td>Jumlah</td>				
					<td>Cabang</td>
					<td>Keterangan</td>
					<td> Action</td>
				</tr>
				<?php $i=1; foreach($data as $row){ ?>
				<tr>
					<td align="center"><?= $i++ ?></td>
					<td><?= $row['tanggal'] ?></td>
					<td><?= ucwords($row['username']) ?></td>
					<td><?= $row['nama_barang'] ?></td>
					<td><?= $row['jumlah'] ?> <?= $row['kemasan'] ?></td>
					<td><?= $row['cabang'] ?> (<?= $row['pemesan'] ?>)</td>
					<td><?= $row['keterangan'] ?></td>
					<td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">Details</button></td>
				</tr>
				<?php } ?>		
			</table>
		</div>

		<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Detail Orderan</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <table class="table table-sm">
				        	<tr>
				        		<td>Tanggal </td>
				        		<td> : </td>
				        		<td>2017-12-26</td>
				        	</tr>
				        	<tr>
				        		<td>Nama SCM </td>
				        		<td> : </td>
				        		<td>Asrul</td>
				        	</tr>
				        	<tr>
				        		<td>Nama Barang </td>
				        		<td> : </td>
				        		<td>WLD701</td>
				        	</tr>
				        	<tr>
				        		<td>Jumlah </td>
				        		<td> : </td>
				        		<td>4 Galon</td>
				        	</tr>
				        	<tr>
				        		<td>Cabang </td>
				        		<td> : </td>
				        		<td>CW5 (Fandi)</td>
				        	</tr>
				        	<tr>
				        		<td>Status </td>
				        		<td> : </td>
				        		<td style="color:green; "> <b>Ada</b> </td>
				        	</tr>
				        	<tr>
				        		<td>Jadi </td>
				        		<td> : </td>
				        		<td style="color:red; "> <b>Tidak</b> </td>
				        	</tr>
				        	<tr>
				        		<td>Pukul </td>
				        		<td> : </td>
				        		<td> 12.00 </td>
				        	</tr>
				        	<tr>
				        		<td>Keterangan </td>
				        		<td> : </td>
				        		<td> Dialihkan ke produk unggulan</td>
				        	</tr>
				        </table>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>

		<div class="row justify-content-end" style="margin-right:10px">
			<?= $pagination ?>
		</div>
		<br>

<?php $this->load->view('layout/footer') ?>