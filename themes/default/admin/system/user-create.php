<?php echo $this->layout('admin/layouts/header'); ?>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <?php echo $this->layout('admin/layouts/menu'); ?>
            <div class="span9">
                <div class="content">
                    <div class="module">
                        <div class="module-head">
                            <h3>添加用户</h3>
                        </div>
                        <div class="module-body">
                            <?php echo $this->layout('admin/showmessage'); ?>
                            <br />

                            <form class="form-horizontal row-fluid" action="<?php echo url_for('system/user') ?>" method="POST">
                                <div class="control-group">
                                    <label class="control-label" for="group_id">用户组</label>
                                    <div class="controls">
                                        <select tabindex="1"  class="span8" id="group_id" name="group_id">
                                            <option value="">选择用户组</option>
                                            <?php foreach ($groups as $group) { ?>
                                                <option value="<?php echo $group->group_id ?>"><?php echo $group->group_name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="email">用户名</label>
                                    <div class="controls">
                                        <input type="text" id="email" name="email" placeholder="请输入Email" class="span8">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="password">密码</label>
                                    <div class="controls">
                                        <input type="text" id="password" name="password" placeholder="请输入密码" class="span8">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="repassword">确认密码</label>
                                    <div class="controls">
                                        <input type="text" id="password" name="repassword" placeholder="请输入确认密码" class="span8">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="fullname">姓名</label>
                                    <div class="controls">
                                        <input type="text" id="fullname" name="fullname" placeholder="请输入姓名" class="span8">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="description">描述</label>
                                    <div class="controls">
                                        <textarea class="span8" rows="5" name="description" id="description"></textarea>
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