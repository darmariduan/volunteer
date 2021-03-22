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
                <!-- Content Row One -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div id="alert-message">
                                <div class="center"><strong><?= $this->session->flashdata('message'); ?></strong></div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="x_title">
                                    <h2><i class="fa fa-user"></i>&nbsp; Edit Profile </h2>
                                </div>
                                <hr>
                                <form action="<?= site_url('dashboard/profedit'); ?>" method="POST" class="form-horizontal form-label-left input_mask">
                                    <div class="col-sm">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control form-control-user" id="username" name="username" value="<?= $usersl[0]['username']; ?>" disabled>
                                    </div>
                                    <br>
                                    <div class="col-sm row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" id="repassword" name="repassword" placeholder="Repeat Password">
                                            <?= form_error('repassword', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-sm">
                                        <label for="nama_admin">Nama Admin</label>
                                        <input type="text" class="form-control form-control-user" id="nama_admin" name="nama_admin" value="<?= $usersl[0]['nama_admin']; ?>">
                                        <?= form_error('nama_admin', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <br>
                                    <div class="col-sm">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?= $usersl[0]['alamat']; ?>">
                                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <br>
                                    <div class="col-sm">
                                        <label for="agama">Agama</label>
                                        <select class="form-control" name="agama" id="agama">
                                            <option value="">No Selected</option>
                                            <?php foreach ($agama as $row) : ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['keterangan']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('category', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <br>
                                    <div class="col-sm">
                                        <label for="organisasi">Organisasi</label>
                                        <input type="text" class="form-control form-control-user" id="organisasi" name="organisasi" value="<?= $usersl[0]['organisasi']; ?>">
                                        <?= form_error('organisasi', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <br>
                                    <div class="col-sm">
                                        <label for="no_hp">Nomor HP</label>
                                        <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp" value="<?= $usersl[0]['nohp']; ?>">
                                        <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <br>
                                    <div class="col-sm">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control form-control-user" id="email" name="email" value="<?= $usersl[0]['email']; ?>">
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <br>
                                    <div class="col-sm">
                                        <label for="program">Program</label>
                                        <select class="form-control " name="program" id="program">
                                            <option value="">No Selected</option>
                                            <?php foreach ($program as $row) : ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['keterangan']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                            <?= form_error('program', '<small class="text-danger">', '</small>'); ?>
                                        </select>
                                    </div>

                                    <!-- <div class="col-sm">
                                        <label for="foto">Foto</label>
                                        <input type="image" class="form-control form-control-user" id="foto" name="foto" value="<?= $usersl[0]['foto']; ?>">
                                        <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                                        <br>
                                        <input type="file" class="form-control" required name="foto">
                                    </div> -->
                                   <!-- <div class="col-sm"> -->
                                    <!-- <label for="foto" class="control-label">Image</label> -->
                                    <!-- <div class="col-md-9 col-sm-9"> -->
                                        <!-- <input type="file" class="form-control" required name="foto"> -->
                                    <!-- </div> -->

                                

                                    <br>
                                    <div class="ln_solid">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <button class="btn btn-primary" type="reset"> Reset</button>
                                            <button type="submit" class="btn btn-success"> Sent</button>
                                        </div>
                                    </div>
                                </form>
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