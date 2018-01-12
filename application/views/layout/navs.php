<?php 
	$id_user = $this->session->userdata('id_user');
	$user = $this->session->userdata('username');
	
 ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
      <div class="navbar-header">
          <a class="navbar-brand " href="<?= base_url() ?>" style="padding-top:18px">
            &nbsp; Aplikasi Orderan Khusus Berbasis Web
          </a>     
      </div>
      <div class="navbar-right">
        <?php if($user || $id_user == true) { ?>
         <span class="navbar-text">
            Hai <?= $user ?> <a href="<?= base_url('login/logout') ?>" class="btn btn-danger btn-sm">Logout</a> 
          </span>
        <?php } ?>
      </div>    
   </div>
</nav>
<br>

<div class="container-fluid"> <!-- open container fluid -->