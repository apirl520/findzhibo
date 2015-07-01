<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<h4>欢迎来到Dream广告管理平台</h4>
<?php
$form = $this->beginWidget('CActiveForm', array(
	'id' => 'dream-app-search-form',
	'htmlOptions' => array('style' => 'margin-bottom:10px;'),
));
echo CHtml::dropDownList('app_id', isset($app_id) ? $app_id : false, DreamAppBase::model()->getAppBaseList(), array(
	'empty' => '-请选择应用-',
	'class' => 'form-control',
	'style' => 'float:left;width:200px',
));
echo CHtml::submitButton('查询', array('class' => 'btn btn-primary', 'style' => 'margin-left:10px;'));
$this->endWidget(); ?>

<?php if (isset($total) && isset($today_total)) {
	echo '<h5 style="margin: 20px 0;"><span style="margin-right: 10px;">今日新增用户:' . $today_total . '</span><span>累计新增用户:' . $total . '</span></h5>';
} ?>
<div id="placeholder">
	<?php if (isset($user_data) && $user_data) {
		echo '<h5>用户增长趋势图</h5>';
		$this->widget('common.EFlot.EFlotGraphWidget',
			array(
				'data' => array(
					array(
						'label' => '每日新增用户',
						'data' => $user_data,
						'lines' => array('show' => true),
						'points' => array('show' => true)
					),
				),
				'options' => array(
					'legend' => array(
						'position' => 'nw',
						'show' => true,
						'backgroundOpacity' => '0.5'
					),
					'xaxis' => array(
						'mode' => 'time',
						'timeformat' => '%y-%m-%d',
						'minTickSize' => array(
							'1',
							'day'
						),
					),
					'grid' => array(
						'hoverable' => true,
						'clickable' => false,
					),
				),
				'htmlOptions' => array(
					'style' => 'width:100%;height:200px;'
				)
			)
		);
	} ?>
</div>
<script type="text/javascript">
	$("#placeholder").bind("plothover", function (event, pos, item) {
		$("#tooltip").remove();
		if (item) {
			$('<div id="tooltip">' + item.datapoint[1] + '</div>').css({
				position: 'absolute',
				display: 'none',
				top: pos.pageY + 10,
				left: pos.pageX + 10,
				border: '1px solid black',
				padding: '1px 2px',
				'background-color': 'white',
				opacity: 0.75
			}).appendTo("body").fadeIn(200);
		}
	})
</script>
