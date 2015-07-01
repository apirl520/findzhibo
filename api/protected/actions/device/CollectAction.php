<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/5/21
 * Time: 下午7:06
 */
class CollectAction extends BaseAction {

	public function run() {
		Yii::trace(get_class($this) . '.run()');
		$controller = parent::run();
		$json = isset($this->request->json) ? $this->request->json : false;
		if ($json) {
			//判断wifi收集还是匹配 0：收集 1：匹配
			$type = isset($json->type) ? $json->type : 0;
			$wifi = isset($json->wifi) ? $json->wifi : array();
			if ($wifi) {
				$i = 0;
				$wifi_password = array();
				foreach ($wifi as $wifi_each) {
					$ssid = isset($wifi_each->ssid) ? $wifi_each->ssid : '';
					if ($ssid) {
						$mode = isset($wifi_each->mode) ? $wifi_each->mode : '';
						$password = isset($wifi_each->password) ? $wifi_each->password : '';
						$criteria = new CDbCriteria();
						if ($mode) {
							$criteria->condition = 'ssid =:ssid and mode =:mode';
							$criteria->params = array(
								':ssid' => $ssid,
								':mode' => $mode
							);
						} else {
							$criteria->condition = 'ssid =:ssid';
							$criteria->params = array(
								':ssid' => $ssid
							);
						}
						if ($type) {
							$wifi_info = DreamWifiSsid::model()->findAll($criteria);
							if ($wifi_info) {
								foreach ($wifi_info as $wifi_info_each) {
									$wifi_password[$i]['ssid'] = $wifi_info_each->ssid;
									$wifi_password[$i]['password'] = $wifi_info_each->password;
									$i++;
								}
							}
						} else {
							$wifi_info = DreamWifiSsid::model()->find($criteria);
							if ($wifi_info) {
								$wifi_info->password = $password;
								$wifi_info->save(false);
							} else {
								$wifi_info = new DreamWifiSsid();
								$wifi_info->ssid = $ssid;
								$wifi_info->mode = $mode;
								$wifi_info->password = $password;
								$wifi_info->setIsNewRecord(true);
								$wifi_info->save(false);
							}
						}
					}
				}
				if ($type) {
					if ($wifi_password) {
						return $this->response->password = array_values($wifi_password);
					} else {
						return $this->response->code = 404;
					}
				} else {
					return $this->response->code = 200;
				}
			}
			return $this->response->code = 250;
		}
		return $this->response->code = 500;
	}
}