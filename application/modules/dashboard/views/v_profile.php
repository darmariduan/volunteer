<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('username'); ?></span>
                        <img class="img-profile rounded-circle" src="<?= base_url(''); ?>frontend/assets/images/users/<?= $usersl[0]['foto']; ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('dashboard/profuser/' . $this->session->userdata('id')); ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?= $breadcumb; ?></h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <!-- Area Chart -->
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <div class="dropdown no-arrow">
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="x_content">
                                <div id="alert-message">
                                    <div class="center"><strong><?= $this->session->flashdata('message'); ?></strong></div>
                                </div>
                                <?= form_open_multipart('dashboard/update'); ?>
                                <div class='col-sm-12'>
                                    <div class="row">
                                        <input class="form-control col-sm-8" value="<?= $getProfile['0']->id; ?>" name="id" type="hidden">
                                        <div class="col-sm-6">
                                            <div class="item form-group">
                                                <label class="control-label" for="namkom">Nama Komunitas</label>
                                                <div>
                                                    <input class="form-control col-sm-8" value="<?= $getProfile['0']->nama_komunitas; ?>" name="namkom" type="text">
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label" for="deskripsi">Deskripsi
                                                </label>
                                                <div>
                                                    <textarea class="form-control" name="deskripsi" cols="60" rows="6"><?= $getProfile['0']->deskripsi; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label" for="alamat">Alamat
                                                </label>
                                                <div>
                                                    <textarea class="form-control" name="alamat" cols="60"><?= $getProfile['0']->alamat; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label" for="email">Email</label>
                                                <div>
                                                    <input class="form-control col-sm-6" value="<?= $getProfile['0']->email; ?>" name="email" type="text">
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label" for="visi">Visi
                                                </label>
                                                <div>
                                                    <textarea class="form-control" name="visi" cols="60" rows="6"><?= $getProfile['0']->visi; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label" for="misi">Misi
                                                </label>
                                                <div>
                                                    <textarea class="form-control" name="misi" cols="60" rows="6"><?= $getProfile['0']->misi; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="item form-group">
                                                <label class="control-label" for="wasone">Nomor Whatsapp Utama</label>
                                                <div>
                                                    <input class="form-control col-sm-8" value="<?= $getProfile['0']->whatsapp_utama; ?>" name="wasone" type="text">
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label" for="wastwo">Nomor Whatsapp Sara</label>
                                                <div>
                                                    <input class="form-control col-sm-8" value="<?= $getProfile['0']->whatsapp_kedua; ?>" name="wastwo" type="text">
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label" for="motto">Motto
                                                </label>
                                                <div>
                                                    <textarea class="form-control" name="motto" cols="60" rows="6"><?= $getProfile['0']->motto; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="reset" class="btn btn-primary">Reset</button>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

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
                    <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>