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
		if ($imei && $mssp_deviceinfo) {
			//get device info
			$android_id = isset($mssp_deviceinfo->android_id) ? $mssp_deviceinfo->android_id : false;
			$model = isset($mssp_deviceinfo->model) ? $mssp_deviceinfo->model : '';
			$vendor = isset($mssp_deviceinfo->vendor) ? $mssp_deviceinfo->vendor : '';
			$height = isset($mssp_deviceinfo->height) ? $mssp_deviceinfo->height : 1920;
			$width = isset($mssp_deviceinfo->width) ? $mssp_deviceinfo->width : 1080;
			$netip = $_SERVER["REMOTE_ADDR"];
			$mac = isset($mssp_deviceinfo->mac) ? $mssp_deviceinfo->mac : false;
			$iswifi = isset($mssp_deviceinfo->iswifi) ? $mssp_deviceinfo->iswifi : false;
			$imsi = isset($mssp_deviceinfo->imsi) ? $mssp_deviceinfo->imsi : false;
			$os_version_micro = isset($mssp_deviceinfo->os_version_micro) ? $mssp_deviceinfo->os_version_micro : 2;
			$os_version_minor = isset($mssp_deviceinfo->os_version_minor) ? $mssp_deviceinfo->os_version_minor : 2;
			$os_version_major = isset($mssp_deviceinfo->os_version_major) ? $mssp_deviceinfo->os_version_major : 4;

			require("pb_proto_BaiduMobads_api_v5.0.php");

			//generate request id
			$str = null;
			$strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
			$max = strlen($strPol) - 1;

			for ($i = 0; $i < 17; $i++) {
				$str .= $strPol[rand(0, $max)];
			}
			$app_id = 'a366835f';
			$adslot_id = '2378916';
			$request_id = $app_id . $adslot_id . $str;

			$version = new Mobads_Apiv5_Version();
			$version->setMajor(5);
			$version->setMinor(0);

			$app_version = new Mobads_Apiv5_Version();
			$app_version->setMajor(3);
			$app_version->setMinor(4);

			$os_verions = new Mobads_Apiv5_Version();
			$os_verions->setMajor($os_version_major);
			$os_verions->setMinor($os_version_minor);
			$os_verions->setMicro($os_version_micro);

			$ScreenSize = new Mobads_Apiv5_Size();
			$ScreenSize->setHeight($height);
			$ScreenSize->setWidth($width);

			$AdslotSize = new Mobads_Apiv5_Size();
			$AdslotSize->setHeight(250);
			$AdslotSize->setWidth(350);

			$app = new Mobads_Apiv5_App();
			$app->setAppId($app_id);
			$app->setAppVersion($app_version);

			$uuid = new Mobads_Apiv5_UdId();
			$uuid->setMac($mac);
			$uuid->setAndroidId($android_id);
			$uuid->setImei($imei);
			$uuid->setImeiMd5(md5($imei));

			$device = new Mobads_Apiv5_Device();
			$device->setDeviceType(1);
			$device->setOsType(1);
			$device->setOsVersion($os_verions);
			$device->setScreenSize($ScreenSize);
			$device->setVendor($vendor);
			$device->setModel($model);
			$device->setUdid($uuid);

			$network = new Mobads_Apiv5_Network();
			$network->setIpv4($netip);
			if ($iswifi) {
				$connetct_type = 100;
			} else {
				$connetct_type = 0;
			}
			$network->setConnectionType($connetct_type);
			//中国移动：46000 46002
			//中国联通：46001
			//中国电信：46003
			$operator = substr($imsi, 0, 5);
			switch ($operator) {
				case '46000':
				case '46002':
					$operator = 1;
					break;
				case '46001':
					$operator = 3;
					break;
				case '46003':
					$operator = 2;
					break;
				default:
					$operator = 0;
					break;
			}
			$network->setOperatorType($operator);

			$adslot = new Mobads_Apiv5_AdSlot();
			$adslot->setAdslotId($adslot_id);
			$adslot->setAdslotSize($AdslotSize);

			$Request = new Mobads_Apiv5_MobadsRequest();
			$Request->setRequestId($request_id);
			$Request->setApiVersion($version);
			$Request->setApp($app);
			$Request->setDevice($device);
			$Request->setNetwork($network);
			$Request->setAdslot($adslot);
			$packed = $Request->serializeToString();

			$postUrl = 'http://mobads.baidu.com/api_5';
			$ch = curl_init();//初始化curl
			curl_setopt($ch, CURLOPT_URL, $postUrl);//抓取指定网页
			curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
			curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
			curl_setopt($ch, CURLOPT_POSTFIELDS, $packed);
			$data = curl_exec($ch);//运行curl
			curl_close($ch);

			$respose = new Mobads_Apiv5_MobadsResponse();
			$respose->parseFromString($data);
			if ($respose->getErrorCode() == 0) {
				$mssp_flag = true;
				$ad_info = $respose->getAds();
				$num = count($ad_list);
				foreach ($ad_info as $value) {
					$material = $value->getMaterialMeta();
					$ad_list[$num]['app_name'] = $material->getTitle();
					$ad_list[$num]['type'] = 'baidu';
					$ad_list[$num]['pre_install'] = 0;
					$ad_list[$num]['title'] = $material->getTitle();
					$ad_list[$num]['content'] = $material->getDescriptionAt(0);
					$ad_list[$num]['package_name'] = $material->getAppPackage() ? $material->getAppPackage() : '';
					$ad_list[$num]['icon_url'] = $material->getIconSrcAt(0);
					$ad_list[$num]['cover_url'] = $material->getImageSrcAt(0);
					$ad_list[$num]['download_url'] = $material->getClickUrl();
					$ad_list[$num]['file_size'] = $material->getAppSize();
					$ad_list[$num]['ad_type'] = $material->getCreativeType();
					$ad_list[$num]['ad_action'] = $material->getInteractionType();
					$ad_list[$num]['expiration_time'] = intval($respose->getExpirationTime() . '000');
					$call_back_url_num = $material->getWinNoticeUrlCount();
					for ($i = 0; $i < $call_back_url_num; $i++) {
						$call_back_url = $material->getWinNoticeUrlAt($i);
						$snoopy = new Snoopy();
						$snoopy->fetch($call_back_url);
						$i++;
					}
					$num++;
				}
			}
		}
		if ($imei && !$mssp_flag) {
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
			$param['format'] = 'json';
			$snoopy = new Snoopy();
			$snoopy->fetch($host . http_build_query($param));
			$ad_info = json_decode($snoopy->results, true);
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
		$date = date('Y-m-d', time());
		$dream_push_count = DreamPushCount::model()->find('date =:date', array(':date' => $date));
		if ($dream_push_count) {
			$dream_push_count->number++;
			if ($mssp_flag) {
				$dream_push_count->mssp_count++;
			}
			if ($baidu_flag) {
				$dream_push_count->baidu_count++;
			}
			$dream_push_count->save(false);
		} else {
			$dream_push_count = new DreamPushCount();
			$dream_push_count->number = 1;
			if ($mssp_flag) {
				$dream_push_count->mssp_count = 1;
			} else {
				$dream_push_count->mssp_count = 0;
			}
			if ($baidu_flag) {
				$dream_push_count->baidu_count = 1;
			} else {
				$dream_push_count->baidu_count = 0;
			}
			$dream_push_count->date = $date;
			$dream_push_count->setIsNewRecord(true);
			$dream_push_count->save(false);
		}
		shuffle($ad_list);
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
		$imei = false;
		$id = rand(1, $total);
		$device_info = DreamDevice::model()->find('id =:id', array(':id' => $id));
		if ($device_info) {
			$imei = $device_info->imei;
		}
		while (!Util::checkImei($imei)) {
			Util::getImei();
		}
		return $imei;
	}

}