<?php
if ($this->session->hasFlash('success')) {
    ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php foreach ($this->session->getFlash('success') as $message) { ?>
            <span class="icon-info-sign"></span> <?php echo $message; ?><br/>
        <?php } ?>
    </div>
    <?php
}
?>
<?php
if ($this->session->hasFlash('warning')) {
    ?>
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php foreach ($this->session->getFlash('warning') as $message) { ?>
            <span class="icon-info-sign"></span> <?php echo $message; ?><br/>
        <?php } ?>
    </div>
    <?php
}
?>
<?php
if ($this->session->hasFlash('error')) {
    ?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php foreach ($this->session->getFlash('error') as $message) { ?>
            <span class="icon-info-sign"></span> <?php echo $message; ?><br/>
        <?php } ?>
    </div>
    <?php
}
?>