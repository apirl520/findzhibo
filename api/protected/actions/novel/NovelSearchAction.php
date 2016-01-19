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
			$result = DreamNovel::model()->getNovelSearch($keyword, $offset, $pageSize);
			$ls_count = $result['count'];
			if ($keyword) {
				$is_query = DreamNovelQuery::model()->find('query=:query', array(':query' => $keyword));
				if ($is_query) {
					$ls_count = $is_query->counts;
					$is_query->results = $ls_count;
					$is_query->counts = $ls_count + 1;
					$is_query->save(false);
				} else {
					$new_query = new DreamNovelQuery();
					$new_query->query = $keyword;
					$new_query->results = $result['count'];
					$new_query->counts = 1;
					$new_query->save(false);
				}
			}
			$this->response->counts = $ls_count;
			return $this->response->novel_list = $result['data'];
		}
		return $this->response->code = 500;
	}
}