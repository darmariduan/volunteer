<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row justify-content-center">
	<div class="col-lg-7">
		<div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4"><?= $register; ?></h1>
							</div>
							<?= $this->session->flashdata('message'); ?>
							<form action="<?php echo base_url('login/regkom'); ?>" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama" autofocus>
									<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat...">
									<?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<select class="form-control " name="agama" id="agama">
										<option value="">Agama</option>
										<?php foreach ($agama as $row) : ?>
											<option value="<?php echo $row['id']; ?>"><?php echo $row['keterangan']; ?>
											</option>
										<?php endforeach; ?>
									</select>
									<?= form_error('category', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-user" id="tempatlahir" name="tempatlahir" placeholder="Tempat Tanggal Lahir">
									<?= form_error('organisasi', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-user" id="organisasi" name="organisasi" placeholder="Organisasi ...">
									<?= form_error('organisasi', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email ...">
									<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-user" id="nohp" name="nohp" placeholder="Nomor Handphone ...">
									<?= form_error('nohp', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<select class="form-control " name="program" id="program">
										<option value="">Program</option>
										<?php foreach ($program as $row) : ?>
											<option value="<?php echo $row['id']; ?>"><?php echo $row['keterangan']; ?>
											</option>
										<?php endforeach; ?>
										<?= form_error('program', '<small class="text-danger">', '</small>'); ?>
									</select>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username ...">
									<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
										<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
									</div>
									<div class="col-sm-6">
										<input type="password" class="form-control form-control-user" id="repassword" name="repassword" placeholder="Repeat Password">
										<?= form_error('repassword', '<small class="text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="form-group">
									<select class="form-control " name="category" id="category">
										<option value="">No Selected</option>
										<?php foreach ($role1 as $row) : ?>
											<option value="<?php echo $row['id']; ?>"> <?php echo $row['keterangan']; ?></option>
										<?php endforeach; ?>
									</select>
									<?= form_error('category', '<small class="text-danger">', '</small>'); ?>
								</div>
								<div class="form-group">
									<label for="password" class="control-label">Image</label>
									<div class="col-md-9 col-sm-9">
										<input type="file" class="form-control" required name="image">
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-user btn-block"> Register Account</button>
							</form>
							<br>
							<div class="text-center">
								<a href="<?= base_url(); ?>">Back to Dashboard</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>