<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/11/27
 * Time: 上午12:47
 */
class DreamNovelUserInfo extends ODreamNovelUserInfo {

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function getCoin($uid) {
		$user_info = $this->find('uid =:uid', array(':uid' => $uid));
		if ($user_info) {
			return $user_info->coin;
		}
		return 0;
	}

	public function updateCoin($uid, $task_id, $type) {
		$user_info = $this->find('uid =:uid', array(':uid' => $uid));
		if ($user_info) {
			switch ($type) {
				case 'plus':
					$task_info = DreamNovelTask::model()->find('id =:id', array(':id' => $task_id));
					if ($task_info) {
						$user_info->coin = $user_info->coin + $task_info->pay;
						if ($user_info->save(false)) {
							return true;
						}
					}
					break;
				case 'minus':
					$user_info->coin = $user_info->coin - $task_id;
					if ($user_info->save(false)) {
						return true;
					}
					break;
				default:
					break;
			}
		}
		return false;
	}

}