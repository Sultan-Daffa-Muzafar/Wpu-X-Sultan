                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 tes"><?php echo $title ?></h1>

                    <div class="row">
                        <div class="col-lg-6">

                            <form action="<?php echo base_url('user/gantiKataSandi') ?>" method="post">
                                <?php echo $this->session->flashdata('message') ?>
                                <div class="form-group">
                                    <label for="sandi_sekarang">kata sandi saat ini</label>
                                    <input type="password" class=" form-control" id="sandi_sekarang" name="sandi_sekarang">
                                    <?php echo form_error('sandi_sekarang', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="sandi_baru1">Kata Sandi Baru</label>
                                    <input type="password" class=" form-control" id="sandi_baru1" name="sandi_baru1">
                                    <?php echo form_error('sandi_baru1', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="sandi_baru2">Ulangi Kata Sandi</label>
                                    <input type="password" class=" form-control" id="sandi_baru2" name="sandi_baru2">
                                    <?php echo form_error('sandi_baru2', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">ganti kata sandi</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->