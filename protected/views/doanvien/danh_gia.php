<div class="title">
    <h1> Kết Quả Đánh Giá </h1>
</div>
    <?php
        echo "Đoàn viên: ";
        echo "<a> {$doan_vien->ho_ten_dem} {$doan_vien->ten} </a>";
    ?>
<table border="2" class="tablelist2">
    <colgroup>  
      <col class="colSM1" />
      <col class="colSM2" />
      <col class="colSM3" />
      <col class="colSM4" />
      <col class="colSM5" />
      <col class="colSM6" />
      <col class="colSM7" />
      <col class="colSM8" />
    </colgroup> 
    <tr>
        <th>STT</th>
        <th>Nội Dung</th>
        <th>Điểm</th>
        <th>Xếp Loại</th>
        <th>Đánh Giá Của Cán bộ</th>
        <th>Đánh Giá Của Chi Đoàn</th>
        <th>Ghi Chú</th>
        <th></th>
    </tr>
    <?php 
        foreach ($tieuchis as $tieuchi) {
            $d = new DanhGiaDoanVien();
            echo "<tr>";
            echo "<td>{$tieuchi->id}</td>";
            echo "<td>{$tieuchi->ten}</td>";
            $printed = false;
            foreach ($danh_gia_doan_vien_s as $danh_gia_doan_vien) {
                if ($danh_gia_doan_vien->tieu_chi_id == $tieuchi->id) {
                    $d = $danh_gia_doan_vien;
                    $printed = true;
                    
                    echo "<td> $d->diem </td>";
                    if (isset($d->xep_loai)) {
                        $xep_loai = array_search($d->xep_loai, $XEP_LOAI);
                    } else {
                        $xep_loai = '';
                    }

                    echo "<td> $xep_loai </td>";
                    echo "<td> $d->danh_gia_cua_doan_vien </td>";
                    echo "<td> $d->danh_gia_cua_chi_doan </td>";
                    echo "<td> $d->ghi_chu </td>";
                    echo "<td>";
                    echo CHtml::button(
                        'Thay đổi',
                        array (
                            'class' => 'btn btn-danger',
                            'submit' => array(
                                'danhgiadoanvien/update',
                                'id' => $danh_gia_doan_vien->id,
                            )
                        )
                    );
                    echo "</td>";
                    echo "</tr>";
                }
            }

            if (!$printed) {
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td>";
                echo CHtml::button(
                    'Đánh giá',
                    array(
                        'class' => 'btn btn-primary',
                        'submit' => array(
                            'danhgiadoanvien/create',
                            'doanvienid' => $doan_vien->id,
                            'tieuchiid' => $tieuchi->id,
                        )
                    )
                );
                echo "</td>";
            }
            echo "</tr>";
        }
    ?>
</table>
<br>