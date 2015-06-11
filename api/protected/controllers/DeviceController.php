<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/5/21
 * Time: 下午3:47
 */
class DeviceController extends Controller {

	public function filters() {
		return array(
			array('application.filters.RequestFilter'),
			array('application.filters.ResponseFilter'),
		);
	}

	public function actions() {
		return array(
			'uuid' => 'application.actions.device.UuidAction',
			'collect' => 'application.actions.device.CollectAction',
		);
	}

}