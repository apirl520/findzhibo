<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/5/27
 * Time: 下午8:29
 */
class DreamApp extends ODreamApp {

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function rules() {
		return array(
			array('app_id, app_version, ad_switch, show_flag', 'required'),
			array('app_id, app_version, ad_switch, show_flag', 'numerical', 'integerOnly' => true),
			array('title', 'length', 'max' => 140),
			array('id, app_id, app_version, title, ad_switch, show_flag, ctime', 'safe', 'on' => 'search'),
		);
	}

	public function attributeLabels() {
		return array(
			'app_id' => '应用ID',
			'app_version' => '版本号',
			'title' => '应用名',
			'ad_switch' => '广告开关',
			'show_flag' => '是否上架',
		);
	}

	public function checkOpenStatus($app_id, $app_version) {
		return true;
		$app_info = $this->find('app_id =:app_id and app_version =:app_version', array(':app_id' => $app_id, ':app_version' => $app_version));
		if ($app_info) {
			if ($app_info->ad_switch) {
				return true;
			}
		}
		return false;
	}
}