<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-1 pb-1 ">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Kabar Terkini</span>
				<h2>Seputar Komunitas Rumah Caper</h2>
			</div>
		</div>
		<div class="row d-flex">
			<?php foreach ($berita as $show_berita) { ?>
				<div class="col-md-4 d-flex ftco-animate">
					<div style="width: 100%" class="blog-entry justify-content-end">
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
				<!-- Modal -->
				<div class="modal fade" id="modalBerita<?= $show_berita->id_berita ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle"><?= $show_berita->judul ?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<h6 class="">Tanggal : <?= date('d-m-Y', strtotime($show_berita->created_at)) ?></h6>
								<?= $show_berita->deskripsi ?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="col-md-12 text-center mt-5">
				<a href="<?= base_url('komunitas/viewall') ?>" class="btn btn-primary">Lebih Banyak</a>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
	<div class="container">
		<div class="row d-flex">
			<div class="col-md-6 col-mt-8 d-flex">
				<div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-end" style="background-image:url('<?= base_url('frontend/assets/images/lain/' . $lain->image) ?>');">
					<a href="<?= $lain->url_link ?>" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
						<span class="icon-play"></span>
					</a>
				</div>
			</div>
			<div class="col-md-6 pl-md-5">
				<div class="row justify-content-start pt-3 pb-3">
					<div class="col-md-12 heading-section ftco-animate">
						<span class="subheading">Komunitas masa kini</span>
						<h2 class="mb-4"><?= $lain->heading ?></h2>
						
						<div class="tabulation-2 mt-4">
							
							
								
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- <section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-10 text-center heading-section ftco-animate">
				<span class="subheading">EXPLORE MM </span>
				<h2 class="mb-4">Beragam Aktivitas Seru</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="carousel-case owl-carousel ftco-owl">
					<?php foreach ($aktivitas as $show_aktivitas) : ?>
						<div class="item">
							<div class="case img d-flex align-items-center justify-content-center" style="background-image: url('<?= base_url('build/images/aktivitas/' . $show_aktivitas->image) ?>');">
								<div class="text text-center">
									<h3><a href="#"><?= $show_aktivitas->judul ?></a></h3>
									<span><?= $show_aktivitas->deskripsi ?></span>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section> --><br>
<div id='Back-to-top'>
	<img alt='Scroll to top' src='<?php echo base_url('frontend') ?>/assets/images/backtotop.png' />
</div>