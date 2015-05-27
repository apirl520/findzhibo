<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/5/5
 * Time: 上午11:15
 */
class TestController extends Controller {

	public $layout = '/test/column';

	public function accessRules(){

	}

	public function filters() {
		return array(
			array('application.filters.RequestFilter - Index'),
			array('application.filters.ResponseFilter - Index'),
		);
	}

	public function actionIndex() {
		$this->render('index');
	}
}