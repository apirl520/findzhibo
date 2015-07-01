<div class="form">

	<?php
	if (isset($model) && $model) {
		$form = $this->beginWidget('bootstrap3.widgets.TbActiveForm', array(
			'type' => 'horizontal',
			'id' => 'dream-app-form',
			'enableAjaxValidation' => false,
		)); ?>
		<fieldset>
			<?php echo $form->errorSummary($model); ?>
			<?php echo $form->dropDownListRow($model, 'app_id', $this->getAppIds(), array(
				'empty' => '-请选择应用-',
				'class' => 'form-control',
				'style' => 'width:200px',
				'onchange' => 'showAppTitle()'
			)); ?>
			<div id="app_title" class="no-display">
				<?php echo $form->textFieldRow($model, 'title', array(
					'class' => 'form-control',
					'style' => 'width:200px;'
				)); ?>
			</div>
			<?php echo $form->textFieldRow($model, 'app_version', array(
				'placeholder' => '请输入版本号',
				'style' => 'width:200px'
			)); ?>
			<?php echo $form->checkBoxRow($model, 'show_flag'); ?>
			<?php echo $form->checkBoxRow($model, 'ad_switch'); ?>
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
<style type="text/css">
	.no-display {
		display: none;
	}
</style>
<script type="text/javascript">
	function showAppTitle() {
		var $id = $('#DreamApp_app_id').val();
		if ($id == -1) {
			$('#app_title').removeClass('no-display');
		} else {
			$('#app_title').addClass('no-display');
		}
	}
</script>
