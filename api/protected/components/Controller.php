<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 * @author gongyou3@opda.cn
 */
class Controller extends CController {

	protected $request;
	protected $response;

	public function filters() {
		return array(
			array('application.filters.RequestFilter'),
			array('application.filters.ResponseFilter'),
		);
	}

	/**
	 * @return $request
	 */
	public function getRequest() {
		return $this->request;
	}

	/**
	 * @return $response
	 */
	public function getResponse() {
		return $this->response;
	}

	/**
	 * @param $request
	 */
	public function setRequest($request) {
		$this->request = $request;
	}

	/**
	 * @param $response
	 */
	public function setResponse($response) {
		$this->response = $response;
	}

}

?>
