<div class="container">
	<?php if (isset($category_resource_info) && $category_resource_info && isset($category_info) && $category_info) {
		echo CHtml::openTag('div', array('class' => 'breadcrumb'));
		echo CHtml::link('首页', Yii::app()->createUrl('site/index'));
		echo ' / ';
		echo CHtml::link($category_resource_info->name, Yii::app()->createUrl('category/index', array('source_id' => $category_resource_info->id)));
		echo ' / ';
		echo $category_info->name;
		echo CHtml::closeTag('div');
	} ?>
	<ul class="artist_list">
		<?php
		if (isset($artistLists) && $artistLists) {
			foreach ($artistLists as $artistList) {
				echo CHtml::openTag('li');
				echo CHtml::openTag('div', array('class' => 'artist_card'));
				echo CHtml::link(CHtml::image($artistList->cover), $artistList->url, array('target' => '_blank')); ?>
				<div class="artist_card_info">
					<div class="artist_card_title">
						<?php echo $artistList->title; ?>
					</div>
					<div class="artist_card_view">
						<?php echo Util::NumFormat($artistList->view); ?>
					</div>
					<div class="artist_card_name">
						<?php echo $artistList->name; ?>
					</div>
				</div>
				<?php
				echo CHtml::openTag('div');
				echo CHtml::closeTag('li');
			}
		} ?>
	</ul>
</div>