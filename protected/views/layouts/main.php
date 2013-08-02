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
                        array('label' => 'Diễn đàn','icon' => 'th', 'url' => 'forum'),
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
            <div class="sd-menu">
                Danh Mục Quản Lý
            </div>
            <div class='well well-small'>
                <?php echo CHtml::link('Thông Tin Cá Nhân', '#'); ?>
            </div>
            <div class='well well-small'>
                <?php echo CHtml::link('Tin Học Ngoại Ngữ', '#'); ?>
            </div>
            <div class='well well-small'>
                <?php echo CHtml::link('Quan Hệ Xã Hội', '#'); ?>
            </div>
            <div class='well well-small'>
                <?php echo CHtml::link('Kinh tế gia đình', '#'); ?>
            </div>    
            <div class='well well-small'>
                <?php echo CHtml::link('Đánh giá đoàn viên', '#'); ?>
            </div>
            <div class='well well-small'>
                <?php echo CHtml::link('Lý lịch làm việc', '#'); ?>
            </div>
            <div class='well well-small'>
                <?php echo CHtml::link('Khen thưởng-Kỷ luật', '#'); ?>
            </div>
            <div class='well well-small'>
                <?php echo CHtml::link('Quá trình học tập', '#'); ?>
            </div>
            <div class='well well-small'>
                <?php echo CHtml::link('Thông tin khác', '#'); ?>
            </div>
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
