<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="icon" href="../../../static/img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="../../../static/img/favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="../../../static/css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../../../static/css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../../../static/css/responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../../../static/css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../../../static/css/common.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../../../static/css/touchTouch.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../../../static/css/kwicks-slider.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="../../../static/js/jquery.js"></script>
	<script type="text/javascript" src="../../../static/js/superfish.js"></script>
	<script type="text/javascript" src="../../../static/js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="../../../static/js/jquery.kwicks-1.5.1.js"></script>
	<script type="text/javascript" src="../../../static/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="../../../static/js/touchTouch.jquery.js"></script>
	<script type="text/javascript">if ($(window).width() > 1024) {
			document.write("<" + "script src='../../../static/js/jquery.preloader.js'></" + "script>");
		}    </script>

	<script>
		jQuery(window).load(function () {
			$x = $(window).width();
			if ($x > 1024) {
				jQuery("#content .row").preloader();
			}

			jQuery('.magnifier').touchTouch();
			jQuery('.spinner').animate({'opacity': 0}, 1000, 'easeOutCubic', function () {
				jQuery(this).css('display', 'none')
			});
		});

	</script>

	<!--[if lt IE 8]>
	<div style='text-align:center'>
		<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/upgrade.jpg"
		                                                                                                             border="0"
		                                                                                                             alt=""/></a>
	</div>
	<![endif]-->
	<!--[if (gt IE 9)|!(IE)]><!-->
	<!--<![endif]-->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<link rel="stylesheet" href="../../../static/css/ie.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
	<![endif]-->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="spinner"></div>

<!--header-->
<header>
	<?php $this->renderDynamic('widget', 'ext.widgets.header.Header', array('renderDirect' => true), true); ?>
</header>
<!--header end-->

<!--content-->
<div>
	<?php echo $content; ?>
</div>
<!--content end-->

<!--footer-->
<footer>
	<div class="container clearfix">
		<ul class="list-social pull-right">
			<li><a class="icon-1" href="#"></a></li>
			<li><a class="icon-2" href="#"></a></li>
			<li><a class="icon-3" href="#"></a></li>
			<li><a class="icon-4" href="#"></a></li>
		</ul>
		<div class="privacy pull-left">Website Template designed by <a href="http://www.templatemonster.com/"
		                                                               target="_blank"
		                                                               rel="nofollow">TemplateMonster.com</a>
			<span style="margin-left: 10px;">京ICP备15047024号</span>
		</div>
	</div>
</footer>
<!--footer end-->

<script type="text/javascript" src="../../../static/js/bootstrap.js"></script>
</body>
</html>
