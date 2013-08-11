<br/>
<?php $this->widget('bootstrap.widgets.TbAlert'); ?>
<br/>
<span style="font-size: 20px;">Thông tin của đoàn viên <a><?php echo "{$doanvien->ho_ten_dem} {$doanvien->ten}"; ?></a></span>
<br/>
<br/>
<div class="doanvien_view">
    <div class="r1">
        <div class="dv_avatar">
            <?php echo CHtml::image($doanvien->getMainImage(), null, array('width' => '150')); ?>
        </div>
        <div class="r1r">
            <ul>
             <li>
                <div class="row">
                    <div class="span3" style="color: red; font-weight: bold;">Mã Đoàn Viên</div>
                    <div class="span6" style="font-weight: bold; font-size: 18px;"><?php echo $doanvien->ma_doan_vien; ?></div>
                </div>
             </li> 
             <li>
                <div class="row">
                    <div class="span3" style="color: red; font-weight: bold;">Tên Đoàn Viên</div>
                    <div class="span6" style="font-weight: bold; font-size: 18px;"><?php echo "{$doanvien->ho_ten_dem} {$doanvien->ten}"; ?></div>
                </div>
             </li>
             <li>
                <div class="row">
                    <div class="span3" style="color: red; font-weight: bold;">Tên Thường gọi</div>
                    <div class="span6" style="font-weight: bold; font-size: 18px;"><?php echo $doanvien->bi_danh; ?></div>
                </div>
             </li>
             <li>
                <div class="row">
                    <div class="span3" style="color: red; font-weight: bold;">Địa Chỉ Hòm Thư</div>
                    <div class="span6" style="font-weight: bold; font-size: 18px;"><?php echo $doanvien->email; ?></div>
                </div>
             </li>
            </ul>
        </div>
    </div>
</div>
<hr/>

<table class='detail-view table table-striped table-condensed' id='yw1'>
    <tbody>
        <tr class='odd hidden_info'>
            <th width="30%">Ngày sinh :</th>
            <td><?php echo $doanvien->ngay_sinh; ?></td>
     </tr>
     <tr class='odd hidden_info'>
            <th>CMTND :</th>
            <td><?php echo $doanvien->CMTND; ?></td>
     </tr>
     <tr class='odd hidden_info'>
            <th>Ngày & địa điểm cấp CMTND</th>
            <td><?php echo "{$doanvien->ngay_cap}  - cấp tại {$doanvien->noi_cap}"; ?></td>
     </tr>
     <tr class='odd hidden_info'>
            <th>Trình độ văn hoá :</th>
            <td><?php echo $doanvien->trinh_do_van_hoa; ?></td>
     </tr>
      <tr class='odd hidden_info'>
            <th>Bằng cấp 1</th>
            <td><?php echo $doanvien->bang_cap_1; ?></td>
     </tr>
     <tr class='odd hidden_info'>
            <th>Bằng cấp 2 :</th>
            <td><?php echo $doanvien->bang_cap_2; ?></td>
     </tr>
    </tbody>
</table>
<div class="clear"></div>
<?php 
    echo CHtml::button('Sửa Lại', array(
        'class' => 'btn btn-info',
        'submit' => array(
            'doanvien/update',
            'id' => $doanvien->id)
        )
    );
    echo '&nbsp;&nbsp;';
    if ($doanvien->deleted_at == NULL) {
        echo CHtml::button('Khai Trừ Đoàn Viên', array(
            'class' => 'btn btn-danger',
            'submit' => array(
                'doanvien/deletemoment',
                'id' => $doanvien->id)
            )
        );
    } else {
        echo CHtml::button('Khôi Phục Dữ Liệu', array(
            'class' => 'btn btn-primary',
            'submit' => array(
                'doanvien/restore',
                'id' => $doanvien->id)
            )
        );
        echo '&nbsp;&nbsp;';
        echo CHtml::button('Xoá Vĩnh Viễn', array(
            'class' => 'btn btn-danger',
            'submit' => array(
                'doanvien/delete',
                'id' => $doanvien->id)
            )
        );
    }
?>