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
        array(
            'class'=>'CLinkColumn',
            'header'=>'Họ Và Tên',
            'labelExpression'=>'$data->ho_ten_dem.$data->ten' ,
            'urlExpression'=>'Yii::app()->createUrl("doanvien/view",array("id"=>$data->id))',
        ),
        array(
            'name' => 'Chức vụ',
            'value' => '$data->chuc_vu_doan ? $data->chuc_vu_doan->ten : ""',
        ),
        array(
            'name' => "Trình độ chuyên môn",
            'value' => '$data->bang_cap_1'
        ),
        array(
            'name' => "Trình độ chính trị",
            'value' => '$data->ly_luan_chinh_tri ? $data->ly_luan_chinh_tri->ten : ""',
        ),
        'dien_thoai',
    )));
?>