<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'doanvien-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>
    <p class="note"> Những trường có dấu <span class="required">*</span> là bắt buộc .</p>
    <?php echo $form->errorSummary($doanvien); ?>
    <div class="doanvien_content">
        <div class="dv_left">
            <div class="row">
                <div class="span3">Mã ĐV:</div>
                <?php echo $form->textField($doanvien, 'ma_doan_vien', array(
                    'class' => 'text input span9',
                    'placeholder' => 'Mã Đoàn Viên',
                )); ?>
            </div>
            
            <div class="row">
                    <div class="span3">Họ và Tên:</div> 
                    <?php echo $form->textField($doanvien, 'ho_ten_dem',
                            array(
                            'class' => 'text input span5',
                            'placeholder' => 'Họ & tên lót',
                             )); ?>
                    <?php echo $form->textField($doanvien, 'ten', array(
                        'class' => 'text input span3 ',
                        'placeholder' => 'Tên',
                    )); ?>
            </div>
            
            <div class="row">
                <div class="span3">Bí danh:</div>
                <?php echo $form->textField($doanvien, 'bi_danh', array(
                    'class' => 'text input span9',
                    'placeholder' => 'Tên thường gọi',
                )); ?>
            </div>
            
            <div class="row">
              <div class="span3"> Giới tính: </div>
            </div>
            
            <div class="row">
              <div class="span3"> Nguyên quán: </div>
            </div>
            <div class="clear2"></div>
            
            <div class="row">
                <div class="span10 req">Hộ khẩu thường trú.</div>
            </div>
            <div class="row">
                <div class="span3">Tỉnh thành:</div>
                <div class="span9"></div>
            </div>
            <div class="row">
                <div class="span3">Địa chỉ:</div>
                <?php echo $form->textField($doanvien, 'ho_khau_thuong_tru', array(
                    'class' => 'text input span9',
                    'placeholder' => 'Địa chỉ thường trú',
                )); ?>
            </div>
            
            <div class="clear2"></div>
            <div class="row">
                <div class="span10 req">Nơi ở hiện nay (Tạm trú /KT3).</div>
            </div>
            <div class="row">
                <div class="span3">Địa chỉ:</div>
                <?php echo $form->textField($doanvien, 'ho_khau_tam_tru', array(
                    'class' => 'text input span9',
                    'placeholder' => 'Địa chỉ tạm trú',
                )); ?>
            </div>
            
            <div class="row">
               <div class="span3">Email:</div>
               <?php echo $form->textField($doanvien, 'email', array(
                   'class' => 'text input span8',
                   'placeholder' => 'example@example.com',
               ));?>
            </div>
        
            <div class="row">
               <div class="span3">Điện thoại:</div>
               <?php echo $form->textField($doanvien, 'dien_thoai', array(
                   'class' => 'text input span8',
                   'placeholder' => 'Số máy liên lạc',
               ));?>
            </div>
        
            <div class="row">
               <div class="span3">Dân tộc:</div>
            </div>

            <div class="row">
               <div class="span3">Tôn giáo:</div>
            </div>    
        </div>
        <!--end of left info-->
        <div class="dv_right">
            <div class="row">
                <div class="span10">Thành phần gia đình xuất thân</div>
            </div>
            
            <div class="row">
                    <?php echo $form->textField($doanvien, 'thanh_phan_gia_dinh_xuat_than', array(
                        'class' => 'text input span11',
                        'placeholder' => 'Liệt kê tóm tắt xuất thân của các thành viên trong gia đình',
                    ));?>
            </div>
            
            <div class="row">
                <div class="span4">Nghề nghiệp bản thân</div>
                <div class="span8"></div>
            </div>
            
            <div class="row">
                <div class="span4">Mô tả công việc</div>
                <?php echo $form->textField($doanvien, 'mo_ta_cong_viec', array(
                   'class' => 'text input span8',
                   'placeholder' => 'Công việc hiện tại',
               ));?>
            </div>
            
            <div class="row">
                <div class="span4">Trình độ văn hóa</div>
                
            </div>
            
            <div class="row">
                <div class="span11 req">Chuyên môn</div>
            </div>
            
            <div class="row">
                <div class="span4">Bằng cấp 1</div>
            </div>
            
            <div class="row">
                <div class="span4">Bằng cấp 2</div>
            </div>
            
            <div class="row">
                <div class="span4">Ngoại ngữ</div>
            </div>
            
            <div class="row">
                <div class="span4">Tin học</div>
            </div>
            
            <div class="clear2"></div>
            
            <div class="row">
                <div class="span4">Tình trạng sức khỏe</div>
            </div>
            
            <div class="row">
                <div class="span4">Ngày vào đoàn</div>
            </div>
            
            <div class="row">
                <div class="span4"></div>
                <div class="span8"></div>
            </div>
            
            <div class="row">
                <div class="span6">
                    <div class="row">
                        <div class="span6">Số thẻ đoàn viên</div>
                        <?php echo $form->textField($doanvien, 'ma_doan_vien', array(
                           'class' => 'text input span6',
                           'placeholder' => 'Số thẻ đoàn viên',
                       ));?>
                    </div>
                </div>
                
                <div class="span6">
                    <div class="row">
                        <div class="span6">Ngày chuyển đến</div>
                        <?php echo $form->textField($doanvien, 'ma_doan_vien', array(
                           'class' => 'text input span6',
                           'placeholder' => 'Số thẻ đoàn viên',
                       ));?>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="span4">Chi đoàn trước</div>
                <?php echo $form->textField($doanvien, 'don_vi_id', array(
                   'class' => 'text input span8',
                   'placeholder' => 'Chi đoàn trước',
               ));?>
            </div>
            
            <div class="row">
                <div class="span4">Đơn vị trực thuộc</div>
                <?php echo $form->textField($doanvien, 'don_vi_id', array(
                   'class' => 'text input span8',
                   'placeholder' => '',
               ));?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="row">
           <?php
               echo CHtml::submitButton($doanvien->isNewRecord ? 'Tạo mới' : 'Thay đổi',
                       array('class' => 'btn btn-warning')
                   );
           ?>
           <?php echo CHtml::resetButton('Xóa trắng', array('class' => 'btn')); ?>
    </div>
<?php $this->endWidget(); ?>   
</div>