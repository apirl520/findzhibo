<?php if (isset($model) && $model) { ?>
	<h4>添加广告包</h4>
	<?php $this->renderPartial('_form', array('model' => $model));
} ?>