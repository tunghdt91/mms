<?php
/* @var $this DanhgiadoanvienController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Danh Gia Doan Viens',
);

$this->menu=array(
	array('label'=>'Create DanhGiaDoanVien', 'url'=>array('create')),
	array('label'=>'Manage DanhGiaDoanVien', 'url'=>array('admin')),
);
?>

<h1>Danh Gia Doan Viens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
