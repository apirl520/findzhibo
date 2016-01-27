<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/5/27
 * Time: 下午8:29
 */
class DreamAdPackage extends ODreamAdPackage {

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function rules() {
		return array(
			array(
				'app_name, package_name, version_code, version_name, file_size, description, show_flag, show_order',
				'required'
			),
			array('file_size, show_flag, show_order', 'numerical', 'integerOnly' => true),
			array('app_name, package_name, download_url, icon_url', 'length', 'max' => 200),
			array('version_code', 'length', 'max' => 20),
			array('version_name, level', 'length', 'max' => 100),
			array('download_time', 'length', 'max' => 10),
			array(
				'id, app_name, package_name, version_code, version_name, file_size, level, download_time, download_url, icon_url, image_url, description, show_flag, show_order, ctime',
				'safe',
				'on' => 'search'
			),
		);
	}

	public function attributeLabels() {
		return array(
			'app_name' => '广告名',
			'package_name' => '广告包名',
			'version_code' => '版本号',
			'version_name' => '版本名',
			'file_size' => '文件大小',
			'level' => '等级',
			'download_time' => '下载次数',
			'download_url' => '下载地址',
			'icon_url' => '图标',
			'image_url' => '插屏宣传图',
			'description' => '描述',
			'show_flag' => '上架',
			'show_order' => '排序',
		);
	}

	public function getAdPackageInfo($ad_id) {
		return $this->find('id =:id and show_flag !=:show_flag', array(':id' => $ad_id, ':show_flag' => 0));
	}

	public function getAdList() {
		return CHtml::listData($this->findAll(), 'id', 'app_name');
	}
}