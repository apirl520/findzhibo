<?php

/**
 * Response Filter
 * @author shilei
 */
class ResponseFilter extends CFilter {

	protected function preFilter($filterChain) {
		Yii::trace(get_class($this) . '.preFilter()');
		$controller = $filterChain->controller;
		$response = new stdClass();
		// default code
		$response->code = 200;
		$response->stime = date('Y-m-d H:i:s');
		$controller->setResponse($response);
		return TRUE;
	}

	protected function postFilter($filterChain) {
		Yii::trace(get_class($this) . '.postFilter()');
		$controller = $filterChain->controller;
		$response = $controller->getResponse();
		$response = json_encode($response);
		echo $response;
		Yii::app()->end();
	}
}

?>