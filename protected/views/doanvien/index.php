<script src='<?php echo Yii::app()->baseUrl; ?>/js/doan_vien.js'></script> 
<script src='<?php echo Yii::app()->baseUrl; ?>/js/bootstrap-datetimepicker.min.js'></script>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap-datetimepicker.min.css'); ?>
<script type="text/javascript">
    $(function() {
        $('.datetimepicker4').datetimepicker({
            pickTime: false
        });
    });
</script>
<style>
    .txt-input{
        margin-left: -20px;
    }
</style>
<div style="text-align: center;">
    <h2><?php echo $title ?></h2>
</div>
<?php $this->widget('bootstrap.widgets.TbAlert'); ?>
<div class='span2'>
    <?php
    echo CHtml::button('Tìm  Kiếm', array('id' => 'show_search', 'class' => 'btn btn-primary'));
    ?>
</div>
<br><br>
<?php echo CHtml::beginForm('', 'get', array('id' => 'form_search', 'hidden' => 'hidden')); ?>
<div>
    <div class="xxwide picker">
        <div class="span2">Mã Đoàn :</div> 
        <?php
        echo CHtml::textField('msdv', $msdv, array(
            'id' => 'msdv',
            'placeholder' => 'Mã Đoàn Viên',
            'class' => 'text input'
        ));
        ?>
    </div>
    <div class="xxwide picker">
        <div class="row">
            <div class="span2">Họ và Tên:</div> 
            <?php
            echo CHtml::textField('ho_ten_dem', $ho_ten_dem, array(
                'id' => 'ho_ten_dem',
                'placeholder' => 'Họ & tên lót',
                'class' => 'text input'
            ));
            ?>
            <?php
            echo CHtml::textField('ten', $ten, array(
                'id' => 'ten',
                'class' => 'text input ',
                'placeholder' => 'Tên',
            ));
            ?>
        </div>
    </div>
    <div class="xxwide picker">
        <div class="span2">Bí Danh:</div> 
        <?php
        echo CHtml::textField('bi_danh', $bi_danh, array(
            'id' => 'bi_danh',
            'class' => 'text input',
            'placeholder' => 'Bí Danh',
        ));
        ?>
    </div>
    <div class="xxwide picker">
        <div class="row">
            <div class="span2">Độ Tuổi:</div> 
            <?php
            echo CHtml::textField('do_tuoi_tu', $do_tuoi_tu, array(
                'id' => 'do_tuoi_tu',
                'class' => 'text input',
                'placeholder' => 'Từ ngày',
            ));
            ?> 
            <?php
            echo CHtml::textField('do_tuoi_den', $do_tuoi_den, array(
                'id' => 'do_tuoi_den',
                'class' => 'text input ',
                'placeholder' => 'Đến ngày',
            ));
            ?>
        </div>
    </div>
    
    <div class="row">
        <div class="span2">Ngày sinh</div>
        <div class="datetimepicker4 span4" class="input-append">
            <input class="txt-input" data-format="yyyy-MM-dd" type="text" name="ngay_sinh_tu" placeholder = 'YYYY-MM-dd'></input>
            <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
            </span>
        </div>
        <div class="datetimepicker4 span4" class="input-append">
            <input class="txt-input" data-format="yyyy-MM-dd" type="text" name="ngay_sinh_den" placeholder = 'YYYY-MM-dd'></input>
            <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
            </span>
        </div>
    </div>
    
    <div class="row">
        <div class="span2">Ngày Vào Đoàn</div>
        <div class="datetimepicker4 span4" class="input-append">
            <input class="txt-input" data-format="yyyy-MM-dd" type="text" name="ngay_vao_doan_tu" placeholder = 'YYYY-MM-dd'></input>
            <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
            </span>
        </div>
        <div class="datetimepicker4 span4" class="input-append">
            <input class="txt-input" data-format="yyyy-MM-dd" type="text" name="ngay_vao_doan_den" placeholder = 'YYYY-MM-dd'></input>
            <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
            </span>
        </div>
    </div>
    
    
    <div class="xxwide picker">
        <div class="span2">Giới Tính:</div>
        <?php
        echo CHtml::dropDownList('gioi_tinh', $gioi_tinh, array('none' => '--Lựa Chọn--') + array_flip(DoanVien::$GIOI_TINH), array('class' => 'form-control'));
        ?>
    </div>
    <div class="xxwide picker">
        <div class="span2">Dân Tộc:</div>
        <?php
        $listData_dantoc = CHtml::listData($dantocs, 'id', 'ten');
        echo CHtml::dropDownList('dan_toc', $dan_toc, array('none' => '--Lựa Chọn--') + $listData_dantoc);
        ?>
    </div>
    <div class="xxwide picker">
        <div class="span2">LL Chính Trị:</div>
        <?php
        $listData_chinhtri = CHtml::listData($ly_luan_chinh_tris, 'id', 'ten');
        echo CHtml::dropDownList('ly_luan_chinh_tri', $ly_luan_chinh_tri, array('none' => '--Lựa Chọn--') + $listData_chinhtri);
        ?>
    </div>
    <div class="xxwide picker">
        <div class="span2">Nơi Sinh:</div>
        <?php
        $listData_tinh = CHtml::listData($tinhs, 'id', 'ten');
        echo CHtml::dropDownList('tinh', $tinh, array('none' => ' Tỉnh ') + $listData_tinh, array('id' => 'chon_tinh_1'));
        echo '&nbsp';
        echo CHtml::dropDownList('huyen', $huyen, array('none' => ' Huyện '), array(
            'id' => 'chon_huyen_1',
            'disabled' => true,
        ));
        echo '&nbsp';
        echo CHtml::dropDownList('xa', $xa, array('none' => ' Xã '), array(
            'id' => 'chon_xa_1',
            'disabled' => true,
        ));
        ?>
    </div>
    <div class="xxwide picker">
        <div class="span2">Email:</div> 
        <?php
        echo CHtml::textField('email', $email, array(
            'id' => 'email',
            'class' => 'text input',
        ));
        ?>
    </div>
    <div class="xxwide picker">
        <div class="span2">Điện Thoại:</div> 
        <?php
        echo CHtml::textField('phone', $phone, array(
            'id' => 'phone',
            'class' => 'text input',
        ));
        ?>
    </div>
    <div class="xxwide picker">
        <div class="span2">Đơn vị:</div>
        <?php
        $listData_donvi = CHtml::listData($don_vis, 'id', 'ten');
        echo CHtml::dropDownList('don_vi', $don_vi, array('none' => '--Lựa Chọn--') + $listData_donvi);
        ?>
    </div>
</div>

<div>
    <?php echo CHtml::submitButton('Ok', array('id' => 'search-button', 'class' => 'btn btn-primary')); ?>
</div>
<?php echo CHtml::endForm(); ?>
<hr style="color: #808080">
<?php
$dataProvider=new CActiveDataProvider('DoanVien', array(
    'criteria' => $criteria
));
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'columns' => array(
        'ma_doan_vien',
        array(
            'class'=>'CLinkColumn',
            'header'=>'Họ Và Tên',
            'labelExpression'=>'$data->ho_ten_dem.$data->ten' ,
            'urlExpression'=>'Yii::app()->createUrl("doanvien/view",array("id"=>$data->id))',
        ),
//         array(
//             'class'=>'CDataColumn',
//             'type'=>'raw',
//            'header'=>'Ho va ten',
//            'value'=>'CHtml::link($data->ho_ten_dem, array("doanvien/view", 
//                "id"=>$data->id
//            ))',
//        ),
        'ngay_sinh',
        array(
            'name'=>'Giới Tính',
            'value'=>'$data->gioi_tinh == 1 ? "Nam" : "Nữ"',
        ),
        'email',
        'ngay_vao_doan',
        array(
            'name'=>'Đơn Vị',
            'value'=>'$data->don_vi->ten',
        )
    )));
?>