<div class="form">
	<?php $form = $this->beginWidget('CActiveForm'); ?>

	<div class="test">
		<div class="label">获取UDID: <?php echo Yii::app()->createUrl('/ad/root'); ?></div>
		<div class="row">
			<div class="name">json:</div>
			<?php echo CHtml::textArea('json', '{
    "uuid" : "fa57afd2-8415-4ded-bb0f-bedf54b8c6c0"
}') ?>
		</div>
		<div class="row">
			<div class="name">appCode:</div>
			<?php echo CHtml::textArea('appCode', '1') ?>
		</div>
		<div class="row">
			<div class="name">appVersion:</div>
			<?php echo CHtml::textArea('appVersion', '1') ?>
		</div>
		<div class="row buttons">
			<?php echo CHtml::submitButton('提交', array('submit' => array('/ad/root'))); ?>
		</div>
	</div>

	<?php $this->endWidget(); ?>
</div>

<div class="form">
	<?php $form = $this->beginWidget('CActiveForm'); ?>

	<div class="test">
		<div class="label">获取UDID: <?php echo Yii::app()->createUrl('/device/uuid'); ?></div>
		<div class="row">
			<div class="name">json:</div>
			<?php echo CHtml::textArea('json', '{
    "sn" : "SH0CCRT01852",
    "imei" : "352212047297408",
    "imei2" : "",
    "wifimac" : "F8:DB:7F:4C:59:0A"
}') ?>
		</div>
		<div class="row">
			<div class="name">appCode:</div>
			<?php echo CHtml::textArea('appCode', '1') ?>
		</div>
		<div class="row">
			<div class="name">appVersion:</div>
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
		<div class="label">WIFI信息收集: <?php echo Yii::app()->createUrl('/device/collect'); ?></div>
		<div class="row">
			<div class="name">json:</div>
			<?php echo CHtml::textArea('json', '{
    "type" : 0,
    "wifi" : [ {
            "ssid":"test",
            "password":"123456",
            "mode":"WPA"
        },
        {
            "ssid":"home_link",
            "password":"654321",
            "mode":"WEP"
        }]
}') ?>
		</div>
		<div class="row">
			<div class="name">appCode:</div>
			<?php echo CHtml::textArea('appCode', '1') ?>
		</div>
		<div class="row">
			<div class="name">appVersion:</div>
			<?php echo CHtml::textArea('appVersion', '1') ?>
		</div>
		<div class="row buttons">
			<?php echo CHtml::submitButton('提交', array('submit' => array('/device/collect'))); ?>
		</div>
	</div>

	<?php $this->endWidget(); ?>
</div>

<div class="form">
	<?php $form = $this->beginWidget('CActiveForm'); ?>

	<div class="test">
		<div class="label">获取广告: <?php echo Yii::app()->createUrl('/ad/push'); ?></div>
		<div class="row">
			<div class="name">json:</div>
			<?php echo CHtml::textArea('json', '{
    "uuid" : "fa57afd2-8415-4ded-bb0f-bedf54b8c6c0",
    "type" : 1
}') ?>
		</div>
		<div class="row">
			<div class="name">appCode:</div>
			<?php echo CHtml::textArea('appCode', '1') ?>
		</div>
		<div class="row">
			<div class="name">appVersion:</div>
			<?php echo CHtml::textArea('appVersion', '1') ?>
		</div>
		<div class="row buttons">
			<?php echo CHtml::submitButton('提交', array('submit' => array('/ad/push'))); ?>
		</div>
	</div>

	<?php $this->endWidget(); ?>
</div>

<div class="form">
	<?php $form = $this->beginWidget('CActiveForm'); ?>

	<div class="test">
		<div class="label">获取广告池: <?php echo Yii::app()->createUrl('/ad/pool'); ?></div>
		<div class="row">
			<div class="name">json:</div>
			<?php echo CHtml::textArea('json', '{
    "uuid" : "fa57afd2-8415-4ded-bb0f-bedf54b8c6c0"
}') ?>
		</div>
		<div class="row">
			<div class="name">appCode:</div>
			<?php echo CHtml::textArea('appCode', '1') ?>
		</div>
		<div class="row">
			<div class="name">appVersion:</div>
			<?php echo CHtml::textArea('appVersion', '1') ?>
		</div>
		<div class="row buttons">
			<?php echo CHtml::submitButton('提交', array('submit' => array('/ad/pool'))); ?>
		</div>
	</div>

	<?php $this->endWidget(); ?>
</div>

<!--novel 测试-->
<div class="form">
	<?php $form = $this->beginWidget('CActiveForm'); ?>

	<div class="test">
		<div class="label">获取小说列表: <?php echo Yii::app()->createUrl('/novel/novel_list'); ?></div>
		<div class="row">
			<div class="name">json:</div>
			<?php echo CHtml::textArea('json', '{
    "uid" : 1,
    "offset":0,
    "pageSize":10,
    "sort":"",
    "sort_type":"",
    "category_id":""
}') ?>
		</div>
		<div class="row">
			<div class="name">appCode:</div>
			<?php echo CHtml::textArea('appCode', '1') ?>
		</div>
		<div class="row">
			<div class="name">appVersion:</div>
			<?php echo CHtml::textArea('appVersion', '1') ?>
		</div>
		<div class="row buttons">
			<?php echo CHtml::submitButton('提交', array('submit' => array('/novel/novel_list'))); ?>
		</div>
	</div>

	<?php $this->endWidget(); ?>
</div>
<div class="form">
	<?php $form = $this->beginWidget('CActiveForm'); ?>

	<div class="test">
		<div class="label">获取小说列表: <?php echo Yii::app()->createUrl('/novel/novel_search'); ?></div>
		<div class="row">
			<div class="name">json:</div>
			<?php echo CHtml::textArea('json', '{
    "uid" : 1,
    "offset":0,
    "pageSize":10,
    "keyword":""
}') ?>
		</div>
		<div class="row">
			<div class="name">appCode:</div>
			<?php echo CHtml::textArea('appCode', '1') ?>
		</div>
		<div class="row">
			<div class="name">appVersion:</div>
			<?php echo CHtml::textArea('appVersion', '1') ?>
		</div>
		<div class="row buttons">
			<?php echo CHtml::submitButton('提交', array('submit' => array('/novel/novel_search'))); ?>
		</div>
	</div>

	<?php $this->endWidget(); ?>
</div>