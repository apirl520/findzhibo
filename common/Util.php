<?php

/**
 * Created by PhpStorm.
 * User: apirl
 * Date: 14-7-3
 * Time: 下午4:51
 */
class Util {

	//判断是否IE浏览器
	public static function isIE() {
		if (isset($_SERVER['HTTP_USER_AGENT']) &&
			(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)
		) {
			return true;
		} else {
			return false;
		}
	}

	public static function NumFormat($number) {
		$param = $number / 10000;
		if ($param > 1) {
			return $param . '万';
		} else {
			return $number;
		}
	}

}