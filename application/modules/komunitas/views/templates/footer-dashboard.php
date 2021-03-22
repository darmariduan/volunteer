<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
<footer class="ftco-footer ftco-bg-dark ftco-section">
  <div class="container">
    <div class="row mb-9">
      <div class="col-md">
        <div class="ftco-footer-widget mb-8">
          <h1 class="logo"><a href="#">Komunitas <span>Rumah Cerdas Anak Perempuan</span></a></h1>
          <p>Be Young Changes Maker</p>
          <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
          </ul>
        </div>
      </div>

      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Hubungi Kami</h2>
          <div class="block-23 mb-3">
            <ul>
              <li><span class="icon icon-map-marker"></span><span class="text"><?= $komunitas->alamat ?>.</span></li>
              <!-- <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?= $komunitas->telp . '<br>' . $komunitas->fax ?></span></a></li>
              --> <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?= $komunitas->email ?></span></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Layanan Informasi Pendaftaran Volunteer</h2>
          <div class="opening-hours">
            <h4>WhattApps</h4>
            <a href="https://api.whatsapp.com/send?phone=<?= $komunitas->whatsapp_utama ?>&text="><?= $komunitas->whatsapp_utama ?></br>
              <?php if ($komunitas->whatsapp_kedua != '') : ?>
                <a href="https://api.whatsapp.com/send?phone=<?= $komunitas->whatsapp_kedua ?>&text="><span><?= $komunitas->whatsapp_kedua ?></span></a>
              <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>
            document.write(new Date().getFullYear());
          </script> All rights reserved | Nama Siswa <i class="icon-user color-danger" aria-hidden="true"></i><br>
        </p>
      </div>
    </div>
  </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>
<script src="<?= base_url('frontend') ?>/dashboard/js/jquery.min.js"></script>
<script src="<?= base_url('frontend') ?>/dashboard/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?= base_url('frontend') ?>/dashboard/js/popper.min.js"></script>
<script src="<?= base_url('frontend') ?>/dashboard/js/bootstrap.min.js"></script>
<script src="<?= base_url('frontend') ?>/dashboard/js/jquery.easing.1.3.js"></script>
<script src="<?= base_url('frontend') ?>/dashboard/js/jquery.waypoints.min.js"></script>
<script src="<?= base_url('frontend') ?>/dashboard/js/jquery.stellar.min.js"></script>
<script src="<?= base_url('frontend') ?>/dashboard/js/owl.carousel.min.js"></script>
<script src="<?= base_url('frontend') ?>/dashboard/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url('frontend') ?>/dashboard/js/aos.js"></script>
<script src="<?= base_url('frontend') ?>/dashboard/js/jquery.animateNumber.min.js"></script>
<script src="<?= base_url('frontend') ?>/dashboard/js/scrollax.min.js"></script>
<script src="<?= base_url('frontend') ?>/dashboard/js/main.js"></script>

<script>
  $(function() {
    $(window).scroll(function() {
      if ($(this).scrollTop() > 400) {
        $('#Back-to-top').fadeIn();
      } else {
        $('#Back-to-top').fadeOut();
      }
    });
    $('#Back-to-top').click(function() {
      $('body,html')
        .animate({
          scrollTop: 0
        }, 300)
        .animate({
          scrollTop: 40
        }, 200)
        .animate({
          scrollTop: 0
        }, 130)
        .animate({
          scrollTop: 15
        }, 100)
        .animate({
          scrollTop: 0
        }, 70);
    });
  });
</script>
</body>

</html>