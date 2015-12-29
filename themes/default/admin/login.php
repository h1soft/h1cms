﻿<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>H1CMS</title>
        <link type="text/css" href="<?php echo base_url('/themes/default/admin/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('/themes/default/admin/bootstrap/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('/themes/default/admin/css/theme.css'); ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('/themes/default/admin/images/icons/css/font-awesome.css'); ?>" rel="stylesheet">
    </head>
    <body>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i>
                    </a>

                    <a class="brand" href="index.html">
                        H1CMS
                    </a>

                </div>
            </div><!-- /navbar-inner -->
        </div><!-- /navbar -->

        <?php
        $error = $this->session->getFlash('error');
        ?>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="module module-login span4 offset4">
                        <form class="form-vertical" action="<?php echo url_for('login'); ?>" method="POST">
                            <div class="module-head">
                                <h3>H1CMS系统登录</h3>
                            </div>
                            <div class="module-body">
                                <div class="control-group <?php echo empty($error) ? false : 'error'; ?>">
                                    <div class="controls row-fluid">
                                        <input class="span12" type="text" id="email" name="email" placeholder="请输入Email"  autofocus required>
                                    </div>
                                </div>
                                <div class="control-group  <?php echo empty($error) ? false : 'error'; ?>">
                                    <div class="controls row-fluid">
                                        <input class="span12" type="password" id="password" name="password" placeholder="请输入密码" required>
                                        <?php if (!empty($error)) { ?>
                                            <br/>
                                            <span class="help-inline">用户名或密码错误</span>
                                        <?php } ?>

                                    </div>
                                </div>

                            </div>
                            <div class="module-foot">
                                <div class="control-group">
                                    <div class="controls clearfix">
                                        <button type="submit" class="btn btn-primary pull-right">登录</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2014 H1CMS - H1CMS.COM </b> All rights reserved.
            </div>
        </div>
        <script src="<?php echo base_url('/themes/default/admin/scripts/jquery-1.9.1.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/themes/default/admin/scripts/jquery-ui-1.10.1.custom.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('/themes/default/admin/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
    </body>
</html>