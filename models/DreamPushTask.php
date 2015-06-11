<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/6/5
 * Time: 下午5:38
 */
class DreamPushTask extends ODreamPushTask {

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function getPushTasks($push_ids, $push_type) {
		$push_tasks = array();
		$criteria = new CDbCriteria();
		$criteria->condition = 'push_type =:push_type and push_status =:push_status';
		$criteria->params = array(':push_type' => $push_type, ':push_status' => 1);
		if ($push_ids) {
			$criteria->addInCondition('id', $push_ids);
		}
		//软件名称、软件包名、下载地址、图标的地址、宣传图片的地址、广告语(两句话,通知栏展示)
		$tasks = $this->findAll($criteria);
		if ($tasks) {
			foreach ($tasks as $key => $task) {
				$push_ad_info = DreamAdPackage::model()->getAdPackageInfo($task->push_ad_id);
				$push_tasks[$key]['app_name'] = $push_ad_info->app_name;
				$push_tasks[$key]['title'] = $task->push_title;
				$push_tasks[$key]['content'] = $task->push_description;
				$push_tasks[$key]['package_name'] = $push_ad_info->package_name;
				$push_tasks[$key]['icon_url'] = Yii::app()->params['host'] . $push_ad_info->icon_url;
				$push_tasks[$key]['cover_url'] = Yii::app()->params['host'] . $push_ad_info->image_url;
				$download_url = strpos($push_ad_info->download_url, 'http://') === false ? Yii::app()->params['host'] . $push_ad_info->download_url : $push_ad_info->download_url;
				$push_tasks[$key]['download_url'] = $download_url;
			}
		}
		return $push_tasks;
	}
}