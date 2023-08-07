<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Breast Cancer Information System</title>
    <link href="<?php echo base_url(); ?>assets/images/pink-ribbon.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/backend/images/favicons.ico">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/iCheck/square/blue.css">

</head>
<?php $validation = \Config\Services::validation() ?>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="<?php echo base_url(); ?>assets/images/pink-ribbon.png" width="50%" />
            <h3>Breast Cancer Information System </h3>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
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
            <form action="<?= base_url() ?>login" method="post">
                <?= csrf_field() ?>
                <div class="form-group has-feedback <?php if ($validation->getError('l_uname')) : ?>has-error<?php endif; ?>">
                    <input type="text" class="form-control" placeholder="Username" name="l_uname" value="<?= set_value('l_uname') ?>">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <?php if ($validation->getError('l_uname')) : ?>
                        <span class="help-block"> <?= $validation->getError('l_uname') ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group has-feedback <?php if ($validation->getError('l_upass')) : ?>has-error<?php endif; ?>">
                    <input type="password" class="form-control" placeholder="Password" name="l_upass" value="<?= set_value('l_upass') ?>">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?php if ($validation->getError('l_upass')) : ?>
                        <span class="help-block"><?= $validation->getError('l_upass') ?></span>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label for="remember">
                                <input type="checkbox" name="remember" value="1"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-danger btn-block btn-flat bg-pink">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url(); ?>assets/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url(); ?>assets/backend/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/backend/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html>