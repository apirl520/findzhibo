<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/5/27
 * Time: 下午8:29
 */
class DreamAdPackage extends ODreamAdPackage {

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function getAdPackageInfo($ad_id) {
		return $this->findByPk($ad_id);
	}
}