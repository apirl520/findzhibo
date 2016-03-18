<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/11/26
 * Time: 下午6:30
 */
class TaskListAction extends BaseAction {

	public function run() {
		Yii::trace(get_class($this) . '.run()');
		$controller = parent::run();
		$json = isset($this->request->json) ? $this->request->json : false;
		$appCode = isset($this->request->appcode) ? $this->request->appcode : 1;
		if ($json) {
			$uid = isset($json->uid) ? $json->uid : false;
			$task_id = isset($json->task_id) ? $json->task_id : false;
			if ($uid && $task_id) {
				//task finish
				$today = date('Y-m-d');
				$task_is_daily = DreamNovelTask::model()->checkDaily($task_id);
				if ($task_is_daily) {
					$taskRecord = DreamNovelUserTask::model()->find('uid=:uid and task_id =:task_id and date =:date', array(
						':uid' => $uid,
						':task_id' => $task_id,
						':date' => $today
					));
					if ($taskRecord) {
						$this->response->code = 250;
					} else {
						$taskRecord = new DreamNovelUserTask();
						$taskRecord->uid = $uid;
						$taskRecord->task_id = $task_id;
						$taskRecord->task_detail = 0;
						$taskRecord->date = $today;
						$taskRecord->setIsNewRecord(true);
						if ($taskRecord->save(false)) {
							$status = DreamNovelUserInfo::model()->updateCoin($uid, $task_id, 'plus');
							if ($status) {
								$this->response->code = 200;
							}
						} else {
							$this->response->code = 404;
						}
					}
				} else {
					$novel_id = isset($json->novel_id) ? $json->novel_id : false;
					if ($novel_id) {
						$novel_info = DreamNovel::model()->find('id =:id', array(':id' => $novel_id));
						if ($novel_info) {
							if ($appCode == 2) {
								$this->response->download = Util::getHost() . '/data/novel/' . $novel_info->download;
							}
							$taskRecord = DreamNovelUserTask::model()->find('uid=:uid and task_id =:task_id and task_detail =:task_detail', array(
								':uid' => $uid,
								':task_id' => $task_id,
								':task_detail' => $novel_id
							));
							if ($taskRecord) {
								$this->response->download = Util::getHost() . '/data/novel/' . $novel_info->download;
							} else {
								$user_coin = DreamNovelUserInfo::model()->getCoin($uid);
								if ($user_coin >= $novel_info->price) {
									$taskRecord = new DreamNovelUserTask();
									$taskRecord->uid = $uid;
									$taskRecord->task_id = $task_id;
									$taskRecord->task_detail = $novel_id;
									$taskRecord->date = $today;
									$taskRecord->setIsNewRecord(true);
									if ($taskRecord->save(false)) {
										$status = DreamNovelUserInfo::model()->updateCoin($uid, $novel_info->price, 'minus');
										if ($status) {
											DreamNovelUserInfo::model()->updateCoin($uid, $task_id, 'plus');
											$this->response->download = Util::getHost() . '/data/novel/' . $novel_info->download;
											$ls_novel_hot = $novel_info->hot;
											$novel_info->hot = $ls_novel_hot + 1;
											$novel_info->save(false);
										}
									}
								}
							}
						}
					}
				}
				return $this->response->coin = DreamNovelUserInfo::model()->getCoin($uid);
			} else {
				$this->response->coin = DreamNovelUserInfo::model()->getCoin($uid);
				$this->response->category = DreamNovelCategory::model()->getCategoryList();
				return $this->response->task_list = DreamNovelTask::model()->getTaskList();
			}
		}
		return $this->response->code = 500;
	}
}