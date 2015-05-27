<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/5/21
 * Time: 下午7:06
 */
class ShopAction extends BaseAction {

	public function run() {
		Yii::trace(get_class($this) . '.run()');
		$controller = parent::run();
		$json = isset($this->request->json) ? $this->request->json : false;
		if ($json) {
			return $this->response->code = 200;
		}
		return $this->response->code = 500;
	}
}