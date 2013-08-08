<br/><br/><br/>
<span style="font-size: 20px;">Thông tin của đoàn viên <?php echo "{$doanvien->ho_ten_dem} {$doanvien->ten}"; ?></span>
<br/>
<br/>
<table class='detail-view table table-striped table-condensed' id='yw1'>
    <tbody>
        <tr class='odd hidden_info'>
            <th>Mã Đoàn Viên</th>
            <td><?php echo $doanvien->ma_doan_vien; ?></td>
     </tr>
     <tr class='odd hidden_info'>
            <th>Tên Đoàn Viên</th>
            <td><?php echo "{$doanvien->ho_ten_dem} {$doanvien->ten}"; ?></td>
     </tr>
     <tr class='odd hidden_info'>
            <th>Bí danh</th>
            <td><?php echo $doanvien->bi_danh; ?></td>
     </tr>
     <tr class='odd hidden_info'>
            <th>Địa Chỉ Hòm Thư</th>
            <td><?php echo $doanvien->email; ?></td>
     </tr>
      <tr class='odd hidden_info'>
            <th>Số điện thoại</th>
            <td><?php echo $doanvien->dien_thoai; ?></td>
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