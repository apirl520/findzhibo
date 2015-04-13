<div class="container clearfix">
	<div class="row">
		<div class="span12">
			<div class="navbar navbar_">
				<div class="container">
					<h1 class="brand brand_"><a href="/"><img alt="今天看什么"
					                                          src="<?php echo Yii::app()->request->baseUrl; ?>/static/img/logo.gif">
						</a></h1>
					<a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu
						<span class="icon-bar"></span></a>

					<div class="nav-collapse nav-collapse_  collapse">
						<ul class="nav sf-menu">
							<li class="<?php if ($controller == 'site') {
								echo 'active';
							}; ?>"><a href="/">首页</a></li>
							<li class="<?php if ($controller == 'category') {
								echo 'active';
							}; ?>"><a href="<?php echo Yii::app()->createUrl('category/index'); ?>">分类</a></li>
							<li class="<?php if ($controller == 'show') {
								echo 'active';
							}; ?>"><a href="<?php echo Yii::app()->createUrl('show/index'); ?>">直播</a></li>
							<li class="<?php if ($controller == 'famous') {
								echo 'active';
							}; ?>"><a href="<?php echo Yii::app()->createUrl('famous/index'); ?>">名人</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
