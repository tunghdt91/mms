<?php
/* @var $this DanhgiadoanvienController */
/* @var $model DanhGiaDoanVien */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'danh-gia-doan-vien-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
        <?php echo $form->labelEx($model,"Đoàn viên: <a>{$doan_vien->ho_ten_dem} {$doan_vien->ten} </a>"); ?>
        <?php echo $form->hiddenField($model, 'doan_vien_id', array('value' => $doan_vien->id)); ?>
		<?php echo $form->error($model,'doan_vien_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, "Tiêu chí: {$tieu_chi->ten}"); ?>
        <?php echo $form->hiddenField($model, 'tieu_chi_id', array('value' => $tieu_chi->id)); ?>
		<?php echo $form->error($model,'tieu_chi_id'); ?>
	</div>
    <table width="80%">
        <tr>
            <th width="25%"></th>
            <th width="75%"></th>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($model,'diem'); ?>
            </td>
            <td>
                <?php 
                    echo $form->numberField(
                        $model,
                        'diem', 
                        array(
                            'min' => DanhGiaDoanVien::MIN_DIEM, 
                            'max' => DanhGiaDoanVien::MAX_DIEM
                        )
                    ); 
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($model,'xep_loai'); ?>
            </td>
            <td>
                <?php
                    echo $form->dropDownList($model, 'xep_loai', array('' => '--Lựa Chọn--') 
                        + array_flip(DanhGiaDoanVien::$XEP_LOAI), array('class' => 'form-control'));
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($model,"Đánh giá của cán bộ"); ?>
            </td>
            <td>
                <?php echo $form->textArea($model,'danh_gia_cua_doan_vien',array('rows'=>3, 'cols'=>50)); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($model,'danh_gia_cua_chi_doan'); ?>
            </td>
            <td>
                <?php echo $form->textArea($model,'danh_gia_cua_chi_doan',array('rows'=>3, 'cols'=>50, 'style' => ' width="100%"')); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($model,'ghi_chu'); ?>
            </td>
            <td>
                <?php echo $form->textArea($model,'ghi_chu',array('rows'=>3, 'cols'=>50)); ?>
            </td>
        </tr>
        
    </table>

	<div class="row">
		<?php echo $form->hiddenField($model,'can_bo_danh_gia_id', array('value' => $can_bo_danh_gia_id)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Hoàn tất đánh giá' : 'Hoàn tất thay đổi',
            array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->