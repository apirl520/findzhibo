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

	public function rules() {
		return array(
			array('push_type, push_title, push_description, push_ad_id, push_status', 'required'),
			array('push_type, push_ad_id, push_status, push_limit', 'numerical', 'integerOnly' => true),
			array('push_title', 'length', 'max' => 120),
			array('push_description', 'length', 'max' => 255),
			array(
				'id, push_type, push_title, push_description, push_ad_id, push_status, push_limit, ctime',
				'safe',
				'on' => 'search'
			),
		);
	}

	public function relations() {
		return array(
			'task' => array(self::BELONGS_TO, 'DreamAdPackage', 'push_ad_id')
		);
	}

	public function attributeLabels() {
		return array(
			'push_type' => '类型',
			'push_title' => 'push标题',
			'push_description' => 'push内容',
			'push_ad_id' => '关联广告',
			'push_status' => 'push状态',
		);
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
			$host = Util::getHost();
			foreach ($tasks as $key => $task) {
				$push_ad_info = DreamAdPackage::model()->getAdPackageInfo($task->push_ad_id);
				if ($push_ad_info) {
					$push_tasks[$key]['app_name'] = $push_ad_info->app_name;
					$push_tasks[$key]['title'] = $task->push_title;
					$push_tasks[$key]['content'] = $task->push_description;
					$push_tasks[$key]['package_name'] = $push_ad_info->package_name;
					$push_tasks[$key]['icon_url'] = $host . $push_ad_info->icon_url;
					$push_tasks[$key]['cover_url'] = $push_ad_info->image_url ? $host . $push_ad_info->image_url : "";
					$download_url = strpos($push_ad_info->download_url, '://') ? $push_ad_info->download_url : $host . $push_ad_info->download_url;
					$push_tasks[$key]['download_url'] = $download_url;
				}
			}
		}
		return $push_tasks;
	}
}