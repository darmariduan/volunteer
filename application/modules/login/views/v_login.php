<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Outer Row -->
<div class="row justify-content-center">
	<div class="col-lg-7">
		<div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4"><?= $login; ?></h1>
							</div>
							<div id="alert-message">
								<div class="center"><strong><?= $this->session->flashdata('message'); ?></strong></div>
							</div>
							<!-- <form class="user"> -->
							<form class="user" method="POST" enctype="multipart/form-data" action="<?= base_url('login/aksi') ?>">
								<div class="form-group">
									<input type="text" class="form-control form-control-user" name="username" placeholder="Username" value="<?= set_value('username'); ?>" autofocus>
									<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<input type="password" class="form-control form-control-user" name="password" placeholder="Password">
									<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<div class="justify-content-center">
										<input type="submit" id="submit" name="submit" value="Submit" class="btn btn-primary btn-user btn-block">
									</div>
								</div>
							</form>
							<div class="text-center">
								<!-- <button class="btn btn-lg btn-info"> -->
									<a href="<?= base_url('login/forgotPass');?>"> Lupa Password </a>
								<!-- </button> -->
								<br>
								<a href="<?= base_url(); ?>">Back to Dashboard</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>