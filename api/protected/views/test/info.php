<?php
/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/12/15
 * Time: 下午3:19
 */
require_once('pb_proto_BaiduMobads_api_v5.0.php');

$version = new Mobads_Apiv5_Version();
$version->setMajor(5);
$version->setMinor(0);

$app_version = new Mobads_Apiv5_Version();
$app_version->setMajor(3);
$app_version->setMinor(4);

$os_verions = new Mobads_Apiv5_Version();
$os_verions->setMajor(4);
$os_verions->setMinor(2);
$os_verions->setMicro(2);

$ScreenSize = new Mobads_Apiv5_Size();
$ScreenSize->setHeight(1920);
$ScreenSize->setWidth(1080);

$AdslotSize = new Mobads_Apiv5_Size();
$AdslotSize->setHeight(250);
$AdslotSize->setWidth(350);

$app = new Mobads_Apiv5_App();
$app->setAppId('e7627f43');
$app->setAppVersion($app_version);

$uuid = new Mobads_Apiv5_UdId();
$uuid->setMac('12:34:56:78:90:ab');
$uuid->setAndroidId('TestAndroidId123');
$uuid->setIdfa('AAAAAAAA-BBBB-CCCC-0000-ABCDEFGHIGKL');
$uuid->setImei('abcdef123456789');
$uuid->setImeiMd5('Md5ResultOfIMEIabcdef123456789AB');

$device = new Mobads_Apiv5_Device();
$device->setDeviceType(1);
$device->setOsType(1);
$device->setOsVersion($os_verions);
$device->setScreenSize($ScreenSize);
$device->setVendor('MEIZU');
$device->setModel('MX5');
$device->setUdid($uuid);

$network = new Mobads_Apiv5_Network();
$network->setIpv4('127.0.0.1');
$network->setCellularId('12345_45678_0');
$network->setConnectionType(0);
$network->setOperatorType(0);

$adslot = new Mobads_Apiv5_AdSlot();
$adslot->setAdslotId('2008923');
$adslot->setAdslotSize($AdslotSize);

$gps = new Mobads_Apiv5_Gps();
$gps->setTimestamp(123456);
$gps->setLongitude(4.56);
$gps->setLatitude(1.23);
$gps->setCoordinateType(1);

$Request = new Mobads_Apiv5_MobadsRequest();
$Request->setRequestId('P4vddcUhEMQ92VYhJbPo5jk3CBs4AHyv');
$Request->setApiVersion($version);
$Request->setApp($app);
$Request->setDevice($device);
$Request->setNetwork($network);
$Request->setAdslot($adslot);
$Request->setGps($gps);
$packed = $Request->serializeToString();

$postUrl = 'http://debug.mobads.baidu.com/api_5';
$ch = curl_init();//初始化curl
curl_setopt($ch, CURLOPT_URL, $postUrl);//抓取指定网页
curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
curl_setopt($ch, CURLOPT_POSTFIELDS, $packed);
$data = curl_exec($ch);//运行curl
curl_close($ch);

$response = new Mobads_Apiv5_MobadsResponse();
try {
	$response->parseFromString($data);
} catch (Exception $ex) {
	die('Upss.. there is a bug in this example');
}
$response->dump();
?>