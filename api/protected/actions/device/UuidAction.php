<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/5/21
 * Time: 下午7:05
 */
class UuidAction extends BaseAction {

	public function run() {
		Yii::trace(get_class($this) . '.run()');
		$controller = parent::run();
		$json = isset($this->request->json) ? $this->request->json : false;
		$app_code = isset($this->request->appCode) ? $this->request->appCode : false;
		if ($json && $app_code) {
			$uuid = false;
			$sn = isset($json->sn) ? $json->sn : false;
			$imei = isset($json->imei) ? $json->imei : false;
			$imei2 = isset($json->imei2) ? $json->imei2 : false;
			$wifimac = isset($json->wifimac) ? $json->wifimac : false;
			if ($sn || $imei || $imei2 || $wifimac) {
				$criteria = new CDbCriteria();
				$criteria->condition = 'sn =:sn and imei =:imei and imei2 =:imei2 and wifimac =:wifimac';
				$criteria->params = array(
					':sn' => $sn,
					':imei' => $imei,
					':imei2' => $imei2,
					':wifimac' => $wifimac
				);
				$device_info = DreamDevice::model()->find($criteria);
				if ($device_info) {
					$uuid_info = DreamDeviceUuid::model()->find('device_id =:device_id', array(':device_id' => $device_info->id));
					if ($uuid_info) {
						$uuid = $uuid_info->uuid;
					} else {
						$uuid = DreamDeviceUuid::model()->createUuid($app_code, $device_info->id);
					}
				} else {
					$device_info = new DreamDevice();
					$device_info->sn = $sn;
					$device_info->imei = $imei;
					$device_info->imei2 = $imei2;
					$device_info->wifimac = $wifimac;
					$device_info->setIsNewRecord(true);
					if ($device_info->save(false)) {
						$uuid = DreamDeviceUuid::model()->createUuid($app_code, $device_info->id);
					}
				}
				if ($uuid) {
					return $this->response->uuid = $uuid;
				} else {
					return $this->response->code = 404;
				}
			}
		}
		return $this->response->code = 500;
	}
}