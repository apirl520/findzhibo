<?php

/**
 * Request Filter
 * @author shilei
 */
class RequestFilter extends CFilter {

	protected function preFilter($filterChain) {
		Yii::trace(get_class($this) . '.preFilter()');
		$yiiRequest = Yii::app()->getRequest();

		$request = new stdClass();
		$request->appVersion = $yiiRequest->getParam('appVersion', 0);
		$request->appCode = $yiiRequest->getParam('appCode', 0);
		$json = $yiiRequest->getParam('json', FALSE);
		if ($json) {
			if (get_magic_quotes_gpc()) {
				$json = stripslashes($json);
			}
			if (strpos($json, '"{\"')) {
				$json = stripslashes($json);
				$json = str_replace('"{', '{', $json);
				$json = str_replace('}"', '}', $json);
			}
			$request->json = json_decode($json);
		}

		$filterChain->controller->setRequest($request);

		if ($json) {
			return true;
		} else {
			echo Yii::app()->params['errorMessage'];
			return false;
		}
	}
}

?>