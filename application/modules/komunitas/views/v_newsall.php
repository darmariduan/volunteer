<section class="ftco-section ftco-no-pt">
	<div class="container">
		<div class="row">
			<div class="row d-flex">
				<?php foreach ($berita as $show_berita) { ?>
					<div class="col-md-4 d-flex ftco-animate">
						<div style="width: 100%" class="justify-content-end">
							<div class="text px-4 py-4">
								<br>
							</div>
							<div style="height:250px;" class="text p-4 float-right d-block">
								<div class="topper d-flex align-items-center">
									<div class="one py-2 pl-3 pr-1 align-self-stretch">
										<span class="day"><?= date('d', strtotime($show_berita->created_at)) ?></span>
									</div>
									<div class="two pl-0 pr-3 py-2 align-self-stretch">
										<span class="yr"><?= date('Y', strtotime($show_berita->created_at)) ?></span>
										<span class="mos"><?= date('F', strtotime($show_berita->created_at)) ?></span>
									</div>
								</div>
								<h3 class="heading mb-0"><?= $show_berita->judul ?></h3>
								<p><?= substr($show_berita->deskripsi, 0, 100) ?></p>
								<p><a data-toggle="modal" data-target="#modalBerita<?= $show_berita->id_berita ?>" style="position: absolute; bottom: 20px" class="btn btn-primary">Read more</a>
									<p><a href="<?= base_url('komunitas/view/' . $show_berita->id_berita); ?>" style="position: absolute; bottom: 20px" class="btn btn-primary">Read more</a></p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<!-- <?php echo $pagination; ?> -->
	</div>
</section>
<div id='Back-to-top'>
	<img alt='Scroll to top' src='<?php echo base_url('frontend') ?>/assets/images/backtotop.png' />
</div>