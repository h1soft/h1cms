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
                                用户组管理</h3>
                        </div>
                        <div class="module-option clearfix">
                            <form>
                                <div class="input-append pull-left">
                                    <input type="text" class="span3" name="group_name" placeholder="查询...">
                                    <button type="submit" class="btn">
                                        <i class="icon-search"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="btn-group pull-right" data-toggle="buttons-radio">
                                <a class="btn btn-success" href="<?php echo url_for('system/group/create'); ?>">添加用户组</a>
                            </div>
                        </div>
                        <div class="module-body">
                            <?php echo $this->layout('admin/showmessage'); ?>
                            <table class="table table-striped table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>名称</th>
                                        <th>描述</th>
                                        <th>添加时间</th>
                                        <th width="20%">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($groups as $group) { ?>
                                        <tr>
                                            <td><?php echo $group->group_id; ?></td>
                                            <td><?php echo $group->group_name; ?></td>
                                            <td><?php echo $group->description; ?></td>
                                            <td><?php echo date('Y-m-d', $group->created_at); ?></td>
                                            <td><a class="btn btn-mini btn-success" href="<?php echo url_for('system/group/edit', $group->group_id); ?>">编辑</a>
                                                <a class="btn btn-mini btn-danger" onclick="RESTDelete('<?php echo url_for('system/group', $group->group_id) ?>',{token:token}, '确定要删除此用户组【<?php echo addslashes($group->group_name); ?>】 吗?');">删除</a></td>
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