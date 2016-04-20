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
		$code = 200;
		$open_status = false;
		$ip = Yii::app()->request->getParam('ip', $_SERVER["REMOTE_ADDR"]);
		if ($ip) {
			$info = Util::filterIP($ip);
			if ($info) {
				if ($info['city'] != '北京' && $info['city'] != '上海' && $info['city'] != '广州' && $info['city'] != '深圳' && $info['province'] != '北京' && $info['province'] != '上海' && $info['province'] != '广东') {
					$open_status = true;
				}
			}
		}
		echo json_encode(array('code' => $code, 'open_status' => $open_status));
	}
}