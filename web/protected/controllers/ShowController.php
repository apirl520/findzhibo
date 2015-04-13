<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/3/5
 * Time: 下午4:18
 */
class ShowController extends Controller {

	public function actionIndex() {
		$artistLists = array();
		$criteria = new CDbCriteria();
		$criteria->addCondition('`on` = 1');
		$criteria->order = 'view desc';
		$artistLists = ShowArtist::model()->findAll($criteria);

		$this->render('index');
	}
}