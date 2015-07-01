<div class="form">

	<?php
	if (isset($model) && $model) {
		$form = $this->beginWidget('bootstrap3.widgets.TbActiveForm', array(
			'type' => 'horizontal',
			'id' => 'dream-push-task-form',
			'enableAjaxValidation' => false,
		)); ?>
		<fieldset>
			<?php echo $form->errorSummary($model); ?>
			<?php echo $form->dropDownListRow($model, 'push_type', array(
				1 => 'push',
				2 => '插屏'
			), array(
				'empty' => '-请选择类型-',
				'class' => 'form-control',
				'style' => 'width:200px',
			)); ?>
			<?php echo $form->textFieldRow($model, 'push_title', array(
				'placeholder' => '请输入push标题',
				'style' => 'width:200px'
			)); ?>
			<?php echo $form->textAreaRow($model, 'push_description', array(
				'placeholder' => '请输入push描述',
				'style' => 'width:400px;height:100px;'
			)); ?>
			<?php
			if ($model->isNewRecord) {
				echo $form->dropDownListRow($model, 'push_ad_id', DreamAdPackage::model()->getAdList(), array(
					'empty' => '-请选择关联广告-',
					'class' => 'form-control',
					'style' => 'width:200px',
				));
			} else {
				echo $form->dropDownListRow($model, 'push_ad_id', DreamAdPackage::model()->getAdList(), array(
					'empty' => '-请选择关联广告-',
					'class' => 'form-control',
					'style' => 'width:200px',
					'disabled' => 'disabled',
				));
			} ?>
			<?php echo $form->checkBoxRow($model, 'push_status'); ?>
		</fieldset>

		<div class="form-actions">
			<?php $this->widget('bootstrap3.widgets.TbButton', array(
				'buttonType' => 'submit',
				'type' => 'primary',
				'label' => $model->isNewRecord ? 'Create' : 'Save'
			)); ?>
		</div>

		<?php $this->endWidget();
	} ?>
</div>