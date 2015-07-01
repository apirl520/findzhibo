<?php if (isset($model) && $model) { ?>
	<h4>添加推送规则</h4>
	<?php $this->renderPartial('_form', array('model' => $model));
} ?>