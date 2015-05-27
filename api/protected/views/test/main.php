<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="language" content="en"/>

	<!-- blueprint CSS framework -->
	<link rel="stylesheet"
	      type="text/css"
	      href="../../../css/screen.css"
	      media="screen, projection"/>
	<link rel="stylesheet"
	      type="text/css"
	      href="../../../css/print.css"
	      media="print"/>
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="../../../css/ie.css" media="screen, projection"/>
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="../../../css/main.css"/>
	<link rel="stylesheet" type="text/css" href="../../../css/form.css"/>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>

<body>

<div class="container" id="page">

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Dream Team.<br/> All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div>

</div>
</body>
</html>