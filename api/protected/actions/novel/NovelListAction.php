<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/11/26
 * Time: 下午6:31
 */
class NovelListAction extends BaseAction {

	public function run() {
		Yii::trace(get_class($this) . '.run()');
		$controller = parent::run();
		$json = isset($this->request->json) ? $this->request->json : false;
		if ($json) {
			$offset = isset($json->offset) ? $json->offset : 0;
			$pageSize = isset($json->pageSize) ? $json->pageSize : 10;
			$sort = isset($json->sort) ? $json->sort : false;
			$sort_type = isset($json->sort_type) ? $json->sort_type : false;
			$category_id = isset($json->category_id) ? $json->category_id : false;
			$this->response->category = DreamNovelCategory::model()->getCategoryList();
			return $this->response->novel_list = DreamNovel::model()->getNovelDetail($category_id, $sort, $sort_type, $offset, $pageSize);
		}
		return $this->response->code = 500;
	}
}