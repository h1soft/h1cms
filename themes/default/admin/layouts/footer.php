<div class="footer">
    <div class="container">
        <b class="copyright">&copy; 2014 H1CMS - H1CMS.COM </b> All rights reserved.
    </div>
</div>
<script src="<?php echo base_url('/assets/jquery/jquery-ui-1.10.1.custom.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/themes/default/admin/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/dialog/dialog.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/assets/dialog/dialog-plus-min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/themes/default/admin/scripts/common.js'); ?>" type="text/javascript"></script>
<?php foreach ($jsfiles as $js) { ?>
    <script src="<?php echo base_url($js); ?>" type="text/javascript"></script>
<?php } ?>
</body>
</html>
