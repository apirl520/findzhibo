<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/11/27
 * Time: 上午12:45
 */
class DreamNovel extends ODreamNovel {

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function getNovelDetail($category_id, $sort, $sort_type, $offset = 0, $pageSize = 5) {
		$novelList = array();
		$criteria = new CDbCriteria();
		if (is_array($category_id)) {
			$criteria->addInCondition('category_id', $category_id);
		} else
			if ($category_id) {
				$criteria->condition = 'category_id =:category_id';
				$criteria->params = array(':category_id' => $category_id);
			}
		$criteria->addCondition('status != 0');
		switch ($sort) {
			case 'recommend':
				$criteria->order = 'rand()';
				break;
			case 'price':
				if ($sort_type) {
					$criteria->order = 'price desc';
				} else {
					$criteria->order = 'price asc';
				}
				break;
			case 'hot':
				if ($sort_type) {
					$criteria->order = 'hot desc';
				} else {
					$criteria->order = 'hot asc';
				}
				break;
			case 'update':
				if ($sort_type) {
					$criteria->order = 'update_time desc';
				} else {
					$criteria->order = 'update_time asc';
				}
				break;
			case 'size':
				if ($sort_type) {
					$criteria->order = 'fileSize desc';
				} else {
					$criteria->order = 'fileSize asc';
				}
				break;
		}
		$count = $this->count($criteria);
		$criteria->offset = $offset * $pageSize;
		$criteria->limit = $pageSize;
		$novel_info = $this->findAll($criteria);
		$host = Util::getHost();
		foreach ($novel_info as $key => $novel_info_item) {
			$novelList[$key]['id'] = $novel_info_item->id;
			$novelList[$key]['name'] = $novel_info_item->name;
			$novelList[$key]['author'] = $novel_info_item->author;
			$novelList[$key]['cover'] = $host . $novel_info_item->cover;
			$novelList[$key]['file_size'] = Util::formatFileSize($novel_info_item->fileSize);
			$novelList[$key]['status'] = $this->getNovelStatus($novel_info_item->status);
			$novelList[$key]['price'] = $novel_info_item->price;
			$novelList[$key]['hot'] = $novel_info_item->hot;
			$novelList[$key]['update_time'] = $novel_info_item->update_time;
			$novelList[$key]['category_id'] = $novel_info_item->category_id;
		}
		return array('count' => $count, 'data' => $novelList);
	}

	public function getNovelStatus($status) {
		$status_description = '下架';
		switch ($status) {
			case 1:
				$status_description = '已完结';
				break;
			case 2:
				$status_description = '连载中';
				break;
			default:
				break;
		}
		return $status_description;
	}

	public function getNovelSearch($keyword, $offset = 0, $pageSize = 5, $category_array) {
		$novelList = array();
		$criteria = new CDbCriteria();
		//关键字找category_id
		$category_db = new CDbCriteria();
		$category_db->compare('name', $keyword, 'true');
		$category_data = DreamNovelCategory::model()->findAll($category_db);
		$category_ids = array();
		if ($category_data) {
			foreach ($category_data as $c_value) {
				$category_ids[] = $c_value['id'];
			}
		}
		if ($category_ids) {
			$criteria->addInCondition('category_id', $category_ids, 'OR');
		}
		$criteria->compare('author', $keyword, true, 'OR');
		$criteria->compare('name', $keyword, true, 'OR');
		$criteria->order = 'update_time desc';
		$criteria->addCondition('status != 0');
		$count = $this->count($criteria);
		$criteria->offset = $offset * $pageSize;
		$criteria->limit = $pageSize;
		$novel_info = $this->findAll($criteria);
		$host = Util::getHost();
		foreach ($novel_info as $key => $novel_info_item) {
			$ls_category_id = $novel_info_item->category_id;
			$novelList[$key]['id'] = $novel_info_item->id;
			$novelList[$key]['name'] = $novel_info_item->name;
			$novelList[$key]['author'] = $novel_info_item->author;
			$novelList[$key]['cover'] = $host . $novel_info_item->cover;
			$novelList[$key]['file_size'] = Util::formatFileSize($novel_info_item->fileSize);
			$novelList[$key]['status'] = $this->getNovelStatus($novel_info_item->status);
			$novelList[$key]['price'] = $novel_info_item->price;
			$novelList[$key]['hot'] = $novel_info_item->hot;
			$novelList[$key]['update_time'] = $novel_info_item->update_time;
			$novelList[$key]['category_id'] = $ls_category_id;
			$novelList[$key]['category_name'] = $category_array[$ls_category_id];
		}
		return array('count' => $count, 'data' => $novelList);
	}


}