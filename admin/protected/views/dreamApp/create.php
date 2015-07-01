<?php if (isset($model) && $model) { ?>
	<h4>添加应用版本</h4>
	<?php $this->renderPartial('_form', array('model' => $model));
} ?>