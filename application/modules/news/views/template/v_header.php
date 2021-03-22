<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $titles; ?></title>
	<link rel="icon" href="<?= base_url('frontend/assets/images/') . $komunitas->logo ?>" type="image/ico">

	<link href="<?php echo base_url('frontend'); ?>/vendor/summernote-master/summernote.css" rel="stylesheet" type="text/css" />

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url('frontend'); ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url('frontend'); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

	<!-- Summernote CSS-->
	<link href="<?php echo base_url('frontend'); ?>/assets/vendor/summernote/summernote-bs4.css" rel="stylesheet">
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">