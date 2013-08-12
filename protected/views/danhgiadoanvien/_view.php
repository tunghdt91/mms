<?php
/* @var $this DanhgiadoanvienController */
/* @var $data DanhGiaDoanVien */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doan_vien_id')); ?>:</b>
	<?php echo CHtml::encode($data->doan_vien_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tieu_chi_id')); ?>:</b>
	<?php echo CHtml::encode($data->tieu_chi_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diem')); ?>:</b>
	<?php echo CHtml::encode($data->diem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('xep_loai')); ?>:</b>
	<?php echo CHtml::encode($data->xep_loai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('danh_gia_cua_doan_vien')); ?>:</b>
	<?php echo CHtml::encode($data->danh_gia_cua_doan_vien); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('danh_gia_cua_chi_doan')); ?>:</b>
	<?php echo CHtml::encode($data->danh_gia_cua_chi_doan); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ghi_chu')); ?>:</b>
	<?php echo CHtml::encode($data->ghi_chu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('can_bo_danh_gia_id')); ?>:</b>
	<?php echo CHtml::encode($data->can_bo_danh_gia_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_at')); ?>:</b>
	<?php echo CHtml::encode($data->update_at); ?>
	<br />

	*/ ?>

</div>