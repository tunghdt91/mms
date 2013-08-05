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
    <?php Yii::app()->bootstrap->register();?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="row-fluid" id="page">

	<div id="mainmenu">
		<?php
        $this->widget('bootstrap.widgets.TbNavbar', array(
            'collapse' => true,
            'brand' => 'MMS',
            'brandUrl' => '#',
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'items' => array(
                        array('label' => 'Trang chủ','icon' => 'home', 'url' => array('/home/index')),
                        array('label' => 'Liên hệ', 'url' => array('#'), 'icon' => 'envelope'),
                    )
                ),
                array (
                    'class' => 'bootstrap.widgets.TbMenu',
                    'htmlOptions'=>array('class'=>'pull-right'),
                    'items' => array(
                        array('label' => 'Đăng nhập', 'icon' => 'user', 'url' => array('/user/signin'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Đăng xuất (' . Yii::app()->user->name . ')', 'icon' => 'user', 'url' => array('/user/signout'), 'visible' => !Yii::app()->user->isGuest)
                    )
                )
            ),
        ));
        ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

    <?php echo CHtml::image(Yii::app()->baseUrl.'/images/banner.png', null, array("width"=>1372)); ?>

                
    <div id="all-content">       
      <div id="slide-bar">
            <ul class="nav nav-list">
                <li><label class="tree-toggle nav-header">Tổ Chức Bộ Máy</label>
                    <ul class="nav nav-list tree">
                        <li><?php echo CHtml::link('Ban A', array('')); ?></li>
                        <li><?php echo CHtml::link('Ban B', array('')); ?></li>
                        <li><?php echo CHtml::link('Ban C', array('')); ?></li>
                    </ul>
                </li> 
                <li class="divider"></li>
                <li><label class="tree-toggle nav-header">Quản Lý Đoàn Viên</label>
                    <ul class="nav nav-list tree">
                        <li><?php echo CHtml::link('Tìm kiếm nâng cao', array('doanvien/index')); ?></li>
                        <li><?php echo CHtml::link('Tạo Mới Đoàn Viên', array('doanvien/create')); ?></li>
                        <li><?php echo CHtml::link('Đoàn Viên Bị Xoá', array('doanvien/index', 'delete' => 1)); ?></li>
                        <li><label class="tree-toggle nav-header">Di Chuyển Đoàn viên</label>
                            <ul class="nav nav-list tree">
                                <li><span style="font-size: 13px;"><?php echo CHtml::link('Chờ Chuyển Đến', array('')); ?></span></li>
                                <li><span style="font-size: 13px;"><?php echo CHtml::link('Chờ Chuyển Đi', array('')); ?></span></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="divider"></li>
                <li><label class="tree-toggle nav-header">Quản Lý Cơ Sở Đoàn</label>
                    <ul class="nav nav-list tree">
                        <li><a href="#">Overview</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><label class="tree-toggle nav-header">Media Queries</label>
                            <ul class="nav nav-list tree">
                                <li><a href="#">Text</a></li>
                                <li><a href="#">Images</a></li>
                                <li><label class="tree-toggle nav-header">Mobile Devices</label>
                                    <ul class="nav nav-list tree">
                                        <li><a href="#">iPhone</a></li>
                                        <li><a href="#">Samsung</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>  
                    </ul>
                </li>
            </ul>
      </div>
        <?php echo $content; ?>
    </div>
	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
    <script>
        $(function(){
            $('.tree-toggle').parent().children('ul.tree').toggle();
        })
        $('.tree-toggle').click(function () {
            $(this).parent().children('ul.tree').toggle(500);
        });
    </script> 