<?php echo $this->layout('admin/layouts/header'); ?>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <?php echo $this->layout('admin/layouts/menu'); ?>
            <div class="span9">
                <div class="content">
                    <div class="module">
                        <div class="module-head">
                            <h3>系统设置</h3>
                        </div>
                        <div class="module-body">
                            <?php echo $this->layout('admin/showmessage'); ?>
                            <br />

                            <form class="form-horizontal row-fluid" action="<?php echo url_for('system/setting') ?>" method="POST">
                                <input name="token" type="hidden" value="<?php echo $token; ?>" />

                                <ul class="nav nav-tabs" id="settings">
                                    <?php
                                    $first = false;
                                    foreach ($setting_tabs as $key => $value) {
                                        ?>
                                        <li <?php echo $first ? '' : ' class="active" '; ?>><a href="#<?php echo $key; ?>"><?php echo $value; ?></a></li>
                                        <?php
                                        $first = true;
                                    }
                                    ?>
                                </ul>

                                <div class="tab-content">
                                    <?php
                                    $first = false;
                                    foreach ($setting_tabs as $key => $value) {
                                        ?>
                                        <div class="tab-pane <?php echo $first ? '' : ' active '; ?>" id="<?php echo $key; ?>">
                                            <?php foreach ($this->setting->getAll($key) as $config) { ?>
                                                <?php if ($config['htmltype'] == 'text') { ?>
                                                    <div class="control-group">
                                                        <label class="control-label" for="<?php echo 'id', $config['key']; ?>"><?php echo $config['title']; ?></label>
                                                        <div class="controls">
                                                            <input type="text" id="<?php echo 'id', $config['key']; ?>" name="<?php echo $config['group']; ?>[<?php echo $config['key']; ?>]" value="<?php echo $config['value']; ?>" class="span8">
                                                        </div>
                                                    </div>
                                                    <?php
                                                } else if ($config['htmltype'] == 'select') {
                                                    $options = json_decode($config['options']);
                                                    if (is_object($options)) {
                                                        $options = (array) $options;
                                                    }
                                                    ?>                                            
                                                    <div class="control-group">
                                                        <label class="control-label" for="<?php echo 'id', $config['key']; ?>"><?php echo $config['title']; ?></label>
                                                        <div class="controls">
                                                            <select id="<?php echo 'id', $config['key']; ?>" name="<?php echo $config['group']; ?>[<?php echo $config['key']; ?>]" class="span8">
                                                                <?php foreach ($options as $option_key => $option_value) { ?>
                                                                    <option <?php echo $config['value'] == $option_key ? ' selected="selected" ' : ''; ?>   value="<?php echo $option_key; ?>"><?php echo $option_value; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <?php
                                                } else if ($config['htmltype'] == 'textarea') {
                                                    ?>                                            
                                                    <div class="control-group">
                                                        <label class="control-label" for="<?php echo 'id', $config['key']; ?>"><?php echo $config['title']; ?></label>
                                                        <div class="controls">
                                                            <textarea class="span8" rows="5" id="<?php echo 'id', $config['key']; ?>" name="<?php echo $config['group']; ?>[<?php echo $config['key']; ?>]"><?php echo $config['value']; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <?php
                                                } else if ($config['htmltype'] == 'checkbox') {
                                                    $options = json_decode($config['options']);
                                                    if (is_object($options)) {
                                                        $options = (array) $options;
                                                    }
                                                    $values = json_decode($config['value']);
                                                    ?>                                            
                                                    <div class="control-group">
                                                        <label class="control-label" for="<?php echo 'id', $config['key']; ?>"><?php echo $config['title']; ?></label>
                                                        <div class="controls">
                                                            <?php foreach ($options as $option_key => $option_value) { ?>
                                                                <label class="checkbox inline">
                                                                    <input type="checkbox" <?php echo in_array($option_key, $values) ? ' checked="checked" ' : ''; ?> name="<?php echo $config['group']; ?>[<?php echo $config['key']; ?>]" value="<?php echo $option_value; ?>"><?php echo $option_value; ?></label>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                             <?php
                                                } else if ($config['htmltype'] == 'radio') {
                                                    $options = json_decode($config['options']);
                                                    if (is_object($options)) {
                                                        $options = (array) $options;
                                                    }
                                                    ?>                                            
                                                    <div class="control-group">
                                                        <label class="control-label" for="<?php echo 'id', $config['key']; ?>"><?php echo $config['title']; ?></label>
                                                        <div class="controls">
                                                            <?php foreach ($options as $option_key => $option_value) { ?>
                                                                <label class="radio inline">
                                                                    <input type="radio" <?php echo $config['value'] == $option_key ? ' checked="checked" ' : ''; ?> name="<?php echo $config['group']; ?>[<?php echo $config['key']; ?>]" value="<?php echo $option_key; ?>"><?php echo $option_value; ?></label>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                <?php }//end if htmltype   ?>


                                            <?php } ?>
                                        </div>
                                        <?php
                                        $first = true;
                                    }
                                    ?>
                                </div>
                                <script>
                                    $('#settings a').click(function (e) {
                                        e.preventDefault();
                                        $(this).tab('show');
                                    })
                                </script>
                                <br/>
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