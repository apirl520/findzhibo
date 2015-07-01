<h4>应用管理</h4>
<?php
$form = $this->beginWidget('CActiveForm', array(
	'id' => 'dream-app-search-form',
	'htmlOptions' => array('style' => 'margin-bottom:10px;'),
));
echo CHtml::textField('title', isset($title) ? $title : false, array(
	'style' => 'float:left;width:20%;margin-right:10px;',
	'class' => 'form-control',
	'placeholder' => '输入查询的应用名'
));
echo CHtml::submitButton('查询', array('class' => 'btn btn-primary', 'style' => 'margin-right:10px;'));
echo CHtml::link(CHtml::button('添加应用', array('class' => 'btn btn-success')), Yii::app()->createUrl('DreamApp/create'));
$this->endWidget();

if (isset($dataProvider) && $dataProvider) {
	$this->widget('bootstrap3.widgets.TbGridView', array(
		'type' => 'bordered',
		'id' => 'dream-app-grid',
		'dataProvider' => $dataProvider,
		'columns' => array(
			array(
				'name' => 'title',
				'value' => '$data["title"]',
			),
			array(
				'name' => 'app_id',
				'value' => '$data["app_id"]',
			),
			array(
				'name' => 'app_version',
				'value' => '$data["app_version"]',
			),
			array(
				'name' => 'ad_switch',
				'value' => '$data["ad_switch"]?"开":"关"',
			),
			array(
				'name' => 'show_flag',
				'value' => '$data["show_flag"]?"上架":"下架"',
			),
			array(
				'class' => 'bootstrap3.widgets.TbButtonColumn',
				'template' => '{fix} {del}',
				'buttons' => array(
					'fix' => array(
						'label' => '修改',
						'url' => 'Yii::app()->createUrl("DreamApp/update", array("id" => $data["id"]))',
					),
					'del' => array(
						'label' => '删除',
						'url' => 'Yii::app()->createUrl("DreamApp/delete", array("id" => $data["id"]))',
					),
				),
			),
		),
	));
}
?>
