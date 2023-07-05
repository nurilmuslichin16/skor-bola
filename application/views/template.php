<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap demo</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<script src="<?= site_url('assets/js/jquery-3.7.0.js'); ?>"></script>
	<style>
		li .active {
			font-weight: bold;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container-fluid">
			<a class="navbar-brand" href="<?= base_url(); ?>">
				<i class="fas fa-futbol"></i>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link <?= $this->uri->segment(1) == false ? 'active' : '' ?>" aria-current="page" href="<?= base_url(); ?>">Klasemen</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link <?= $this->uri->segment(1) == 'inputskor' ? 'active' : '' ?>" dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Input Skor
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="<?= base_url('inputskor'); ?>">Satu Pertandingan</a></li>
							<li><a class="dropdown-item" href="<?= base_url('inputskor/multiple'); ?>">Beberapa Pertandingan</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= $this->uri->segment(1) == 'inputklub' ? 'active' : '' ?>" href="<?= base_url('inputklub'); ?>">Input Data Klub</a>
					</li>
				</ul>
				<form class="d-flex" role="search">
					<div>Developer By <a href="https://www.linkedin.com/in/nurilmuslichin16/" target="_blank"><b>Nuril Muslichin</b></a></div>
				</form>
			</div>
		</div>
	</nav>

	<?php $this->load->view($content); ?>

	<script src="<?= site_url('assets/js/sweetalert2.all.min.js'); ?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>