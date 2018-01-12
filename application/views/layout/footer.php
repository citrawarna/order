		<div class="row">
			<div class="footer">
				&copy; Refo Junior - 2017
			</div>
		</div>
	
	</div> <!-- end container fluid -->
	

	<!-- JAVASCRIPT -->
    <script src="<?= base_url('assets/jquery-1.12.4.js') ?>"></script>
  	<script src="<?= base_url('assets/jquery-ui.js') ?>"></script>
  	<script>
  	$( function() {
   	 $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' });
   	 $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
  	} );
  	</script>
  	<!-- script for ajax form -->
  	<script>
  	$(document).ready(function(){
  		var row=0;

  		$('.btn-plus').click(function(e){
  			e.preventDefault();
  			row++;
  			var html = '<tr id="row'+row+'">';
  			html += '<input type="hidden" name="id_order[]" />';
  			html += '<td><input type="text" name="tanggal[]" class="form-control" required value="<?= date('Y-m-d') ?>" readonly/></td>';
  			html += '<td><input type="hidden" name="id_user[]" value="<?= $user ?>"><input type="text" class="form-control" required placeholder="<?= $username ?>" readonly></td>';
  			html += '<td><input type="text" name="nama_barang[]" class="form-control" required /></td>';
  			html += '<td><input type="text" name="jumlah[]" class="form-control" required /></td>';
  			html += '<td><input type="text" name="kemasan[]" class="form-control" required /></td>';
  			html += '<td><select name="cabang[]"><option value="">- Pilih -</option><option value="CW1">CW1</option><option value="CW2">CW2</option><option value="CW3">CW3</option><option value="CW4">CW4</option><option value="CW5">CW5</option><option value="CW6">CW6</option><option value="CW7">CW7</option><option value="CW8">CW8</option><option value="CW9">CW9</option><option value="CW10">CW10</option><option value="CW11">CW11</option><option value="CW12">CW12</option><option value="CW13">CW13</option></select></td>';
  			html += '<td><input type="text" name="pemesan[]" class="form-control" required /></td>';
  			html += '<td><input type="text" name="keterangan[]" class="form-control" /></td>';
  			html += '<td><button type="button" data-row="row'+row+'" class="btn btn-sm btn-danger fa fa-minus btn-minus"></button></td>';
  			html += '</tr>';
  			$('#order_table').append(html);
  		});

  		$(document).on('click', '.btn-minus', function(e){
  			e.preventDefault();
  			var data_row = $(this).attr('data-row');
  		
  			$('#'+data_row).remove();

  			row--;
  			
  		});
  	});
  	</script>
</body>
</html>