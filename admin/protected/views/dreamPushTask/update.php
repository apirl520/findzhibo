<?php if (isset($model) && $model) { ?>
	<h4>修改推送规则：<?php echo $model->task["app_name"]; ?></h4>
	<?php $this->renderPartial('_form', array('model' => $model));
} ?>

