<div class="justify-content-center">
	<div class="row">
		<div class="col-sm">
			<div class="text-center">
				<div class="card bg-primary text-white">
					<div class="card-body">
						<h3><?= $berita['0']->judul; ?></h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<i class="fa fa-book">Tanggal</i> <?= $berita['0']->created_at; ?>
		</div>
		<div class="col-sm-4"></div>
		<div class="col-sm-4"></div>
	</div>
	<hr>
	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-9">
			<?= $berita['0']->deskripsi; ?>
		</div>
		<div class="col-sm-2">
		</div>
	</div>
	<hr>
</div>
<button type="button" class="btn btn-default" onclick="history.back(-1)">Back</button>
<div id='Back-to-top'>
	<img alt='Scroll to top' src='<?php echo base_url('frontend') ?>/assets/images/backtotop.png' />
</div>