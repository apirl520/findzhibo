<?php
/**
 * Description of BaseAction
 *
 * @author shilei
 */
class BaseAction extends CAction {
	
	protected $request;
	protected $response;

	public function run() {
		$controller = $this->getController();
		$this->request = $this->controller->getRequest();
		$this->response = $this->controller->getResponse();
		return $controller;
	}

}

?>
