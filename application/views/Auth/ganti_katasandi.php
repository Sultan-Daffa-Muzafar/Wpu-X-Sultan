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
                                    <h1 class="h4 text-gray-900">Ubah kata sandi Anda untuk</h1>
                                    <h6 class="mb-4"> <?php echo $this->session->userdata('reset_email'); ?></h6>
                                </div>

                                <?php echo $this->session->flashdata('message') ?>
                                <form class="user" method="post" action="<?php echo base_url('auth/gantiKataSandi'); ?>" autocomplete="off">
                                    <div class="form-group">
                                        <input type="Password" class="form-control form-control-user" id="password1" name="password1" aria-describedby="emailHelp" placeholder="Masukan kata sandi baru...">
                                        <?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="Password" class="form-control form-control-user" id="password2" name="password2" aria-describedby="emailHelp" placeholder="Ulangi kata sandi...">
                                        <?php echo form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                    <button type="submit" class="btn btn-warning btn-user btn-block">
                                        Mengatur ulang kata sandi
                                    </button>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>