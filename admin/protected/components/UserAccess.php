<?php

/**
 * Created by JetBrains PhpStorm.
 * User: apirl
 * Date: 12-3-3
 * Time: 下午12:49
 * @author shilei@opda.cn
 * 后台用户权限分配
 */
class UserAccess extends CWebUser {

	private $_user;

	public function getIsAdmin() {
		return $this->user;
	}

	public function getUser() {
		if ($this->isGuest)
			return false;
		if ($this->_user === null) {
			$this->_user = DreamAdminUser::model()->findAllByPk($this->id);
		}
		return $this->_user;
	}
}