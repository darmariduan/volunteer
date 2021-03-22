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
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Messages To Admin</h6>
                            </div>
                            <div id="alert-message">
                                <div class="center"><strong><?= $this->session->flashdata('message'); ?></strong></div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="x_title">
                                    <h2><i class="fa fa-comments"></i>&nbsp; Chat </h2>
                                </div>
                                <hr>
                                <form action="<?= site_url('dashboard/sendmessage') ?>" method="POST" class="form-horizontal form-label-left input_mask">
                                    <p>Chat.</p>
                                    <div class="col-sm">
                                        <select class="form-control " name="to_usersadmin" id="to_usersadmin" required>
                                            <option value="1">No Selected</option>
                                            <?php foreach ($usersl as $row) : ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nama_admin']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col-sm">
                                        <label for="Messages">Content</label>
                                        <!-- <textarea style="height: 200px" id="message" required="required" class="form-control" name="textDefault" data-parsley-trigger="keyup" data-parsley-minlength="10" data-parsley-maxlength="500" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="20"></textarea> -->
                                        <textarea name="contents" id="summernote" style="height: 200px"></textarea>
                                    </div>
                                    <br>
                                    <div class="ln_solid"></div>
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

                <!-- Content Row Two-->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">History Messages</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-bordered table-striped table-hover" style="width:100%">
                                        <thead>
                                            <tr class="info">
                                                <th>No</th>
                                                <th>Content</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $i = 1;
                                                foreach ($message as $data) {
                                                    $id         = $data->id;
                                                    $content    = $data->content;
                                                    $from_users = $data->from_users;
                                                    $to_admin   = $data->to_admin;
                                                    $date       = $data->date; ?>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?= $content; ?></td>
                                                    <td><?= $from_users; ?></td>
                                                    <td><?= $to_admin; ?></td>
                                                    <td><?= selisihWaktu('now', $date) . ' yang lalu<br>' ?>
                                            </tr>
                                        <?php
                                                    $i++;
                                                };
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
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