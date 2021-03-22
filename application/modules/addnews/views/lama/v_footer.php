<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			Copyright &copy;<script>
				document.write(new Date().getFullYear());
			</script> All rights reserved | Nama Siswa <i class="icon-user color-danger" aria-hidden="true"></i><br>Made by Colorlib
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="login.html">Logout</a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$("#alert-message").alert().delay(3000).slideUp('slow');
	$('.change-image').on('click', function() {
		var id = $(this).data('id');
		var judul = $(this).data('judul');
		var image = $(this).data('image');
		$('#imageJudul').val(judul);
		$('input[name="idImage"]').val(id);
		$('input[name="oldImage"]').val(image);
		$('#editImage').modal('show');
	});
</script>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('frontend'); ?>/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('frontend'); ?>/assets/js/jquery-3.4.0.min.js"></script>
<script src="<?= base_url('frontend'); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?= base_url('frontend'); ?>/assets/vendor/summernote/summernote-bs4.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('frontend'); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('frontend'); ?>/assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('frontend'); ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('frontend'); ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('frontend'); ?>/assets/js/demo/datatables-demo.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#summernote').summernote({
			height: "300px",
			callbacks: {
				onImageUpload: function(image) {
					uploadImage(image[0]);
				},
				onMediaDelete: function(target) {
					deleteImage(target[0].src);
				}
			}
		});

		function uploadImage(image) {
			var data = new FormData();
			data.append("image", image);
			$.ajax({
				url: "<?= base_url('dashboard/upload_image') ?>",
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				type: "POST",
				success: function(url) {
					$('#summernote').summernote("insertImage", url);
				},
				error: function(data) {
					console.log(data);
				}
			});
		}

		function deleteImage(src) {
			$.ajax({
				data: {
					src: src
				},
				type: "POST",
				url: "<?php echo site_url('post/delete_image') ?>",
				cache: false,
				success: function(response) {
					console.log(response);
				}
			});
		}
	});
</script>
</body>

</html>