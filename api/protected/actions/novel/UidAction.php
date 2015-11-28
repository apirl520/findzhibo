<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/11/26
 * Time: 下午6:30
 */
class UidAction extends BaseAction {

	/**
	 * @return int
	 */
	public function run() {
		Yii::trace(get_class($this) . '.run()');
		$controller = parent::run();
		$json = isset($this->request->json) ? $this->request->json : false;
		$app_code = isset($this->request->appCode) ? $this->request->appCode : false;
		$app_version = isset($this->request->appVersion) ? $this->request->appVersion : false;
		if ($json && $app_code && $app_version) {
			$uid = false;
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
						$uid = $uuid_info->id;
					} else {
						$uid = DreamDeviceUuid::model()->createUid($app_code, $device_info->id);
					}
				} else {
					$device_info = new DreamDevice();
					$device_info->sn = $sn;
					$device_info->imei = $imei;
					$device_info->imei2 = $imei2;
					$device_info->wifimac = $wifimac;
					$device_info->setIsNewRecord(true);
					if ($device_info->save(false)) {
						$uid = DreamDeviceUuid::model()->createUid($app_code, $device_info->id);
					}
				}
				if ($uid) {
					return $this->response->uid = $uid;
				} else {
					return $this->response->code = 404;
				}
			} else {
				$uid = isset($json->uid) ? $json->uid : false;
				$gender = isset($json->gender) ? $json->gender : false;
				$category_id = isset($json->category_id) ? $json->category_id : false;
				if ($uid && $gender) {
					$novel_user_info = DreamNovelUserInfo::model()->find('uid =:uid', array(':uid' => $uid));
					if ($novel_user_info) {
						$novel_user_info->category_id = $category_id;
						$novel_user_info->save(false);
					} else {
						$novel_user_info = new DreamNovelUserInfo();
						$novel_user_info->uid = $uid;
						$novel_user_info->gender = $gender;
						$novel_user_info->category_id = $category_id;
						$novel_user_info->setIsNewRecord(true);
						$novel_user_info->save(false);
					}
					$this->response->coin = $novel_user_info->coin;
					return $this->response->recommend = DreamNovelCategory::model()->getRecommendNovel($gender, $category_id);
				}
			}
		}
		return $this->response->code = 500;
	}
}