<?php

/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/11/10
 * Time: 上午11:51
 */
class UploadCommand extends CConsoleCommand {

	public function actionAd($id = 0) {
		$base_path = dirname(__FILE__) . '/../../..';
		if ($id) {
			$package = DreamAdPackage::model()->find('id =:id', array(':id' => $id));
			if ($package) {
				$icon = $base_path . $package->icon_url;
				$icon_path = $package->icon_url;
				$this->upload($icon, $icon_path);
				$file = $base_path . $package->download_url;
				$file_path = $package->download_url;
				$this->upload($file, $file_path);
				$image = $base_path . $package->image_url;
				$image_path = $package->image_url;
				$this->upload($image, $image_path);
			}
		}
	}

	public function upload($file, $file_path) {
		require_once(dirname(__FILE__) . '/../../../common/upyun.class.php');
		$upyun = new UpYun('app-tools', 'apirl', 'pestalia');
		if (is_file($file) && file_exists($file)) {
			try {
				echo "=========准备上传文件" . $file_path . "\r\n";
				echo "=========设置MD5校验文件完整性\r\n";
				$opts = array(
					UpYun::CONTENT_MD5 => md5(file_get_contents($file))
				);
				$fh = fopen($file, 'rb');
				$rsp = $upyun->writeFile($file_path, $fh, True, $opts);
				fclose($fh);
				var_dump($rsp);
				echo "=========DONE\r\n\r\n";
			} catch (Exception $e) {
				echo $e->getCode();
				echo $e->getMessage();
			}
		}
	}
}