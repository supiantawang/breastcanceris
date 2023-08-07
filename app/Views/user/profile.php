<?= $this->extend("template/layout"); ?>
<?= $this->section("content"); ?>
<?php $validation = \Config\Services::validation() ?>
<?= form_open_multipart("profile"); ?>
<?= csrf_field() ?>
<div class="row">
    <div class="col-md-12">
        <div class="card box-default">
            <div class="card-header with-border">
                <h3 class="card-title">Personal Information</h3>
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
                <div class="form-group">
                    <label>Full Name <font color="red">*</font></label>
                    <?php echo form_input("namapenuh", $user->u_fullname, "class='form-control'") ?>
                </div>
                <div class="form-group">
                    <label>Phone No</label>
                    <?php echo form_input("notel", $user->u_contact, "class='form-control'") ?>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <?php echo form_input("email", $user->u_email, "class='form-control'") ?>
                </div>
                <div class="form-group">
                    <label>Position </label>
                    <?php echo form_input("jawatan", $user->u_position, "class='form-control'") ?>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn bg-maroon">Update</button>
            </div>


        </div>

    </div>
</div>
<?= form_close() ?>
<?= $this->endSection(); ?>