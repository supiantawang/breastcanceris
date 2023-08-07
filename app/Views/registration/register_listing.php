<?= $this->extend("template/layout"); ?>


<?= $this->section("content"); ?>
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="<?php echo base_url() ?>index.php/community">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <div class="form-group">
                                <label>IC Number</label>
                                <div>
                                    <?php echo form_input("icno", "", "class='form-control' id='icno'") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <div>
                                    <?php echo form_input("nama", "", "class='form-control' id='nama'") ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <button type="reset" class="btn btn-secondary btn-reset" id="reset"><i class="fa fa-rotate-left"></i> Reset</button>
                        <button type="button" class="btn btn-primary  btn-search" id="search" data-list="penalty"><i class="fa fa-search"></i> Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body" id="div-content">
                <p>&nbsp;</p>
                <div class="row">
                    <div class="col-lg-2 col-xs-6 offset-md-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>Add New </h3>
                                <h5>Registration</h5>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-plus"></i>
                            </div>
                            <a href="<?php echo base_url() ?>registration/add" class="small-box-footer">Go To Add <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-6">
                        <div class="small-box bg-pink">
                            <div class="inner">
                                <h3>Report </h3>
                                <h5>Registration</h5>
                            </div>
                            <div class="icon">
                                <i class="fa fa-chart-pie"></i>
                            </div>
                            <a href="<?php echo base_url() ?>report/registration" class="small-box-footer">View Report <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="div-result"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>