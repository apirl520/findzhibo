<h4>推送管理</h4>
<?php
$form = $this->beginWidget('CActiveForm', array(
	'id' => 'dream-app-search-form',
	'htmlOptions' => array('style' => 'margin-bottom:10px;'),
));
echo CHtml::textField('title', isset($title) ? $title : false, array(
	'style' => 'float:left;width:20%;margin-right:10px;',
	'class' => 'form-control',
	'placeholder' => '输入查询的广告名'
));
echo CHtml::dropDownList('type', isset($type) ? $type : false, array(1 => 'push', 2 => '插屏'), array(
	'style' => 'float:left;width:15%;margin-right:10px;',
	'class' => 'form-control',
	'empty' => '选择推送类型'
));
echo CHtml::submitButton('查询', array('class' => 'btn btn-primary', 'style' => 'margin-right:10px;'));
echo CHtml::link(CHtml::button('添加推送规则', array('class' => 'btn btn-success')), Yii::app()->createUrl('DreamPushTask/create'));
$this->endWidget();

if (isset($dataProvider) && $dataProvider) {
	$this->widget('bootstrap3.widgets.TbGridView', array(
		'type' => 'bordered',
		'id' => 'dream-push-task-grid',
		'dataProvider' => $dataProvider,
		'columns' => array(
			array(
				'name' => 'push_ad_id',
				'value' => '$data->task["app_name"]?$data->task["app_name"]:"广告已删除"',
				'htmlOptions' => array(
					'style' => 'width:100px;'
				),
			),
			array(
				'name' => 'push_type',
				'value' => '$data["push_type"]==1?"push":"插屏"',
				'htmlOptions' => array(
					'style' => 'width:50px;'
				),
			),
			array(
				'name' => 'push_title',
				'value' => '$data["push_title"]',
				'htmlOptions' => array(
					'style' => 'width:150px;'
				),
			),
			array(
				'name' => 'push_description',
				'value' => '$data["push_description"]',
			),
			array(
				'name' => 'push_status',
				'value' => '$data["push_status"]?"开":"关"',
				'htmlOptions' => array(
					'style' => 'width:80px;text-align:center;'
				),
			),
			array(
				'class' => 'bootstrap3.widgets.TbButtonColumn',
				'template' => '{fix} {del}',
				'buttons' => array(
					'fix' => array(
						'label' => '修改',
						'url' => 'Yii::app()->createUrl("DreamPushTask/update", array("id" => $data["id"]))',
					),
					'del' => array(
						'label' => '删除',
						'url' => 'Yii::app()->createUrl("DreamPushTask/delete", array("id" => $data["id"]))',
					),
				),
				'htmlOptions' => array(
					'style' => 'width:100px;'
				),
			),
		),
	));
}
?>
