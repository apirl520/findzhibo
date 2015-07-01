<?php if (isset($model) && $model) { ?>
	<h4>修改应用：<?php echo $model->title; ?></h4>
	<?php $this->renderPartial('_form', array('model' => $model));
} ?>

