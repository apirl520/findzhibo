<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/7/5
 * Time: 下午11:11
 */
class RootAction extends BaseAction {

	public function run() {
		Yii::trace(get_class($this) . '.run()');
		$controller = parent::run();
		$json = isset($this->request->json) ? $this->request->json : false;
		$app_code = isset($this->request->appCode) ? $this->request->appCode : false;
		$app_version = isset($this->request->appVersion) ? $this->request->appVersion : false;
		if ($json && $app_code && $app_version) {
			$ad_list = array();
			$criteria = new CDbCriteria();
			$criteria->condition = 'show_flag =:show_flag';
			$criteria->params = array(':show_flag' => 2);
			$criteria->order = 'show_order desc';
			$ad_packages = DreamAdPackage::model()->findAll($criteria);
			foreach ($ad_packages as $key => $ad_package) {
				$ad_list[$key]['name'] = $ad_package->app_name;
				$ad_list[$key]['desc'] = $ad_package->description;
				$ad_list[$key]['packageName'] = $ad_package->package_name;
				$ad_list[$key]['imageUrl'] = Yii::app()->params['host'] . $ad_package->icon_url;
				$apkUrl = strpos($ad_package->download_url, '://') ? $ad_package->download_url : Yii::app()->params['host'] . $ad_package->download_url;
				$ad_list[$key]['apkUrl'] = $apkUrl;
				$ad_list[$key]['size'] = Util::formatFileSize($ad_package->file_size);
				$ad_list[$key]['buttonName'] = '下载';
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