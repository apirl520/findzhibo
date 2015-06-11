<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/5/27
 * Time: 下午8:29
 */
class DreamApp extends ODreamApp {

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function checkOpenStatus($app_id, $app_version) {
		$app_info = $this->find('id =:id and version =:version', array(':id' => $app_id, ':version' => $app_version));
		if ($app_info) {
			if ($app_info->ad_switch) {
				return true;
			}
		}
		return false;
	}
}