<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/5/27
 * Time: 下午8:52
 */
class AdController extends Controller {

	public function filters() {
		return array(
			array('application.filters.RequestFilter'),
			array('application.filters.ResponseFilter'),
		);
	}

	public function actions() {
		return array(
			'push' => 'application.actions.ad.PushAction',
			'screen' => 'application.actions.ad.ScreenAction',
		);
	}
}