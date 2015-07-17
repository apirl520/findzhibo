<h4>广告管理</h4>
<?php
$form = $this->beginWidget('CActiveForm', array(
	'id' => 'dream-ad-package-search-form',
	'htmlOptions' => array('style' => 'margin-bottom:10px;'),
));
echo CHtml::textField('title', isset($title) ? $title : false, array(
	'style' => 'float:left;width:20%;margin-right:10px;',
	'class' => 'form-control',
	'placeholder' => '输入查询的广告名'
));
echo CHtml::submitButton('查询', array('class' => 'btn btn-primary', 'style' => 'margin-right:10px;'));
echo CHtml::link(CHtml::button('添加广告', array('class' => 'btn btn-success')), Yii::app()->createUrl('DreamAdPackage/create'));
$this->endWidget();

if (isset($dataProvider) && $dataProvider) {
	$this->widget('bootstrap3.widgets.TbGridView', array(
		'type' => 'bordered',
		'id' => 'dream-ad-package-grid',
		'dataProvider' => $dataProvider,
		'columns' => array(
			array(
				'type' => 'image',
				'name' => 'icon_url',
				'value' => '$data["icon_url"]',
				'htmlOptions' => array(
					'class' => 'text-center',
				),
			),
			array(
				'type' => 'image',
				'name' => 'image_url',
				'value' => '$data["image_url"]',
				'htmlOptions' => array(
					'class' => 'text-center',
				),
			),
			array(
				'name' => 'app_name',
				'value' => '$data["app_name"]',
			),
			array(
				'name' => 'package_name',
				'value' => '$data["package_name"]',
			),
			array(
				'name' => 'version_code',
				'value' => '$data["version_code"]',
			),
			array(
				'name' => 'version_name',
				'value' => '$data["version_name"]',
			),
			array(
				'name' => 'file_size',
				'value' => 'Util::formatFileSize($data["file_size"])',
			),
			array(
				'name' => 'show_flag',
				'value' => '$data["show_flag"]==2?"ROOT付费推广":($data["show_flag"]?"上架":"下架")',
			),
			array(
				'class' => 'bootstrap3.widgets.TbButtonColumn',
				'template' => '{fix} {del}',
				'buttons' => array(
					'fix' => array(
						'label' => '修改',
						'url' => 'Yii::app()->createUrl("DreamAdPackage/update", array("id" => $data["id"]))',
					),
					'del' => array(
						'label' => '删除',
						'url' => 'Yii::app()->createUrl("DreamAdPackage/delete", array("id" => $data["id"]))',
					),
				),
			),
		),
	));
}
?>
<style type="text/css">
	.text-center {
		text-align: center;
	}
	tbody tr td img {
		width: 64px;
	}
</style>

