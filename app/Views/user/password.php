<?= $this->extend("template/layout"); ?>
<?= $this->section("content"); ?>
<?php $session = \Config\Services::session(); ?>
<?php $validation = \Config\Services::validation() ?>
<?= form_open_multipart("profile/password"); ?>
<?= csrf_field() ?>
<div class="row">
    <div class="col-md-12">
        <div class="card box-default">
            <div class="card-header with-border">
                <h3 class="card-title">Change Your Password</h3>
            </div>

            <div class="card-body">
                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php foreach (session('fail') as $error) : ?>
                            <p><?= esc($error) ?></p>
                        <?php endforeach ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>New Password </label>
                            <?php echo form_password("newpassword", "", "class='form-control' required") ?>
                            <?php if ($validation->getError('newpassword')) : ?>
                                <span class="help-block"> <?= $validation->getError('newpassword') ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>New Password (Confirm?)</label>
                            <?php echo form_password("newpassword2", "", "class='form-control' required") ?>
                            <?php if ($validation->getError('newpassword2')) : ?>
                                <span class="help-block"> <?= $validation->getError('newpassword2') ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


            </div>
            <div class="card-footer">
                <?php echo form_hidden("uid", $session->get('userdata')['u_fullname']) ?>
                <button type="submit" class="btn bg-maroon">Change</button>
            </div>


        </div>

    </div>
</div>
<?= form_close() ?>
<?= $this->endSection(); ?>