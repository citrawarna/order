<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
	<!-- LOGIN FORM -->
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-6 col-md-offset-3">
	            <div class="login-content">
	                <div class="login-title">
	                    <h4>login</h4>
	                    <p>Silahkan login menggunakan akun anda</p>
	                </div>
	                <?php 
	        			if($this->session->flashdata('error')) { 
						    echo '<div class="alert alert-danger">';
						    echo $this->session->flashdata('error');
						    echo '</div>';
						} 
	                 ?>
	                <div class="login-form">
	                    <form action="<?= base_url('login') ?>" method="post">
	                        <input name="username" placeholder="Username" type="text" class="form-control">
	                        <?= form_error('username', '<p class="alert alert-danger">', '</p>') ?>
	                        <input name="password" placeholder="Password" class="form-control" type="password">
	                        <?= form_error('password', '<p class="alert alert-danger">', '</p>') ?>
	                        <button type="submit" class="login-btn">Login</button>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	<!-- JAVASCRIPT -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>