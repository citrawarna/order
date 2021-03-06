<!-- HEADER -->
<?php $this->load->view('layout/header') ?>


<!-- navbar -->
<?php $this->load->view('layout/navs') ?>
	
	
		<div class="row">
			<h2 align="center">List Orderan Cabang</h2>
		</div>

		<div class="row">
			<div class="col-md-8">
				<div class="paragraph">
					<form action="<?= base_url('home/tanggal') ?>" method="get">
						<b><p>Tampilkan orderan dari tanggal 
							<input type="text" id="datepicker1" placeholder="YYYY-MM-DD" name="dari"> 
							s.d 
							<input type="text" id="datepicker2" placeholder="YYYY-MM-DD" name="sampai">  
							<input type="submit" class="btn btn-secondary" value="OK">
						</p></b> 
					</form>
				</div>
			</div>
			<div class="col-md-4" align="right">
				<?= form_open('home/search', ['method' => 'GET']) ?>
				<?= form_input('keywords', $this->input->get('keywords'),['placeholder' => 'Masukan Nama Barang / Cabang', 'style' => 'margin:25px 0; width:270px']) ?>
				<?= form_button(['type' => 'submit', 'content' => 'Cari']) ?>
				<?= form_close() ?>
			</div>
		</div>
		<!-- flash message -->
		<div class="col-md-12">
			<?php if($this->session->flashdata('success')) {
					echo '<p class="alert alert-success">';
					echo $this->session->flashdata('success');
					echo '</p>';
				} else if($this->session->flashdata('error')) {
					echo '<p class="alert alert-danger">';
					echo $this->session->flashdata('error');
					echo '</p>';
					} ?>	
		</div>
		<div class="row">
			<table class="table table-striped table-condensed">				
				<tr class="bg-light">
					<th align="center">No</th>
					<th>Tanggal</th>					
					<th>Nama Barang</th>
					<th>Jumlah</th>				
					<th>Cabang</th>
					<th>Status Barang</th>
					<th>Jadi</th>
					<th>Catatan</th>
					<th>View</th>
				</tr>
				
				<?php $i=1; foreach($data as $row){ ?>

				<tr>
					<?php //(cara bodo) query modal 
						$detail = $this->db->join('order', 'konfirmasi.id_order = order.id_order')
										->join('user', 'user.id_user = order.id_user')
										->where('order.id_order', $row['id_order'] )
										->get('konfirmasi')
										->row_array();
					?>
					<td align="center"><?= $i++ ?></td>
					<td><?= $row['tanggal'] ?></td>		
					<td><?= $row['nama_barang'] ?></td>
					<td><?= $row['jumlah'] ?> <?= $row['kemasan'] ?></td>
					<td><?= $row['cabang'] ?> (<?= $row['pemesan'] ?>)</td>
					<td style="<?php if($detail['status'] == 'Ada') 
										echo "color:green"; 
									else if($detail['status'] == 'Kosong') {
										echo "color:red";
									}
									?>">
						<b>
							<?php if($detail['status'] == '') echo "Belum Ada Konfirmasi" ?>
							<?php if(isset($detail['status'])) echo $detail['status'] ?>
						</b>
					</td>
					<td style="<?php if($detail['jadi'] == 'Ya') 
										echo "color:green"; 
									else if($detail['jadi'] == 'Tidak') {
										echo "color:red";
									}
									?>">
						<b>
							<?php if($detail['jadi'] == '') echo "Belum Ada Konfirmasi" ?>
							<?php if(isset($detail['jadi'])) echo $detail['jadi'] ?>
						</b>
					</td>
					<td><?= substr($row['keterangan'], 0, 15)."..."  ?></td>
					<td>
						<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal<?=$row['id_order'] ?>"><i class="fa fa-eye"></i> Details</button>
							
							<!-- Modal -->
								<div class="modal fade" id="exampleModal<?=$row['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h3 class="modal-title" id="exampleModalLabel">Detail Orderan</h3>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <table class="table table-sm">
								        	<tr>
								        		<td>Tanggal </td>
								        		<td> : </td>
								        		<td><?= $row['tanggal'] ?></td>
								        	</tr>
								        	<tr>
								        		<td>Nama SCM </td>
								        		<td> : </td>
								        		<td><?= $row['username'] ?></td>
								        	</tr>
								        	<tr>
								        		<td>Nama Barang </td>
								        		<td> : </td>
								        		<td><?= $row['nama_barang'] ?></td>
								        	</tr>
								        	<tr>
								        		<td>Jumlah </td>
								        		<td> : </td>
								        		<td><?= $row['jumlah'] ?> <?= $row['kemasan'] ?></td>
								        	</tr>
								        	<tr>
								        		<td>Cabang </td>
								        		<td> : </td>
								        		<td><?= $row['cabang'] ?> (<?= $row['pemesan'] ?>)</td>
								        	</tr>
								        	<tr>
								        		<td>Status Barang (Ada/Kosong) </td>
								        		<td> : </td>
								        		<!-- (cara bodo) memberi warna dan keterangan tulisan -->
								        		<td style="<?php if($detail['status'] == 'Ada') 
								        							echo 'color:green;'; 
								        						else if($detail['status'] == 'Kosong') 
								        							echo 'color:red;' ?>"> 
								        				<b><?php if($detail['status'] == '')
								        							echo 'Belum Ada Konfirmasi'; 
								        						else 
								        							echo $detail['status'] ?></b> 
								        		</td>
								        	</tr>
								        	<tr>
								        		<td>Barang dari </td>
								        		<td> : </td>
								        		<td> <?= $detail['dari'] ?> </td>
								        	</tr>
								        	<tr>
								        		<td>Jadi (Ya/Tidak)</td>
								        		<td> : </td>
								        		<!-- (cara bodo) memberi warna dan keterangan tulisan -->
								        		<td style="<?php if($detail['jadi'] == 'Ya') 
								        							echo 'color:green;'; 
								        						else if($detail['jadi'] == 'Tidak') 
								        							echo 'color:red;' ?>"> 
								        						<b><?php if($detail['jadi'] == '')
								        							echo 'Belum Ada Konfirmasi'; 
								        						else 
								        							echo $detail['jadi'] ?></b> 
								        		</td>
								        	</tr>
								        	<tr>
								        		<td>Waktu Spesifik </td>
								        		<td> : </td>
								        		<td> <?= $detail['waktu_spesifik'] ?> </td>
								        	</tr>
								        	<tr>
								        		<td>Catatan </td>
								        		<td> : </td>
								        		<td><?= $row['keterangan'] ?></td>	
								        	</tr>
								        	<tr>
								        		<td>Keterangan </td>
								        		<td> : </td>
								        		<td> <?= $detail['keterangan_konfirm'] ?></td>
								        	</tr>
								        </table>
								      </div>
								     
								    </div>
								  </div>
								</div>
					</td>
				</tr>
				<?php } ?>		
			</table>
		</div>

		<div class="row" align="right" style="margin-right:10px">
			<?= $pagination ?>
		</div>


<?php $this->load->view('layout/footer') ?>