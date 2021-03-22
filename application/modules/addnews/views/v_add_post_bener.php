<!DOCTYPE html>
<html>

<head>
    <!-- Title -->
    <title>Add New Post</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="M Fikri Setiadi" />
    <link rel="shortcut icon" href="<?php echo base_url() . 'frontend/images/favicon.png' ?>">
    <!-- Styles -->
    <link href="<?php echo base_url() . 'frontend/plugins/pace-master/themes/blue/pace-theme-flash.css' ?>" rel="stylesheet" />
    <link href="<?php echo base_url() . 'frontend/plugins/uniform/css/uniform.default.min.css' ?>" rel="stylesheet" />
    <link href="<?php echo base_url() . 'frontend/plugins/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'frontend/plugins/fontawesome/css/font-awesome.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'frontend/plugins/line-icons/simple-line-icons.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'frontend/plugins/offcanvasmenueffects/css/menu_cornerbox.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'frontend/plugins/waves/waves.min.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'frontend/plugins/switchery/switchery.min.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'frontend/plugins/3d-bold-navigation/css/style.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'frontend/plugins/slidepushmenus/css/component.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'frontend/plugins/datatables/css/jquery.datatables.min.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'frontend/plugins/datatables/css/jquery.datatables_themeroller.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'frontend/plugins/summernote-master/summernote.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'frontend/plugins/css/dropify.min.css' ?>" rel="stylesheet" type="text/css">

    <!-- Theme Styles -->
    <link href="<?php echo base_url() . 'frontend/plugins/css/modern.min.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'frontend/plugins/css/themes/green.css' ?>" class="theme-color" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'frontend/plugins/css/custom.css' ?>" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url() . 'frontend/plugins/3d-bold-navigation/js/modernizr.js' ?>"></script>
    <script src="<?php echo base_url() . 'frontend/plugins/offcanvasmenueffects/js/snap.svg-min.js' ?>"></script>
</head>

<body class="page-header-fixed  compact-menu  pace-done page-sidebar-fixed">
    <div class="overlay"></div>
    <main class="page-content content-wrap">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="sidebar-pusher">
                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="logo-box">
                    <a href="<?php echo site_url('backend/dashboard'); ?>" class="logo-text"><span>MBLOG</span></a>
                </div><!-- Logo Box -->
                <div class="search-button">
                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                </div>
                <div class="topmenu-outer">
                    <div class="top-menu">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge badge-success pull-right"></span></a>
                                <ul class="dropdown-menu title-caret dropdown-lg" role="menu">

                                    <li>
                                        <p class="drop-title">Anda memiliki pesan baru !</p>
                                    </li>
                                    <li class="dropdown-menu-list slimscroll messages">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="<?php echo site_url('backend/inbox'); ?>">
                                                    <div class="msg-img">
                                                        <div class="online on"></div><img class="img-circle" src="<?php echo base_url() . 'frontend/plugins/images/user_blank.png'; ?>" alt="">
                                                    </div>
                                                    <p class="msg-name"></p>
                                                    <p class="msg-text"></p>
                                                    <p class="msg-time"></p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="drop-all"><a href="<?php echo site_url('backend/inbox'); ?>" class="text-center">All Messages</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-comment"></i><span class="badge badge-success pull-right"></span></a>
                                <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                                    <li>
                                        <p class="drop-title">Anda memiliki komentar baru !</p>
                                    </li>
                                    <li class="dropdown-menu-list slimscroll messages">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="<?php echo site_url('backend/comment/unpublish'); ?>">
                                                    <div class="msg-img">
                                                        <div class="online on"></div><img class="img-circle" src="<?php echo base_url() . 'frontend/plugins/images/user_blank.png'; ?>" alt="">
                                                    </div>
                                                    <p class="msg-name"></p>
                                                    <p class="msg-text"></p>
                                                    <p class="msg-time"></p>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="drop-all"><a href="<?php echo site_url('backend/comment/unpublish'); ?>" class="text-center">All Comments</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                </a>
                                <ul class="dropdown-menu dropdown-list" role="menu">
                                    <li role="presentation"><a href="<?php echo site_url('backend/change_pass'); ?>"><i class="fa fa-key"></i>Change Password</a></li>
                                    <li role="presentation"><a href="<?php echo site_url('backend/comment/unpublish'); ?>"><i class="fa fa-comment"></i>Comments<span class="badge badge-success pull-right"></span></a></li>
                                    <li role="presentation"><a href="<?php echo site_url('backend/inbox'); ?>"><i class="fa fa-envelope"></i>Inbox<span class="badge badge-success pull-right"></span></a></li>
                                    <li role="presentation" class="divider"></li>
                                    <li role="presentation"><a href="<?php echo site_url('logout'); ?>"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo site_url('logout'); ?>" class="log-out waves-effect waves-button waves-classic">
                                    <span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>
                                </a>
                            </li>
                        </ul><!-- Nav -->
                    </div><!-- Top Menu -->
                </div>
            </div>
        </div><!-- Navbar -->
        <div class="page-sidebar sidebar">
            <div class="page-sidebar-inner slimscroll">
                <div class="sidebar-header">
                    <div class="sidebar-profile">
                        <a href="javascript:void(0);">
                            <div class="sidebar-profile-image">
                            </div>
                            <div class="sidebar-profile-details">
                                <span>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
                <ul class="menu accordion-menu">
                    <li><a href="<?php echo site_url('backend/dashboard'); ?>" class="waves-effect waves-button"><span class="menu-icon icon-home"></span>
                            <p>Dashboard</p>
                        </a></li>
                    <li class="droplink active open"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-pin"></span>
                            <p>Post</p><span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="active"><a href="<?php echo site_url('backend/post/add_new'); ?>">Add New</a></li>
                            <li><a href="<?php echo site_url('backend/post'); ?>">Post List</a></li>
                            <li><a href="<?php echo site_url('backend/category'); ?>">Category</a></li>
                            <li><a href="<?php echo site_url('backend/tag'); ?>">Tag</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo site_url('backend/inbox'); ?>" class="waves-effect waves-button"><span class="menu-icon icon-envelope"></span>
                            <p>Inbox</p>
                        </a></li>
                    <li><a href="<?php echo site_url('backend/comment'); ?>" class="waves-effect waves-button"><span class="menu-icon icon-bubbles"></span>
                            <p>Comments</p>
                        </a></li>
                    <li><a href="<?php echo site_url('backend/subscriber'); ?>" class="waves-effect waves-button"><span class="menu-icon icon-users"></span>
                            <p>Subscribers</p>
                        </a></li>
                    <?php if ($this->session->userdata('access') == '1') : ?>
                        <li><a href="<?php echo site_url('backend/users'); ?>" class="waves-effect waves-button"><span class="menu-icon icon-user"></span>
                                <p>Users</p>
                            </a></li>
                        <li><a href="<?php echo site_url('backend/settings'); ?>" class="waves-effect waves-button"><span class="menu-icon icon-settings"></span>
                                <p>Settings</p>
                            </a></li>
                    <?php else : ?>
                    <?php endif; ?>
                    <li><a href="<?php echo site_url('logout'); ?>" class="waves-effect waves-button"><span class="menu-icon icon-logout"></span>
                            <p>Log Out</p>
                        </a></li>
                </ul>
            </div><!-- Page Sidebar Inner -->
        </div><!-- Page Sidebar -->
        <div class="page-inner">
            <div class="page-title">
                <h3>Add New Post</h3>
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('backend/dashboard'); ?>">Dashboard</a></li>
                        <li><a href="#">Post</a></li>
                        <li class="active">Add New</li>
                    </ol>
                </div>
            </div>
            <div id="main-wrapper">
                <div class="row">
                    <form action="<?php echo base_url() . 'addnews/publish' ?>" method="post" enctype="multipart/form-data">
                        <div class="col-md-8">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Contents</label>
                                        <textarea name="contents" id="summernote"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg" style="width:100%"><span class="icon-cursor"></span> PUBLISH</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- Row -->
            </div><!-- Main Wrapper -->
            <div class="page-footer">
                <p class="no-s"><?php echo date('Y'); ?> &copy; Powered by M Fikri Setiadi.</p>
            </div>
        </div><!-- Page Inner -->
    </main><!-- Page Content -->

    <!-- Javascripts -->
    <script src="<?php echo base_url() . 'frontend/plugins/jquery/jquery-2.1.4.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'frontend/plugins/bootstrap/js/bootstrap.min.js' ?>"></script>


    <script src="<?php echo base_url() . 'frontend/plugins/summernote-master/summernote.min.js' ?>"></script>
    <script>
        $(document).ready(function() {

            $('#summernote').summernote({
                height: 590,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'hr']],
                    ['view', ["fullscreen", "codeview", "help"]],
                ],

                onImageUpload: function(files, editor, welEditable) {
                    sendFile(files[0], editor, welEditable);
                }

            });

            function sendFile(file, editor, welEditable) {
                data = new FormData();
                data.append("file", file);
                $.ajax({
                    data: data,
                    type: "POST",
                    url: "<?php echo site_url() ?>addnews/upload_image",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(url) {
                        editor.insertImage(welEditable, url);
                    }
                });
            }



            $('.dropify').dropify({
                messages: {
                    default: 'Drag atau drop untuk memilih gambar',
                    replace: 'Ganti',
                    remove: 'Hapus',
                    error: 'error'
                }
            });

        });
    </script>

</body>

</html>