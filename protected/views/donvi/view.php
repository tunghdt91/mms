<?php echo CHtml::endForm(); ?>
<hr style="color: #808080">
<div class="title">
    <h1> <?php echo $don_vi->ten; ?> </h1>
</div>
<div class="title">
    <h1> Danh sách cán bộ </h1>
</div>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $dataProviderCanBo,
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
<?php
if ($don_vi->loai_don_vi == DonVi::LOAI_DON_VI_XA_DOAN) {
    echo '<div class="title">';
    echo "<h1> Danh sách Đoàn viên </h1>";
    echo '</div>';
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $dataProviderDoanVien,
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
        )));
}
?>