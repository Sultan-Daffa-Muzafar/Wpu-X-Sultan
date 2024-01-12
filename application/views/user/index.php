                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 tes"><?php echo $title ?></h1>

                    <div class="row">
                        <div class="col-lg-8">
                            <?php echo $this->session->flashdata('message') ?>
                        </div>
                    </div>
                    <div class="card mb-3 col-lg-8">
                        <div class=" row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/profile/') . $user['image'];  ?>" class="card-img mt-2 mb-2">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $user['nama'] ?></h5>
                                    <p class="card-text"><?php echo $user['email'] ?></p>
                                    <p class="card-text"><small class="text-muted">Member sejak <?php echo date('d F Y', $user['tanggal_input']) ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->