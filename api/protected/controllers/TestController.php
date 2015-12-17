<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/5/5
 * Time: 上午11:15
 */
class TestController extends Controller {

	public $layout = '/test/column';

	public function accessRules() {

	}

	public function filters() {
		return array(
			array('application.filters.RequestFilter - Index,Info'),
			array('application.filters.ResponseFilter - Index,Info'),
		);
	}

	public function actionIndex() {
		$this->render('index');
	}

	public function actionInfo() {
		$this->render('info');
	}
}