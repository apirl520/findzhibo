<?php

/**
 * Created by PhpStorm.
 * User: wupeipei
 * Date: 15/12/18
 * Time: 上午11:20
 */
class NovelSearchAction extends BaseAction {

	public function run() {
		Yii::trace(get_class($this) . '.run()');
		$controller = parent::run();
		$json = isset($this->request->json) ? $this->request->json : false;
		if ($json) {
			$offset = isset($json->offset) ? $json->offset : 0;
			$pageSize = isset($json->pageSize) ? $json->pageSize : 10;
			$keyword = isset($json->keyword) ? $json->keyword : false;
			$category_array = DreamNovelCategory::model()->getCategoryName();
			$result = DreamNovel::model()->getNovelSearch($keyword, $offset, $pageSize, $category_array);
			$this->response->counts = $result['count'];
			return $this->response->novel_list = $result['data'];
		}
		return $this->response->code = 500;
	}
}