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
			array('application.filters.RequestFilter - Open'),
			array('application.filters.ResponseFilter - Open'),
		);
	}

	public function actions() {
		return array(
			'open' => 'application.actions.device.OpenAction',
			'uuid' => 'application.actions.device.UuidAction',
			'collect' => 'application.actions.device.CollectAction',
		);
	}

	public function actionOpen() {
		//platform switch control
		echo json_encode(array('code' => 200, 'open_status' => Yii::app()->params['open_status']));
	}
}