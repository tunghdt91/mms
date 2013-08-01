<div style="text-align: center;">
    <h2> Danh sách đoàn viên bị xóa </h2>
</div>
<?php
foreach ($doan_viens as $doan_vien) {
    echo 'Mã Đoàn Viên: ' . $doan_vien->ma_doan_vien .'<br>';
    echo 'Họ Tên: ' . $doan_vien->ho_ten_dem . ' ' . $doan_vien->ten . '<br>';
    echo 'Giới Tính: ' . $doan_vien->gioi_tinh . '<br>';
    echo 'Ngày Sinh: ' . $doan_vien->ngay_sinh ;
    echo '<hr>';
}