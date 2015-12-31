<?php echo $this->layout('admin/layouts/header'); ?>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <?php echo $this->layout('admin/layouts/menu'); ?>
            <div class="span9">
                <div class="content">
                    <div class="module">
                        <div class="module-head">
                            <h3>修改用户组</h3>
                        </div>
                        <div class="module-body">
                            <?php echo $this->layout('admin/showmessage'); ?>
                            <br />

                            <form class="form-horizontal row-fluid" action="<?php echo url_for('system/group',$id) ?>" method="POST">
                                <input name="token" type="hidden" value="<?php echo $token; ?>" />
                                <input name="_method" type="hidden" value="PUT" />
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">用户组名称</label>
                                    <div class="controls">
                                        <input type="text" id="group_name" name="group_name" placeholder="请输入用户组名称..." value="<?php echo $group['group_name']; ?>" class="span8">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">描述</label>
                                    <div class="controls">
                                        <textarea class="span8" rows="5" name="description" id="description"><?php echo $group['description']; ?></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <a   class="btn btn-warning btn-large" href="<?php echo url_for('system/group') ?>">取消</a>
                                        <button type="submit" class="btn btn-success btn-large">保存</button>                                        
                                    </div>
                                </div>
                            </form>
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