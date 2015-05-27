<div class="form">
	<?php $form = $this->beginWidget('CActiveForm'); ?>

	<div class="test">
		<div class="label">获取UDID: <?php echo Yii::app()->createUrl('/device/uuid'); ?></div>
		<div class="row">
			<div class="name">json:</div>
			<?php echo CHtml::textArea('json', '{
    "sn": "SH0CCRT01852",
    "imei": "352212047297408",
    "imei2": "",
    "wifimac": "F8:DB:7F:4C:59:0A"
}') ?>
		</div>
		<div class="row">
			<div class="name">appcode:</div>
			<?php echo CHtml::textArea('appCode', '1') ?>
		</div>
		<div class="row">
			<div class="name">appversion:</div>
			<?php echo CHtml::textArea('appVersion', '1') ?>
		</div>
		<div class="row buttons">
			<?php echo CHtml::submitButton('提交', array('submit' => array('/device/uuid'))); ?>
		</div>
	</div>

	<?php $this->endWidget(); ?>
</div>

<div class="form">
	<?php $form = $this->beginWidget('CActiveForm'); ?>

	<div class="test">
		<div class="label">获取UDID: <?php echo Yii::app()->createUrl('/ad/push'); ?></div>
		<div class="row">
			<div class="name">json:</div>
			<?php echo CHtml::textArea('json', '{
    "uuid": "fa57afd2-8415-4ded-bb0f-bedf54b8c6c0"
}') ?>
		</div>
		<div class="row">
			<div class="name">appcode:</div>
			<?php echo CHtml::textArea('appCode', '1') ?>
		</div>
		<div class="row">
			<div class="name">appversion:</div>
			<?php echo CHtml::textArea('appVersion', '1') ?>
		</div>
		<div class="row buttons">
			<?php echo CHtml::submitButton('提交', array('submit' => array('/ad/push'))); ?>
		</div>
	</div>

	<?php $this->endWidget(); ?>
</div>