<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/6/5
 * Time: 下午5:17
 */
class DreamPushAppRelative extends ODreamPushAppRelative {

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @param $push_type
	 * 广告展示类型
	 * @param $app_id
	 * 广告载体应用ID
	 * @return array
	 * 定向推送广告ID数组，若不存在则推送全部广告
	 */
	public function checkPushStatus($app_id, $push_type) {
		$push_ids = array();
		$status = $this->findAll('app_id =:app_id and push_type =:push_type', array(
			':app_id' => $app_id,
			':push_type' => $push_type
		));
		if ($status) {
			foreach ($status as $item) {
				$push_ids[] = $item->push_id;
			}
		}
		return $push_ids;
	}
}