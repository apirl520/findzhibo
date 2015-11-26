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
			array('application.filters.RequestFilter'),
			array('application.filters.ResponseFilter'),
		);
	}

	public function actions() {
		return array(
			'uuid' => 'application.actions.novel.UuidAction',
			'task_list' => 'application.actions.novel.TaskListAction',
			'novel_list' => 'application.actions.novel.NovelListAction',
		);
	}

}