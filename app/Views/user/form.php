<?= $this->extend("template/layout"); ?>
<?= $this->section("content"); ?>
<div class="content">
    <?php echo form_open_multipart("user/add"); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h3 class="box-title">User Information</h3>
                                </div>

                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Full Name <font color="red">*</font></label>
                                        <?php
                                        $data = [
                                            'name'      => 'namapenuh',
                                            'id'        => 'namapenuh',
                                            'value'     => '',
                                            'class'     => 'form-control',
                                            'style'     => 'text-transform: uppercase',
                                        ];
                                        echo form_input($data);
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputKategori">Phone No</label>
                                        <?php
                                        $data = [
                                            'name'      => 'notel',
                                            'id'        => 'notel',
                                            'value'     => '',
                                            'class'     => 'form-control',
                                        ];
                                        echo form_input($data);
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputKategori">Email</label>
                                        <?php
                                        $data = [
                                            'name'      => 'email',
                                            'id'        => 'email',
                                            'value'     => '',
                                            'class'     => 'form-control',
                                        ];
                                        echo form_input($data);
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputKategori">Position </label>
                                        <?php
                                        $data = [
                                            'name'      => 'jawatan',
                                            'id'        => 'jawatan',
                                            'value'     => '',
                                            'class'     => 'form-control',
                                        ];
                                        echo form_input($data);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Account Information</h3>
                                </div>

                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="inputKategori">IC Number <font color="red">*</font></label>
                                        <?php
                                        $data = [
                                            'name'      => 'noic',
                                            'id'        => 'noic',
                                            'value'     => '',
                                            'class'     => 'form-control',
                                            'required'  => 'required',
                                        ];
                                        echo form_input($data);
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputKategori">Password <font color="red">*</font></label>
                                        <?php
                                        $data = [
                                            'name'      => 'password',
                                            'id'        => 'password',
                                            'value'     => '',
                                            'class'     => 'form-control',
                                            'required'  => 'required',
                                        ];
                                        echo form_password($data);
                                        ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputKategori">Role</label>
                                        <?php echo form_dropdown('peranan', $roles, '5', 'id="peranan" class="form-control"'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputKategori">Status</label>
                                        <?php echo form_dropdown("status", array('1' => 'Active', '0' => 'Inactive'), '', "class='form-control'")
                                        ?>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-default" onclick="history.go(-1)">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </div>
    </div>
    <?php echo form_close() ?>
</div>
<?= $this->endSection(); ?>