<?php echo $this->layout('admin/layouts/header'); ?>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <?php echo $this->layout('admin/layouts/menu'); ?>
            <div class="span9">
                <div class="content">
                    <div class="module">
                        <div class="module-head">
                            <h3>
                                用户管理</h3>
                        </div>
                        <div class="module-option clearfix">
                            <form>
                                <div class="input-append pull-left">
                                    <input type="text" class="span3" name="email" placeholder="查询...">
                                    <button type="submit" class="btn">
                                        <i class="icon-search"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="btn-group pull-right" data-toggle="buttons-radio">
                                <a class="btn btn-success" href="<?php echo url_for('system/user/create') ?>">添加用户</a>
                            </div>
                        </div>
                        <div class="module-body">
                            <?php echo $this->layout('admin/showmessage'); ?>
                            <table class="table table-striped table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>用户组</th>
                                        <th>姓名</th>
                                        <th>注册时间</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) { ?>
                                        <tr>
                                            <td><?php echo $user->id; ?></td>
                                            <td><?php echo $user->email; ?></td>
                                            <td><?php echo $user->group_name; ?></td>
                                            <td><?php echo $user->fullname; ?></td>
                                            <td><?php echo $user->created_at; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <br />
                            <div class="pagination pagination-centered">
                                <?php echo $pagination; ?>
                            </div>
                        </div>
                    </div>
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