<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/3/3
 * Time: 下午3:02
 */
class Header extends CPortletExt {

	public function renderContent() {
		$controller = $this->controller->getId();
		$this->render('header', array('controller' => $controller));
	}
}