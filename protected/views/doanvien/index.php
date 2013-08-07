<script src='<?php echo Yii::app()->baseUrl; ?>/js/doan_vien.js'></script> 
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
            echo CHtml::textField('msdv', $msdv,
                array(
                    'id' => 'msdv',
                    'placeholder' => 'Mã Đoàn Viên',
                    'class' => 'text input'
                ));
        ?>
    </div>
    <div class="xxwide picker">
        <div class="row">
            <div class="span2">Họ và Tên:</div> 
            <?php echo CHtml::textField('ho_ten_dem', $ho_ten_dem,
                    array(
                        'id' => 'ho_ten_dem',
                        'placeholder' => 'Họ & tên lót',
                        'class' => 'text input'
                     )); ?>
            <?php echo CHtml::textField('ten', $ten,
                array(
                    'id' => 'ten',
                    'class' => 'text input ',
                    'placeholder' => 'Tên',
                )); ?>
        </div>
    </div>
    <div class="xxwide picker">
        <div class="span2">Bí Danh:</div> 
        <?php
            echo CHtml::textField('bi_danh', $bi_danh,
                array(
                    'id' => 'bi_danh',
                    'class' => 'text input',
                    'placeholder' => 'Bí Danh',
                ));
        ?>
    </div>
    <div class="xxwide picker">
        <div class="row">
            <div class="span2">Ngày Sinh:</div> 
            <?php 
                echo CHtml::textField('ngay_sinh_tu', $ngay_sinh_tu,
                    array(
                        'id' => 'ngay_sinh_tu',
                        'placeholder' => 'YYYY-MM-DD',
                        'class' => 'text input'
                    )); 
                echo ' - ';
            ?> 
            <?php echo CHtml::textField('ngay_sinh_den', $ngay_sinh_den,
                array(
                    'id' => 'ngay_sinh_den',
                    'class' => 'text input ',
                    'placeholder' => 'YYYY-MM-DD',
                )); ?>
        </div>
    </div>
    <div class="xxwide picker">
        <div class="row">
            <div class="span2">Độ Tuổi:</div> 
            <?php 
                echo CHtml::textField('do_tuoi_tu', $do_tuoi_tu,
                    array(
                        'id' => 'do_tuoi_tu',
                        'class' => 'text input'
                     )); 
                echo ' - ';
            ?> 
            <?php echo CHtml::textField('do_tuoi_den', $do_tuoi_den,
                array(
                    'id' => 'do_tuoi_den',
                    'class' => 'text input ',
                )); ?>
        </div>
    </div>
    <div class="xxwide picker">
        <div class="row">
            <div class="span2">Ngày Vào Đoàn:</div> 
            <?php 
                echo CHtml::textField('ngay_vao_doan_tu', $ngay_vao_doan_tu,
                    array(
                        'id' => 'ngay_vao_doan_tu',
                        'class' => 'text input'
                     )); 
                echo ' - ';
            ?> 
            <?php echo CHtml::textField('ngay_vao_doan_den', $ngay_vao_doan_den,
                array(
                    'id' => 'ngay_vao_doan_den',
                    'class' => 'text input ',
                )); ?>
        </div>
    </div>
    <div class="xxwide picker">
        <div class="span2">Giới Tính:</div>
        <?php
            echo CHtml::dropDownList('gioi_tinh', $gioi_tinh, array('none' => '--Lựa Chọn--') 
                + array_flip(DoanVien::$GIOI_TINH), array('class' => 'form-control'));
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
            echo CHtml::dropDownList('huyen', $huyen, array('none' => ' Huyện '), array(
                'id' => 'chon_huyen_1',
                'disabled' => true,
            ));
            echo CHtml::dropDownList('xa', $xa, array('none' => ' Xã '), array(
                'id' => 'chon_xa_1',
                'disabled' => true,
            ));
        ?>
    </div>
    <div class="xxwide picker">
        <div class="span2">Email:</div> 
        <?php
            echo CHtml::textField('email', $email,
                array(
                    'id' => 'email',
                    'class' => 'text input',
                ));
        ?>
    </div>
    <div class="xxwide picker">
        <div class="span2">Điện Thoại:</div> 
        <?php
            echo CHtml::textField('phone', $phone,
                array(
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
<table width ="90%" border ='2' cellspacing='1'>
    <th width ='10%' >Mã Đoàn Viên</th>
    <th width ='20%' >Họ Tên</th>
    <th width ='10%' >Ngày Sinh</th>
    <th width ='10%' >Giới Tính</th>
    <th width ='20%' >Email</th>
<?php
foreach ($doan_viens as $doan_vien) {
    echo "<tr align ='center'>";
    echo "<td><span style='color: red;'>{$doan_vien->ma_doan_vien}</span></td>";
    echo "<td><b>";
    echo CHtml::link("{$doan_vien->ho_ten_dem} {$doan_vien->ten}",array('doanvien/view',
                                         'id'=> $doan_vien->id));
    echo "</b></td>";
    echo "<td>{$doan_vien->ngay_sinh}</td>";
    echo "<td>";
    echo $doan_vien->gioi_tinh == 1 ? "Nam" : "Nữ";
    echo "</td>";
    echo "<td>{$doan_vien->email}</td>";
    echo '</tr>';
}
?>
</table>