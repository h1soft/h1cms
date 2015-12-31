<div class="span3">
    <div class="sidebar">
        <ul class="widget widget-menu unstyled">
            <li class="active"><a href="<?php echo url_for('system/dashboard'); ?>"><i class="menu-icon icon-dashboard"></i>控制面板
                </a></li>
            <li><a href="activity.html"><i class="menu-icon icon-bullhorn"></i>News Feed </a>
            </li>
            <li><a href="message.html"><i class="menu-icon icon-inbox"></i>Inbox <b class="label green pull-right">
                        11</b> </a></li>
            <li><a href="task.html"><i class="menu-icon icon-tasks"></i>Tasks <b class="label orange pull-right">
                        19</b> </a></li>
        </ul>
        <!--/.widget-nav-->

        <!--/.widget-nav-->
        <ul class="widget widget-menu unstyled">
            <li><a class="<?php echo $system_manager ? '' : 'collapsed'; ?>" data-toggle="collapse" href="#system_manager"><i class="menu-icon icon-cog">
                    </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                    </i>系统管理 </a>
                <ul id="system_manager" class="<?php echo $system_manager ? 'collapsed' : 'collapse'; ?> unstyled">
                    <li><a href="<?php echo url_for('system/settings'); ?>"><i class="icon-cog"></i>系统设置 </a></li>
                    <li><a href="<?php echo url_for('system/group'); ?>"><i class="icon-user"></i>用户组管理 </a></li>
                    <li><a href="<?php echo url_for('system/user'); ?>"><i class="icon-user"></i>用户管理 </a></li>
                </ul>
            </li>
            <li><a href="<?php echo url_for('system/user/logout'); ?>"><i class="menu-icon icon-signout"></i>安全退出 </a></li>
        </ul>
    </div>
    <!--/.sidebar-->
</div>
<!--/.span3-->