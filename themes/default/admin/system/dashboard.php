<?php echo $this->layout('admin/layouts/header'); ?>
<div class="wrapper">
    <div class="container">

        <div class="row">
            <?php echo $this->layout('admin/layouts/menu'); ?>

            <div class="span9">
                <div class="content">
                    <?php
                    foreach ($this->session->getFlash('success') as $msg) {
                        ?>
                        <div class="row">
                            <div class="span9 ">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <span class="icon-info-sign"></span> <?php echo $msg; ?><br>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="btn-controls">
                        <div class="btn-box-row row-fluid">
                            <a href="#" class="btn-box big span4"><i class=" icon-random"></i><b>65%</b>
                                <p class="text-muted">
                                    Growth</p>
                            </a><a href="#" class="btn-box big span4"><i class="icon-user"></i><b>15</b>
                                <p class="text-muted">
                                    New Users</p>
                            </a><a href="#" class="btn-box big span4"><i class="icon-money"></i><b>15,152</b>
                                <p class="text-muted">
                                    Profit</p>
                            </a>
                        </div>
                        <div class="btn-box-row row-fluid">
                            <div class="span8">
                                <div class="row-fluid">
                                    <div class="span12">
                                        <a href="#" class="btn-box small span4"><i class="icon-envelope"></i><b>Messages</b>
                                        </a><a href="#" class="btn-box small span4"><i class="icon-group"></i><b>Clients</b>
                                        </a><a href="#" class="btn-box small span4"><i class="icon-exchange"></i><b>Expenses</b>
                                        </a>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span12">
                                        <a href="<?php echo url_for('system/group') ; ?>" class="btn-box small span4"><i class="icon-group"></i><b>用户组</b>
                                        </a><a href="<?php echo url_for('system/user') ; ?>" class="btn-box small span4"><i class="icon-user"></i><b>用户管理</b>
                                        </a><a href="<?php echo url_for('system/setting') ; ?>" class="btn-box small span4"><i class="icon-cog"></i><b>系统设置</b> </a>
                                    </div>
                                </div>
                            </div>
                            <ul class="widget widget-usage unstyled span4">
                                <li>
                                    <p>
                                        <strong>Windows 8</strong> <span class="pull-right small muted">78%</span>
                                    </p>
                                    <div class="progress tight">
                                        <div class="bar" style="width: 78%;">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <p>
                                        <strong>Mac</strong> <span class="pull-right small muted">56%</span>
                                    </p>
                                    <div class="progress tight">
                                        <div class="bar bar-success" style="width: 56%;">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <p>
                                        <strong>Linux</strong> <span class="pull-right small muted">44%</span>
                                    </p>
                                    <div class="progress tight">
                                        <div class="bar bar-warning" style="width: 44%;">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <p>
                                        <strong>iPhone</strong> <span class="pull-right small muted">67%</span>
                                    </p>
                                    <div class="progress tight">
                                        <div class="bar bar-danger" style="width: 67%;">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--/#btn-controls-->

                </div>
                <!--/.content-->
            </div>
            <!--/.span9-->
        </div>
    </div>
    <!--/.container-->
</div>
<!--/.wrapper-->
<?php echo $this->layout('admin/layouts/footer'); ?>
