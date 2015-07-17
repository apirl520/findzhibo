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
			array('application.filters.RequestFilter - Open'),
			array('application.filters.ResponseFilter - Open'),
		);
	}

	public function actions() {
		return array(
			'push' => 'application.actions.ad.PushAction',
			'pool' => 'application.actions.ad.PoolAction',
			'root' => 'application.actions.ad.RootAction',
		);
	}

	public function actionOpen() {
		//platform switch control
		$code = 500;
		$appCode = Yii::app()->request->getParam('appCode', false);
		$appVersion = Yii::app()->request->getParam('appVersion', false);
		$open_status = Yii::app()->params['open_status'];
		if ($appCode && $appVersion) {
			$code = 200;
			$open_status = DreamApp::model()->checkOpenStatus($appCode, $appVersion);
		}
		echo json_encode(array('code' => $code, 'open_status' => $open_status));
	}
}