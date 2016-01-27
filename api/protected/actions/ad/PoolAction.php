<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/6/8
 * Time: 下午5:27
 */
class PoolAction extends BaseAction {

	public function run() {
		Yii::trace(get_class($this) . '.run()');
		$controller = parent::run();
		$json = isset($this->request->json) ? $this->request->json : false;
		if ($json) {
			$host = Util::getHost();
			$ad_list = array();
			$criteria = new CDbCriteria();
			$criteria->condition = 'show_flag =:show_flag';
			$criteria->params = array(':show_flag' => 1);
			$criteria->order = 'show_order desc';
			$ad_packages = DreamAdPackage::model()->findAll($criteria);
			foreach ($ad_packages as $key => $ad_package) {
				$ad_list[$key]['name'] = $ad_package->app_name;
				$ad_list[$key]['desc'] = $ad_package->description;
				$ad_list[$key]['packageName'] = $ad_package->package_name;
				$ad_list[$key]['imageUrl'] = $host . $ad_package->icon_url;
				$apkUrl = strpos($ad_package->download_url, '://') ? $ad_package->download_url : $host . $ad_package->download_url;
				$ad_list[$key]['apkUrl'] = $apkUrl;
				$ad_list[$key]['size'] = Util::formatFileSize($ad_package->file_size);
				$ad_list[$key]['buttonName'] = '下载';
			}
			//get baidu cpd AD
			$uuid = isset($json->uuid) ? $json->uuid : false;
			$imei = isset($json->imei) ? $json->imei : false;
			if ($uuid || $imei) {
//				$ad_list = Util::getBaiduAd($uuid, $imei, array(), $ad_list);
			}
			if ($ad_list) {
				$this->response->json = array_values($ad_list);
			} else {
				$this->response->json = null;
			}
			return $this->response->code = 200;
		}
		return $this->response->code = 500;
	}
}