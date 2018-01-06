<?php 
	$id_user = $this->session->userdata('id_user');
	$user = $this->session->userdata('username');
	
 ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <img src="<?= base_url('assets/img/icon.png') ?>" width="45"  alt="logo"> 
   <a class="navbar-brand  mr-auto" href="<?= base_url() ?>">&nbsp; Aplikasi Orderan Khusus Berbasis Web</a>
   <?php if($user || $id_user == true) { ?>
   <span class="navbar-text">
      Hai <?= $user ?> <a href="<?= base_url('login/logout') ?>" class="btn btn-danger btn-sm">Logout</a> 
    </span>
   <?php } ?>
</nav>
<br>

<div class="container-fluid"> <!-- open container fluid -->