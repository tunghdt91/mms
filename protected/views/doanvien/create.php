<legend>
    <h3>Thêm đoàn viên mới</h3>
</legend>
<?php $this->widget('bootstrap.widgets.TbAlert'); ?>
    <?php echo $this->renderPartial('_form', array(
        'doanvien' => $doanvien,
        )
     ); ?>