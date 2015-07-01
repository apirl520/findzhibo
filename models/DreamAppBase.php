<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/6/26
 * Time: 上午11:09
 */
class DreamAppBase extends ODreamAppBase {

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function getAppTitle($app_id) {
		$app_info = $this->findByPk($app_id);
		return $app_info->title;
	}

	public function setAppTitle($app_title) {
		$app_info = $this->find('title =:title', array(':title' => $app_title));
		if ($app_info) {
			return $app_info->id;
		} else {
			$this->setIsNewRecord(true);
			$this->title = $app_title;
			$this->save(false);
			return $this->primaryKey;
		}
	}

	public function getAppBaseList() {
		return CHtml::listData($this->findAll('id > 0'), 'id', 'title');
	}
}