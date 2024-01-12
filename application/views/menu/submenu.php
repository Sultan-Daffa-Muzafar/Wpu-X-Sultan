                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 tes"><?php echo $title ?></h1>


                    <div class="row">
                        <div class="col-lg">
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo validation_errors(); ?>
                                </div>
                            <?php endif; ?>

                            <?php echo $this->session->flashdata('message'); ?>
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Submenu</a>

                            <table class=" table table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Url</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($subMenu as $sm) : ?>
                                        <tr>
                                            <th scope="row"><?php echo $i; ?></th>
                                            <td><?php echo $sm['title'] ?></td>
                                            <td><?php echo $sm['menu'] ?></td>
                                            <td><?php echo $sm['url'] ?></td>
                                            <td><?php echo $sm['icon'] ?></td>
                                            <td><?php echo $sm['is_active'] ?></td>
                                            <td><a href="" class="badge badge-success">Edit</a>
                                                <a href="" class="badge badge-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Modal -->

                <!-- Modal -->
                <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newMenuModalLabel">Tambahkan Submenu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="<?php echo base_url('menu/submenu'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Title">
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" id="menu_id" name="menu_id" placeholder="Submenu Title">
                                            <option value="" disabled selected>Pilih Menu</option>
                                            <?php foreach ($menu as $m) : ?>
                                                <option value="<?php echo $m['id'] ?>"><?php echo $m['menu'] ?></option>
                                            <?php endforeach ?>
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu URL">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon">
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                                        <label for="is_active" class="form-check-label">
                                            Apakah Aktif?
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>