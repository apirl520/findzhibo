<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/5/27
 * Time: 下午9:01
 */
class PushAction extends BaseAction {

	public function run() {
		Yii::trace(get_class($this) . '.run()');
		$controller = parent::run();
		$json = isset($this->request->json) ? $this->request->json : false;
		$app_code = isset($this->request->appCode) ? $this->request->appCode : false;
		$app_version = isset($this->request->appVersion) ? $this->request->appVersion : false;
		if ($json && $app_code && $app_version) {
			//获取自有广告 push type 1:push 2:screen
			$push_type = isset($json->type) ? $json->type : 1;
			//检查当前应用是否有推送任务
			$push_ids = DreamPushAppRelative::model()->checkPushStatus($app_code, $push_type);
			//获取当前有效的广告推送任务
			$push_ads = DreamPushTask::model()->getPushTasks($push_ids, $push_type);

			//获取第三方广告平台广告
			$uuid = isset($json->uuid) ? $json->uuid : false;
			$imei = isset($json->imei) ? $json->imei : false;
			$mssp_deviceinfo = isset($json->mssp_deviceinfo) ? $json->mssp_deviceinfo : false;

			//获取百度系列广告
			$push_ads = Util::getBaiduAd($uuid, $imei, $mssp_deviceinfo, $push_ads);

			$this->response->time = 3600 * 4;
			if ($push_ads) {
				$this->response->push = array_values($push_ads);
			} else {
				$this->response->push = null;
			}
			return $this->response->code = 200;
		}
		return $this->response->code = 500;
	}
}