<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/5/27
 * Time: 下午9:01
 */
class PushAction extends BaseAction {

	public function run() {
		Yii::trace(get_class($this) . '.run()');
		$controller = parent::run();
		$json = isset($this->request->json) ? $this->request->json : false;
		if ($json) {
			if (!Yii::app()->params['open_status']) {
				return $this->response->code = 502;
			}
			return $this->response->code = 200;
		}
		return $this->response->code = 500;
	}
}