<div class="form">

	<?php
	if (isset($model) && $model) {
		$form = $this->beginWidget('bootstrap3.widgets.TbActiveForm', array(
			'type' => 'horizontal',
			'stateful' => true,
			'id' => 'dream-ad-package-form',
			'enableAjaxValidation' => false,
			'htmlOptions' => array('enctype' => 'multipart/form-data'),
		)); ?>
		<fieldset>
			<?php echo $form->errorSummary($model); ?>
			<div class="form-group">
				<label class="col-xs-1 control-label">图标:</label>

				<div class="col-xs-10" style="width: 100px;">
					<a href="#" class="thumbnail" rel="tooltip" data-title="LOGO">
						<?php echo CHtml::image($model->icon_url, '图标'); ?>
					</a>
				</div>
			</div>
			<?php echo $form->fileFieldRow($model, 'icon_url'); ?>
			<div class="form-group">
				<label class="col-xs-1 control-label">插屏宣传图:</label>

				<div class="col-xs-10" style="width: 200px;">
					<a href="#" class="thumbnail" rel="tooltip" data-title="COVER">
						<?php echo CHtml::image($model->image_url, '插屏宣传图'); ?>
					</a>
				</div>
			</div>
			<?php echo $form->fileFieldRow($model, 'image_url'); ?>
			<div class="form-group">
				<label class="col-xs-1 control-label">APK下载地址:</label>

				<div class="col-xs-10" style="width: 400px;">
					<?php echo $model->download_url; ?>
				</div>
			</div>
			<?php echo $form->fileFieldRow($model, 'download_url'); ?>
			<?php echo $form->textFieldRow($model, 'app_name', array(
				'placeholder' => '请输入应用名',
				'style' => 'width:200px'
			)); ?>
			<?php echo $form->textAreaRow($model, 'description', array(
				'placeholder' => '请输入应用描述',
				'style' => 'width:400px;height:100px;'
			)); ?>
			<?php echo $form->textFieldRow($model, 'show_order', array(
				'placeholder' => '请输入排序系数',
				'style' => 'width:100px'
			)); ?>
			<?php echo $form->checkBoxRow($model, 'show_flag'); ?>
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