<script src='<?php echo Yii::app()->baseUrl; ?>/js/don_vi.js'></script>
<?php $this->widget('bootstrap.widgets.TbAlert'); ?>
<h1> Tạo Đơn Vị Mới </h1>
<hr>
<p class="note"> Những trường có dấu <span class="required">*</span> là bắt buộc .</p>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'donvi-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        ),
    ));
    ?>
    <div class="dv_left">
        <div class="info-user">
            <div class="row">
                <div class="span3">Mã ĐV:<span class="required">*</span></div>
                <?php
                echo $form->textField($donvi, 'ma_don_vi', array(
                    'class' => 'text input span8',
                    'placeholder' => 'Mã Đơn vị',
                ));
                ?>
            </div>
            <div class="row">
                <div class="span3">Tên ĐV:<span class="required">*</span></div>
                <?php
                echo $form->textField($donvi, 'ten', array(
                    'class' => 'text input span8',
                    'placeholder' => 'Tên Đơn vị',
                ));
                ?>
            </div>
            <div class="row">
                <div class="span3">Loại Đơn Vị:<span class="required">*</span></div>
                <?php
                    echo CHtml::dropDownList('DonVi[loai_don_vi]', '', 
                        array('none' => '--Lựa Chọn--') + array_flip(DonVi::$LOAI_DON_VI),
                        array('id' => 'chon_loai_don_vi')
                    );
                ?>
            </div>
            <div class="row">
                <div class="span3">Đơn Vị Trực Thuộc:<span class="required">*</span></div>
                <?php
                    echo CHtml::dropDownList('DonVi[don_vi_truc_thuoc_id]', '', array('none' => '--Lựa Chọn--'),
                        array(
                            'id' => 'chon_truc_thuoc',
                            'disabled' => true,
                    ));
                ?>
            </div>
            <div class="row">
                <div class="span3">Ngày Thành Lập:<span class="required">*</span></div>
                <?php
                echo $form->textField($donvi, 'ngay_thanh_lap', array(
                    'class' => 'text input span8',
                    'placeholder' => '',
                ));
                ?>
            </div>
            
        </div>
    </div>
    <div class="dv_right">
        <div class='info-user'>
            <div class="row">
                <div class="span3">Địa Chỉ:</div>
                <?php
                echo $form->textField($donvi, 'dia_chi', array(
                    'class' => 'text input span8',
                    'placeholder' => 'Địa Chỉ Đơn vị',
                ));
                ?>
            </div>
            <div class="row">
                <div class="span3">Số Cố Định:</div>
                <?php
                echo $form->textField($donvi, 'dien_thoai_ban', array(
                    'class' => 'text input span8',
                    'placeholder' => 'Số Điện Thoại Bàn',
                ));
                ?>
            </div>
            <div class="row">
                <div class="span3">Di Động:</div>
                <?php
                echo $form->textField($donvi, 'dien_thoai', array(
                    'class' => 'text input span8',
                    'placeholder' => 'Di Động',
                ));
                ?>
            </div>
            <div class="row">
                <div class="span3">Số Fax:</div>
                <?php
                echo $form->textField($donvi, 'fax', array(
                    'class' => 'text input span8',
                    'placeholder' => 'Fax',
                ));
                ?>
            </div>        <div class="row">
            <div class="span3">Tên Lãnh Đạo:</div>
                <?php
                echo $form->textField($donvi, 'lanh_dao', array(
                    'class' => 'text input span8',
                    'placeholder' => 'Lãnh Đạo',
                ));
                ?>
            </div>
            <div class="row">
                <div class="span3">email:</div>
                <?php
                echo $form->textField($donvi, 'email', array(
                    'class' => 'text input span8',
                    'placeholder' => 'Email',
                ));
                ?>
            </div>
            <div class="row">
                <div class="span3">Website:</div>
                <?php
                echo $form->textField($donvi, 'website', array(
                    'class' => 'text input span8',
                    'placeholder' => 'WebSite',
                ));
                ?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="form-actions">
        <?php
            echo CHtml::submitButton("Tạo Mới", array('class' => 'btn btn-warning'));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>