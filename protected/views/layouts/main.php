<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <?php
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/style.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/main.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/form.css');
        ?>
        <?php Yii::app()->bootstrap->register(); ?>

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <script>
        $(document).ready(function(){
            $('.tcbm').click(function(){
                $('.ban').slideToggle();
            });
            
            $('.qldv').click(function(){
                $('.qldv_2').slideToggle();
            });
        });
        </script>
    </head>

    <body>

        <div class="row-fluid" id="page">

            <div id="mainmenu">
                <?php
                $this->widget('bootstrap.widgets.TbNavbar', array(
                    'collapse' => true,
                    'brand' => 'Quản Lý Đoàn Viên',
                    'brandUrl' => '#',
                    'items' => array(
                        array(
                            'class' => 'bootstrap.widgets.TbMenu',
                            'items' => array(
                                array('label' => 'Trang chủ', 'icon' => 'home', 'url' => array('/home/index')),
                                array('label' => 'Liên hệ', 'url' => array('/home/contact'), 'icon' => 'envelope'),
                                array('label' => 'Diễn đàn', 'url' => 'forum', 'icon' => 'th'),
                            )
                        ),
                         '<form class="navbar-search" action=""><input type="text"
                             class="search-query" placeholder="Tìm kiếm nội dung" id="search" >
                            </form>',   
                        array(
                            'class' => 'bootstrap.widgets.TbMenu',
                            'htmlOptions' => array('class' => 'pull-right2'),
                            'items' => array(
                                array('label' => 'Đăng nhập', 'icon' => 'user', 'url' => array('/user/signin'), 'visible' => Yii::app()->user->isGuest),
                                array('label' => Yii::app()->user->name, 'icon' => 'user', 'url' => '#', 'visible' => !Yii::app()->user->isGuest,
                                    'items' => array(
                                        array(
                                            'label' => 'Đổi mật khẩu',
                                            'icon' => 'cog',
                                            'url' => array('user/changePassword'),
                                        ),
                                        array('label' => 'Help', 'icon' => 'flag', 'url' => array('help/help')),
                                        '---',
                                        array('label' => 'Đăng xuất', 'icon' => 'icon-share', 'url' => array('user/signout')),
                                    )),
                            )
                        )
                    ),
                ));
                ?>
            </div><!-- mainmenu -->
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo CHtml::image(Yii::app()->baseUrl . '/images/banner.png', null, array("width" => 1372)); ?>
            <div id="all-content">
                <div id="slide-bar">
                    <ul class="nav nav-tabs nav-stacked"><li class="disabled" style="background: #CCFF66; font-weight: bold; color: orange;"><a href="#">Danh mục quản lý</a></li></ul>
                    <div class="well-small well tcbm"><a><i class="icon-chevron-right"></i>Tổ Chức Bộ Máy</a></div>
                    <ul class="nav nav-list tree ban">
                        <?php
                            $danh_sach_ban = Ban::model()->findAll();
                            foreach ($danh_sach_ban as $ban) {
                                echo "<li>";
                                echo CHtml::link($ban->ten,array('ban/DanhSachThanhVien', 'id' => $ban->id));
                                echo "</li>";
                            }
                        ?>
                    </ul>
                    <div class="well-small well"><a><i class="icon-chevron-right"></i>Đơn vị đoàn</a></div>
                    <ul class="nav nav-list tree">
                        <?php
                            if ($this->current_user != NULL) {
                                $don_vi = $this->current_user->doan_vien->don_vi;
                                $don_vi->printDonVi();
                            }
                        ?>
                    </ul>
                    <div class="well-small well qldv"><a><i class="icon-chevron-right"></i>Quản Lý Đoàn Viên</a></div>
                    <ul class="nav nav-list tree qldv_2">
                        <li><?php echo CHtml::link('Tìm kiếm', array('doanvien/index')); ?></li>
                        <li><?php echo CHtml::link('Tạo Mới Đoàn Viên', array('doanvien/create')); ?></li>
                        <li><?php echo CHtml::link('Đoàn Viên Bị Xoá', array('doanvien/index', 'delete' => 1)); ?></li>
                        <li><label class="tree-toggle nav-header">Di Chuyển Đoàn viên</label>
                            <ul class="nav nav-list tree">
                                <li><span style="font-size: 13px;"><?php echo CHtml::link('Chờ Chuyển Đến', array('')); ?></span></li>
                                <li><span style="font-size: 13px;"><?php echo CHtml::link('Chờ Chuyển Đi', array('')); ?></span></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="well-small well"><a>Thông tin</a></div>
                    <div class="alert alert-warning">Quản Lý Hệ Thống</div>
                    <ul class="nav nav-list tree">
                        <li><?php echo CHtml::link('Tạo Mới Đơn Vị', array('donvi/create')); ?></li>
                    </ul>
                    <div class="alert alert-warning">Liên hệ</div>

                </div>
                <?php echo $content; ?>
            </div>
            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by <a href="#">CTTQ Group.</a><br/>
                All Rights Reserved.<br/>
                <?php echo Yii::powered(); ?>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>