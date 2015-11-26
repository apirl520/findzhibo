<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/11/27
 * Time: 上午12:46
 */
class DreamNovelCategory extends ODreamNovelCategory {

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function getRecommendNovel($gender, $category) {
		$criteria = new CDbCriteria();
		//优先分类获取
		if ($category) {
			$category_id = json_decode($category, true);
		} else {
			$category_id = array();
			$criteria->condition = 'gender =:gender';
			$criteria->params = array(':gender' => $gender);
			$category_info = $this->findAll($criteria);
			foreach ($category_info as $category_info_item) {
				$category_id[] = $category_info_item->id;
			}
		}
		return DreamNovel::model()->getNovelDetail($category_id, 'recommend');
	}

}