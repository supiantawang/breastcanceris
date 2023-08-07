<?= $this->extend("template/layout"); ?>

<?= $this->section("stylesheet"); ?>
<!-- jika ada style file boleh tambah disini, contoh dibawah -->
<!-- <link rel="stylesheet" href="<?= base_url('assets/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>"> -->
<?= $this->endSection() ?>

<?= $this->section("scripts"); ?>
<!-- jika ada script file boleh tambah disini, contoh dibawah -->
<!-- <script src="<?= base_url('assets/v3/plugins/datatables/jquery.dataTables.min.js') ?>"></script> -->

<!-- <script>
    $(function() {
        $('#tblist').DataTable();
    });
</script> -->
<?= $this->endSection() ?>

<?= $this->section("content"); ?>
your code start here!
<?= $this->endSection(); ?>