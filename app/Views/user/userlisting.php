<?= $this->extend("template/layout"); ?>

<?= $this->section("stylesheet"); ?>
<link rel="stylesheet" href="<?= base_url('assets/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section("scripts"); ?>
<script src="<?= base_url('assets/v3/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script>
    $(function() {
        $('#tblist').DataTable();

    });
</script>
<?= $this->endSection() ?>

<?= $this->section("content"); ?>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

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
                            <?= session()->getFlashdata('fail') ?>
                        </div>
                    <?php endif; ?>
                    <div class="text-right"><a href="<?php echo base_url() ?>user/add"><span class="btn btn-primary"> <i class="fa fa-plus"></i> Add New</span></a><br><br></div>
                    <table class="table table-striped table-bordered table-hover" id="tblist">
                        <thead>
                            <tr role="row">
                                <th width="3%">No</th>
                                <th>Nama Akaun</th>
                                <th width="25%">No Kad Pengenalan</th>
                                <th width="15%">Peranan</th>
                                <th width="20%">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($exercises) {
                                $no =  1;
                                foreach ($exercises as $row) {
                                    echo "<tr>";
                                    echo "<td>$no</td>";
                                    echo "<td>$row->u_fullname</td>";
                                    echo "<td>$row->u_loginname</td>";
                                    echo "<td>$row->role_desc</td>";
                                    echo "<td>
							<a href='" . base_url() . "user/edit/" . base64_encode($row->u_id) . "'><span class='btn btn-xs btn-warning'>Edit</span></a>
							<a href='" . base_url() . "user/change/" . base64_encode($row->u_id) . "'><span class='btn btn-xs btn-info'>Tukar Kata Laluan</span></a>
							<span class='btn btn-xs btn-danger' onclick=\"deleteThis('" . base64_encode($row->u_id) . "')\">Hapus</span>
							</td>";
                                    echo "</tr>";
                                    $no++;
                                }
                            }
                            ?>


                        </tbody>
                    </table>
                    <p>&nbsp;</p>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>