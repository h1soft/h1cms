<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>H1CMS - Administrator Panel</title>
        <link type="text/css" href="<?php echo base_url('/themes/default/admin/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('/themes/default/admin/bootstrap/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('/themes/default/admin/css/theme.css'); ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('/themes/default/admin/images/icons/css/font-awesome.css'); ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('/assets/dialog/ui-dialog.css'); ?>" rel="stylesheet">
        <script src="<?php echo base_url('/assets/jquery/jquery-1.9.1.min.js'); ?>" type="text/javascript"></script>
        <?php foreach ($cssfiles as $css) { ?>
            <link type="text/css" href="<?php echo base_url($css); ?>" rel="stylesheet">
        <?php } ?>
        <?php if (isset($jsvars)) { ?>
            <script>
    <?php foreach ($jsvars as $varname => $varvalue) { ?>
                    var <?php echo $varname; ?> =<?php echo is_string($varvalue) ? "'$varvalue'" : $varvalue; ?>;
    <?php } ?>
            </script>
        <?php } ?>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="<?php echo url_for('system/user'); ?>">H1CMS </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav nav-icons">
                            <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                            <li><a href="#"><i class="icon-eye-open"></i></a></li>
                            <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                        </ul>
                        <form class="navbar-search pull-left input-append" action="#">
                            <input type="text" class="span3">
                            <button class="btn" type="button">
                                <i class="icon-search"></i>
                            </button>
                        </form>
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Item No. 1</a></li>
                                    <li><a href="#">Don't Click</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Example Header</li>
                                    <li><a href="#">A Separated link</a></li>
                                </ul>
                            </li>
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url('/themes/default/admin/images/user.png'); ?>" class="nav-avatar" />
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo url_for('system/user/profile') ?>">个人信息</a></li>
                                    <li><a href="<?php echo url_for('system/user/change') ?>">修改个人信息</a></li>
                                    <li><a href="<?php echo url_for('system/user/setting') ?>">账户设置</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo url_for('system/user/logout'); ?>">退出</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->