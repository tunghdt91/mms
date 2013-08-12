<?php echo CHtml::endForm(); ?>
<hr style="color: #808080">
<?php
echo '<div class="title">';
echo "<h1> {$ban->ten} </h1>";
echo '</div>';
echo "<h4> Mô tả:</h4>";
echo $ban->mo_ta;
echo "<h4> Danh sách thành viên:</h4>";
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $dataProvider,
    'columns' => array(
        'ma_doan_vien',
        array(
            'class'=>'CLinkColumn',
            'header'=>'Họ Và Tên',
            'labelExpression'=>'$data->ho_ten_dem.$data->ten' ,
            'urlExpression'=>'Yii::app()->createUrl("doanvien/view",array("id"=>$data->id))',
        ),
        'ngay_sinh',
        array(
            'name'=>'Giới Tính',
            'value'=>'$data->gioi_tinh == 1 ? "Nam" : "Nữ"',
        ),
        'email',
        'ngay_vao_doan',
        array(
            'name' => 'Chức vụ',
            'value' => '$data->chuc_vu_doan->ten',
        )
    )));
?>