<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<?php Yii::app()->bootstrap->register(); ?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet"
	      type="text/css"
	      href="../../../css/screen.css"
	      media="screen, projection">
	<link rel="stylesheet"
	      type="text/css"
	      href="../../../css/print.css"
	      media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet"
	      type="text/css"
	      href="../../../css/ie.css"
	      media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="../../../css/main.css">
	<link rel="stylesheet" type="text/css" href="../../../css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<?php $this->widget('bootstrap3.widgets.TbNavbar', array(
		'type' => 'inverse',
		'fixed' => 'top',
		'brand' => 'Dream AD管理后台',
		'brandUrl' => '/',
		'collapse' => true,
		'fluid' => true,
		// requires bootstrap-responsive.css
		'items' => array(
			array(
				'class' => 'bootstrap3.widgets.TbMenu',
				'items' => array(
					array(
						'label' => '应用管理',
						'url' => array('DreamApp/admin'),
						'visible' => !Yii::app()->user->isGuest,
					),
					array(
						'label' => '广告管理',
						'url' => array('DreamAdPackage/admin'),
						'visible' => !Yii::app()->user->isGuest,
					),
					array(
						'label' => '推送管理',
						'url' => array('DreamPushTask/admin'),
						'visible' => !Yii::app()->user->isGUest,
					),
				),
			),
			array(
				'class' => 'bootstrap3.widgets.TbMenu',
				'htmlOptions' => array('class' => 'pull-right'),
				'items' => array(
					array(
						'label' => '个人管理',
						'url' => array('#'),
						'items' => array
						(
							array(
								'label' => '个人信息及密码修改',
								'url' => array('adminUser/index')
							),
						),
						'visible' => !Yii::app()->user->isGuest,

					),
					array(
						'label' => '登录',
						'url' => array('site/login'),
						'visible' => Yii::app()->user->isGuest
					),
					array(
						'label' => '登出 (' . Yii::app()->user->name . ')',
						'url' => array('site/logout'),
						'visible' => !Yii::app()->user->isGuest
					),
				),
			),
		),
	)); ?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Dream-AD-Team.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div>
	<!-- footer -->

</div>
<!-- page -->

</body>
</html>
