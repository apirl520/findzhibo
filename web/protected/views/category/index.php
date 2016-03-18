<div class="container">
	<ul class="nav nav-pills">
		<?php
		if (isset($source_list) && $source_list) {
			foreach ($source_list as $source_each) {
				if (isset($source_id)) {
					if ($source_id == $source_each['source_id']) {
						echo CHtml::openTag('li', array('class' => 'active'));
					} else {
						echo CHtml::openTag('li');
					}
				} else {
					echo CHtml::openTag('li');
				}
				echo CHtml::link($source_each['title'], Yii::app()->createUrl('category/index', array('source_id' => $source_each['source_id'])));
				echo CHtml::closeTag('li');
			}
		}
		?>
	</ul>
</div>

<div class="container">
	<ul class="category_list">
		<?php
		if (isset($category_list) && $category_list) {
			foreach ($category_list as $category_each) {
				echo CHtml::openTag('li', array('class' => 'category_card'));
				echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '../../data/gameShow/' . $category_each->image, $category_each->name, array('height' => '195px')), Yii::app()->createUrl('category/list', array('category_id' => $category_each->id)));
				echo CHtml::openTag('div', array('class' => 'category_title'));
				echo $category_each->name;
				echo CHtml::closeTag('div');
				echo CHtml::closeTag('li');
			}
		}
		?>
	</ul>
</div>