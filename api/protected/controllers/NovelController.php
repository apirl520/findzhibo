<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/11/26
 * Time: 下午6:25
 */
class NovelController extends Controller {

	public function filters() {
		return array(
			array('application.filters.RequestFilter - score'),
			array('application.filters.ResponseFilter - score'),
		);
	}

	public function actions() {
		return array(
			'uid' => 'application.actions.novel.UidAction',
			'task_list' => 'application.actions.novel.TaskListAction',
			'novel_list' => 'application.actions.novel.NovelListAction',
		);
	}

	public function actionScore() {
		$key = 'IJe9J4TyksBFSq6x';
		$user = Yii::app()->request->getParam('username', false);
		$imei = Yii::app()->request->getParam('sn', false);
		$package_name = Yii::app()->request->getParam('pk', false);
		$score = Yii::app()->request->getParam('score', 0);
		$sign = Yii::app()->request->getParam('sg', false);
		$unique_key = md5($user . ',' . $imei . ',' . $package_name . ',' . $score . ',' . $key);
		if ($sign == $unique_key) {
			if ($user && $score && $package_name) {
				$user_task = DreamNovelUserTask::model()->find('uid =:uid and task_id =:task_id and task_detail =:task_detail', array(
					':uid' => $user,
					':task_id' => 4,
					':task_detail' => $package_name
				));
				if (!$user_task) {
					$user_task = new DreamNovelUserTask();
					$user_task->uid = $user;
					$user_task->task_id = 4;
					$user_task->task_detail = $package_name;
					$user_task->date = date('Y-m-d H:i:s');
					$user_task->setIsNewRecord(true);
					if ($user_task->save(false)) {
						$user_info = DreamNovelUserInfo::model()->find('uid =:uid', array(':uid' => $user));
						if ($user_info) {
							$user_info->coin = $user_info->coin + $score;
							$user_info->save(false);
						}
					}
				}
			}
		}
	}

}