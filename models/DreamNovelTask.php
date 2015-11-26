<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/11/27
 * Time: 上午12:47
 */
class DreamNovelTask extends ODreamNovelTask {

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function getTaskList() {
		$taskList = array();
		$criteria = new CDbCriteria();
		$criteria->condition = 'status =:status';
		$criteria->params = array(':status' => 1);
		$task_list = $this->findAll($criteria);
		foreach ($task_list as $key => $task_list_item) {
			$taskList[$key]['id'] = $task_list_item->id;
			$taskList[$key]['task'] = $task_list_item->task;
			$taskList[$key]['is_daily'] = $task_list_item->is_daily;
			$taskList[$key]['pay'] = $task_list_item->pay;
		}
		return $taskList;
	}

	public function checkDaily($task_id) {
		$task = $this->find('id =:id', array(':id' => $task_id));
		if ($task) {
			return $task->is_daily;
		}
		return 0;
	}

}