    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7 ">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h3 text-gray-900 mb-4 tes">Halaman Login</h1>
                                    </div>

                                    <?php echo $this->session->flashdata('message') ?>
                                    <form class="user" method="post" action="<?php echo base_url('auth'); ?>" autocomplete="off">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="<?php echo set_value('email') ?>">
                                            <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                            <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <button type="submit" class="btn btn-warning btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('auth/lupaPassword')  ?>">Lupa Password?</a>
                                    </div>
                                    <div class="text-center">Belum Punya Akun?
                                        <a class="small" href="<?php echo base_url('Auth/registrasi') ?>">daftar!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>