<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/3/5
 * Time: 上午10:18
 */
class CategoryController extends Controller {

	public $layout = '//layouts/main';

	public function actionIndex() {
		$source_id = Yii::app()->request->getParam('source_id', 0);
		$source_list = array(0 => array('title' => '全部', 'source_id' => 0));
		$source = ShowResource::model()->findAll();
		if ($source) {
			foreach ($source as $key => $source_each) {
				$source_list[$key + 1]['title'] = $source_each->name;
				$source_list[$key + 1]['source_id'] = $source_each->id;
			}
		}
		$criteria = new CDbCriteria();
		if ($source_id) {
			$criteria->condition = 'source_id =:source_id';
			$criteria->params = array(':source_id' => $source_id);
		}
		$category_list = ShowCategory::model()->findAll($criteria);
		$this->render('index', array(
			'source_id' => $source_id,
			'source_list' => $source_list,
			'category_list' => $category_list
		));
	}

	public function actionList() {
		$artistLists = $category_info = $category_resource_info = array();
		$category_id = Yii::app()->request->getParam('category_id', 0);
		if ($category_id) {
			$category_info = ShowCategory::model()->find('id =:id', array(':id' => $category_id));
			$category_resource_info = ShowResource::model()->find('id =:id', array(':id' => $category_info->source_id));
			$artistIds = array();
			$criteria = new CDbCriteria();
			$criteria->condition = 'category_id =:category_id';
			$criteria->params = array(':category_id' => $category_id);
			$artistRelativeIds = ShowCategoryRelative::model()->findAll($criteria);
			foreach ($artistRelativeIds as $artistRelativeId) {
				$artistIds[] = $artistRelativeId->artist_id;
			}
			$criteria = new CDbCriteria();
			$criteria->addInCondition('id', $artistIds);
			$criteria->addCondition('`on` = 1');
			$criteria->order = 'view desc';
			$artistLists = ShowArtist::model()->findAll($criteria);
		}
		$this->render('list', array(
			'artistLists' => $artistLists,
			'category_info' => $category_info,
			'category_resource_info' => $category_resource_info
		));
	}
}