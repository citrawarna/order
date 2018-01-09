<!-- HEADER -->
<?php $this->load->view('layout/header') ?>


<!-- navbar -->
<?php $this->load->view('layout/navs') ?>

<!-- content -->
<div class="jarak">
	<?php $this->load->view($view) ?>
</div>


<!-- footer -->
<?php $this->load->view('layout/footer') ?>