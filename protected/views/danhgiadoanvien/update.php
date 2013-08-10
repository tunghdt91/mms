<div class="title">
    <h1>Thay Đổi Đánh Giá </h1>
</div>

<?php 
    echo $this->renderPartial(
        '_form', 
        array(
            'model'=>$model,
            'doan_vien' => $doan_vien,
            'tieu_chi' => $tieu_chi,
            'can_bo_danh_gia_id' => $can_bo_danh_gia_id,
        )
    ); 
?>