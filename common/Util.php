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

	public static function getHost() {
		return Yii::app()->params['cdn_host'];
	}

	public static function NumFormat($number) {
		$param = $number / 10000;
		if ($param > 1) {
			return $param . '万';
		} else {
			return $number;
		}
	}

	public static function formatFileSize($fileSize, $num = 2) {
		$size = sprintf("%u", $fileSize);
		if ($size == 0) {
			return ("0Bytes");
		}
		$unit = array(
			"Bytes",
			"KB",
			"MB",
			"GB",
			"TB",
			"PB",
			"EB",
			"ZB",
			"YB"
		);
		return round($size / pow(1024, ($i = floor(log($size, 1024)))), $num) . $unit[$i];
	}

	public static function getBaiduAd($uuid, $imei, $mssp_deviceinfo, $ad_list) {
		$baidu_flag = $mssp_flag = false;
		$imei = isset($mssp_deviceinfo->imei) ? $mssp_deviceinfo->imei : $imei;
		if (!$imei) {
			if ($uuid) {
				if (is_numeric($uuid)) {
					$user_info = AdPackageUser::model()->find('id =:id', array(':id' => $uuid));
					if ($user_info) {
						$imei = isset($user_info->imei) ? $user_info->imei : false;
					}
				} else {
					$user_info = DreamDeviceUuid::model()->find('uuid =:uuid', array(':uuid' => $uuid));
					if ($user_info) {
						$device_id = $user_info->device_id;
						$device_info = DreamDevice::model()->find('id =:id', array(':id' => $device_id));
						$imei = isset($device_info->imei) ? $device_info->imei : false;
					}
				}
			}
		}
		if ($imei) {
			$from = '1014104g';
			$token = 'wifi_check';
			$host = 'http://m.baidu.com/api?';
			$api_key = 'cea6fbb9e862233e3dbe6fcc6cad3bcf';
			$param = array();
			$param['action'] = 'board';
			$param['from'] = $from;
			$param['token'] = $token;
			$param['api_key'] = $api_key;
			$param['imei'] = $imei;
			$param['type'] = 'app';
			$param['id'] = 2;
			$param['pn'] = 0;
			$param['rn'] = 60;
			$param['dpi'] = '720_1280';
			$param['format'] = 'json';

			$data = file_get_contents($host . http_build_query($param));
			$ad_info = json_decode($data, true);

			if ($ad_info) {
				$num = count($ad_list);
				foreach ($ad_info['result']['apps'] as $value) {
					if ($value['sname'] != '百度手机卫士') {
						$adv_item = $value['adv_item'];
						if (strpos($adv_item, 'MBUADP')) {
							$baidu_flag = true;
							$screen_shots = explode(';', $value['screenshot']);
							$ad_list[$num]['app_name'] = $value['sname'];
							$ad_list[$num]['type'] = 'baidu';
							$ad_list[$num]['pre_install'] = 1;
							$brief = $value['manual_brief'] ? $value['manual_brief'] : $value['sname'];
							$ad_list[$num]['title'] = $brief;
							$ad_list[$num]['content'] = $value['manual_short_brief'] ? $value['manual_short_brief'] : $brief;
							$ad_list[$num]['package_name'] = $value['package'];
							$ad_list[$num]['icon_url'] = $value['icon'];
							$ad_list[$num]['cover_url'] = $screen_shots[0];
							$ad_list[$num]['download_url'] = $value['download_url'] . '&imei=' . $imei . '&api_key=' . $api_key;
							$num++;
						}
					}
				}
			}
		}
		return $ad_list;
	}

	public static function checkImei($imei) {
		if (strpos($imei, 'A') === 0) {
			return true;
		}
		if (!preg_match('/^[0-9]{15}$/', $imei)) return false;
		if ($imei == '000000000000000') return false;
		$sum = 0;
		for ($i = 0; $i < 14; $i++) {
			$num = $imei[$i];
			if (($i % 2) != 0) {
				$num = $imei[$i] * 2;
				if ($num > 9) {
					$num = (string)$num;
					$num = $num[0] + $num[1];
				}
			}
			$sum += $num;
		}
		if ((($sum + $imei[14]) % 10) != 0) return false;
		return true;
	}

	public static function getImei() {
		$key = 'device_total';
		$total = Yii::app()->cache->get($key);
		if (!$total) {
			$total = DreamDevice::model()->count();
			Yii::app()->cache->set($key, $total, 3600);
		}
		$id = rand(1, $total);
		$device_info = DreamDevice::model()->find('id =:id', array(':id' => $id));
		$imei = $device_info->imei;
		return $imei;
	}

}