<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="zh">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="language" content="zh"/>

	<link rel="stylesheet" type="text/css" href="../../../css/login.css"/>
	<link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css"/>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<h2 style="">Dream AD管理后台</h2>

<div class="container" id="page">
	<?php echo $content; ?>
</div>

<div class="clear"></div>

<div id="footer">
	Copyright &copy; <?php echo date('Y'); ?> by Dream-AD-Team.<br/>
	All Rights Reserved.<br/>
	<?php echo Yii::powered(); ?>
</div>
<!-- footer -->

</body>
</html>
