<script src='<?php echo Yii::app()->baseUrl; ?>/js/doan_vien.js'></script> 
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'doanvien-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        ),
    ));
    ?>
    <p class="note"> Những trường có dấu <span class="required">*</span> là bắt buộc .</p>
    <?php echo $form->errorSummary($doanvien); ?>
    <div class="doanvien_content">
        <div class="dv_left">
            <div class="info-user">
                <div class="row">
                    <div class="span3">Mã ĐV:</div>
                    <?php
                    echo $form->textField($doanvien, 'ma_doan_vien', array(
                        'class' => 'text input span8',
                        'placeholder' => 'Mã Đoàn Viên',
                    ));
                    ?>
                </div>
                <div class="row">
                    <div class="span3">Họ và Tên:</div> 
                    <?php
                    echo $form->textField($doanvien, 'ho_ten_dem', array(
                        'class' => 'text input span5',
                        'placeholder' => 'Họ & tên lót',
                    ));
                    ?>
                    <?php
                    echo $form->textField($doanvien, 'ten', array(
                        'class' => 'text input span3 ',
                        'placeholder' => 'Tên',
                    ));
                    ?>
                </div>

                <div class="row">
                    <div class="span3">Ngày Sinh:</div>
                    <?php
                    echo $form->textField($doanvien, 'ngay_sinh', array(
                        'class' => 'text input span9',
                        'placeholder' => 'YYYY-MM-DD',
                    ));
                    ?>
                </div>

                <div class="row">
                    <div class="span3">Bí danh:</div>
                    <?php
                    echo $form->textField($doanvien, 'bi_danh', array(
                        'class' => 'text input span9',
                        'placeholder' => 'Tên thường gọi',
                    ));
                    ?>
                </div>

                <div class="row">
                    <div class="span3"> Giới tính: </div>
                    <?php
                    echo CHtml::dropDownList('DoanVien[gioi_tinh]', '', array_flip(DoanVien::$GIOI_TINH)
                    );
                    ?>
                </div>

                <div class="row">
                    <div class="span3">Email:</div>
                    <?php
                    echo $form->textField($doanvien, 'email', array(
                        'class' => 'text input span8',
                        'placeholder' => 'example@example.com',
                    ));
                    ?>
                </div>

                <div class="row">
                    <div class="span3">Điện thoại:</div>
                    <?php
                    echo $form->textField($doanvien, 'dien_thoai', array(
                        'class' => 'text input span8',
                        'placeholder' => 'Số máy liên lạc',
                    ));
                    ?>
                </div>
            </div>

            <div class="clear2"></div>
            <div class='info-user'>
                <div class="row">
                    <div class="span10 req">Hộ khẩu thường trú.</div>
                </div>
                <div class="row">
                    <div class="span3">
                        Nơi Sinh
                    </div>
                    <div class='span9'>
                        <?php
                        $tinhs = Tinh::model()->findAll();
                        $listData_tinh = CHtml::listData($tinhs, 'id', 'ten');
                        echo CHtml::dropDownList('tinh', '', $listData_tinh, array('id' => 'chon_tinh_1'));
                        echo CHtml::dropDownList('huyen', '', array('none' => ' Huyện '), array(
                            'id' => 'chon_huyen_1',
                            'disabled' => true,
                        ));
                        echo CHtml::dropDownList('DoanVien[ho_khau_thuong_tru]', '', array('none' => ' Xã '), array(
                            'id' => 'chon_xa_1',
                            'disabled' => true,
                        ));
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="span3">Địa Chỉ Nhà</div>
                    <div class="span9">
                        <?php
                        echo Chtml::textField('diachinoisinh', '', array(
                            'class' => 'text input span9',
                            'placeholder' => 'Địa chỉ nơi sinh',
                        ));
                        ?>
                    </div>
                </div>
            </div>

            <div class="clear2"></div>
            <div class='info-user'>
                <div class="row">
                    <div class="span10 req">Nơi ở hiện nay (Tạm trú /KT3).</div>
                </div>
                <div class="row">
                    <div class="span3">
                        Nơi Tạm trú hiện nay 
                    </div>
                    <div class='span9'>
                        <?php
                        $tinhs = Tinh::model()->findAll();
                        $listData_tinh = CHtml::listData($tinhs, 'id', 'ten');
                        echo CHtml::dropDownList('tinh_2', '', $listData_tinh, array('id' => 'chon_tinh_2'));
                        echo CHtml::dropDownList('huyen_2', '', array('none' => ' Huyện '), array(
                            'id' => 'chon_huyen_2',
                            'disabled' => true,
                        ));
                        echo CHtml::dropDownList('DoanVien[ho_khau_tam_tru]', '', array('none' => ' Xã '), array(
                            'id' => 'chon_xa_2',
                            'disabled' => true,
                        ));
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="span3">Địa Chỉ Nhà</div>
                    <div class="span9">
                        <?php
                        echo Chtml::textField('diachinoisong', '', array(
                            'class' => 'text input span9',
                            'placeholder' => 'Địa chỉ sinh sống ',
                        ));
                        ?>
                    </div>
                </div>
            </div>

            <div class="clear2"></div>
            <div class='info-user'>
                <div class="row">
                    <div class="span10 req">Thông Tin khác.</div>
                </div>
                <div class="row">
                    <div class="span3">Dân tộc:</div>
                    <?php
                    $dantocs = DanToc::model()->findAll();
                    $listData_dantoc = CHtml::listData($dantocs, 'id', 'ten');
                    echo CHtml::activeDropDownList(
                            $doanvien, 'dan_toc_id', $listData_dantoc);
                    ?>
                </div>

                <div class="row">
                    <div class="span3">Tôn giáo:</div>
                    <?php
                    $tongiaos = TonGiao::model()->findAll();
                    $listData_tongiao = CHtml::listData($tongiaos, 'id', 'ten');
                    echo CHtml::activeDropDownList(
                            $doanvien, 'ton_giao_id', $listData_tongiao);
                    ?>
                </div>
            </div>
        </div>
        <!--end of left info-->
        <div class="dv_right">
            <div class='info-user'>
                <div class="row">
                    <div class="span10">Thành phần gia đình xuất thân</div>
                </div>

                <div class="row">
                    <?php
                    echo $form->textField($doanvien, 'thanh_phan_gia_dinh_xuat_than', array(
                        'class' => 'text input span11',
                    ));
                    ?>
                </div>

                <div class="row">
                    <div class="span4">Nghề nghiệp bản thân</div>
                    <?php
                    $nghenghieps = NgheNghiep::model()->findAll();
                    $listData_nghenghiep = CHtml::listData($nghenghieps, 'id', 'ten');
                    echo CHtml::activeDropDownList(
                            $doanvien, 'nghe_nghiep_id', $listData_nghenghiep
                    );
                    ?>
                </div>

                <div class="row">
                    <div class="span4">Mô tả công việc</div>
                    <?php
                    echo $form->textField($doanvien, 'mo_ta_cong_viec', array(
                        'class' => 'text input span8',
                        'placeholder' => 'Công việc hiện tại',
                    ));
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="span11 req">Chuyên môn</div>
            </div>
            <div class='info-user'>
                <div class="row">
                    <div class="span4">Trình độ văn hóa</div>
                    <?php
                    echo CHtml::activeDropDownList(
                            $doanvien, 'trinh_do_van_hoa', array_flip(DoanVien::$TRINH_DO_VAN_HOA)
                    );
                    ?>                
                </div>
                <div class="row">
                    <div class="span4">Bằng cấp 1</div>
                    <?php
                    echo $form->textField($doanvien, 'bang_cap_1', array(
                        'class' => 'text input span8',
                    ));
                    ?>
                </div>

                <div class="row">
                    <div class="span4">Bằng cấp 2</div>
                    <?php
                    echo $form->textField($doanvien, 'bang_cap_2', array(
                        'class' => 'text input span8',
                    ));
                    ?>
                </div>

                <div class="row">
                    <div class="span4">Ngoại ngữ</div>
                    <?php
                    $ngoaingus = KyNangNgoaiNgu::model()->findAll();
                    $listData_ngoaingu = CHtml::listData($ngoaingus, 'id', 'ten');
                    echo CHtml::activeDropDownList(
                            $doanvien, 'ky_nang_ngoai_ngu_id', $listData_ngoaingu
                    );
                    ?>
                </div>

                <div class="row">
                    <div class="span4">Tin học</div>
                    <?php
                    $tinhos = KyNangTinHoc::model()->findAll();
                    $listData_tinhoc = CHtml::listData($tinhos, 'id', 'ten');
                    echo CHtml::activeDropDownList(
                            $doanvien, 'ky_nang_tin_hoc_id', $listData_tinhoc
                    );
                    ?>
                </div>
            </div>
            <div class="clear2"></div>
            <div class='info-user'>
                <div class="row">
                    <div class="span4">Tình trạng sức khỏe</div>
                    <?php
                    echo CHtml::activeDropDownList(
                            $doanvien, 'tinh_trang_suc_khoe', array_flip(DoanVien::$TINH_TRANG_SUC_KHOE)
                    );
                    ?>
                </div>

                <div class="row">
                    <div class="span4">Ngày vào đoàn</div>
                    <?php
                    echo $form->textField($doanvien, 'ngay_vao_doan', array(
                        'class' => 'text input span8',
                    ));
                    ?>
                </div>

                <div class="row">
                    <div class="span4">Số thẻ</div>
                    <?php
                    echo $form->textField($doanvien, 'CMTND', array(
                        'class' => 'text input span8',
                    ));
                    ?>
                </div>

                <div class="row">
                    <div class="span4">Ngày chuyển đến</div>
                    <?php
                    echo CHtml::textField('', '', array(
                        'class' => 'text input span8',
                        'disabled' => 'disabled',
                    ));
                    ?>
                </div>

                <div class="row">
                    <div class="span4">Chi đoàn trước</div>
                </div>

                <div class="row">
                    <div class="span4">Đơn vị trực thuộc</div>
                    <?php
                    $donvis = DonVi::model()->findAll();
                    $listData_donvi = CHtml::listData($donvis, 'id', 'ma_don_vi');
                    echo CHtml::activeDropDownList(
                            $doanvien, 'don_vi_id', $listData_donvi
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="form-actions">
        <?php
        echo CHtml::submitButton($doanvien->isNewRecord ? 'Tạo mới' : 'Thay đổi', array('class' => 'btn btn-warning')
        );
        ?>
        <?php echo CHtml::resetButton('Xóa trắng', array('class' => 'btn')); ?>
    </div>
    <?php $this->endWidget(); ?>   
</div>