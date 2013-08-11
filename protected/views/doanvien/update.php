<div class="row">
    <div class='span6'><h3>Thay đổi thông tin đoàn viên.</h3></div>
</div>
<br/>
<div class="row">
    <?php 
        echo $this->renderPartial('_form', array(
            'doanvien' => $doanvien,
        ));
    ?>
</div>