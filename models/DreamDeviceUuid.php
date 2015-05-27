<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/5/27
 * Time: 下午8:30
 */
class DreamDeviceUuid extends ODreamDeviceUuid {

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function createUuid($app_id, $device_id) {
		$uuid = new DreamDeviceUuid();
		$uuid->app_id = $app_id;
		$uuid->uuid = UUID::v4();
		$uuid->device_id = $device_id;
		$uuid->setIsNewRecord(true);
		if ($uuid->save(false)) {
			return $uuid->uuid;
		}
		return false;
	}
}