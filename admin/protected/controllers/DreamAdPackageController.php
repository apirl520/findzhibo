<?php

class DreamAdPackageController extends Controller {

	public $layout = '//layouts/column';

	public function filters() {
		return array(
			'accessControl',
		);
	}

	public function accessRules() {
		return array(
			array(
				'allow',
				'actions' => array('create', 'update', 'admin', 'delete'),
				'expression' => '$user->isAdmin',
			),
			array(
				'deny',
				'users' => array('*'),
			),
		);
	}

	public function actionCreate() {
		$model = new DreamAdPackage;

		if (isset($_POST['DreamAdPackage'])) {
			$icon = CUploadedFile::getInstance($model, 'icon_url');
			$file = CUploadedFile::getInstance($model, 'download_url');
			$image = CUploadedFile::getInstance($model, 'image_url');
			$model->attributes = $_POST['DreamAdPackage'];
			if ($file) {
				$this->saveFile($model, $file);
			}
			if ($icon) {
				$model = $this->saveIcon($model, $icon);
			}
			if ($image) {
				$model = $this->saveImage($model, $image);
			}
			if ($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id);

		if (isset($_POST['DreamAdPackage'])) {
			$icon = CUploadedFile::getInstance($model, 'icon_url');
			$file = CUploadedFile::getInstance($model, 'download_url');
			$image = CUploadedFile::getInstance($model, 'image_url');
			$old_icon_url = $model->icon_url;
			$old_image_url = $model->image_url;
			$model->attributes = $_POST['DreamAdPackage'];
			if ($file) {
				$this->saveFile($model, $file);
			}
			if ($icon) {
				$model = $this->saveIcon($model, $icon);
			} else {
				$model->icon_url = $old_icon_url;
			}
			if ($image) {
				$model = $this->saveImage($model, $image);
			} else {
				$model->image_url = $old_image_url;
			}
			if ($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	public function actionDelete($id) {
		$model = $this->loadModel($id);
		if ($model) {
			$base_dir = Yii::getPathOfAlias('application') . '/../..';
			$icon_url = $base_dir . $model->icon_url;
			$image_url = $base_dir . $model->image_url;
			$download_url = $base_dir . $model->download_url;
			if ($model->delete()) {
				if (file_exists($icon_url)) {
					unlink($icon_url);
				}
				if (file_exists($image_url)) {
					unlink($image_url);
				}
				if (file_exists($download_url)) {
					unlink($download_url);
				}
			};
		}

		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionAdmin() {
		$title = Yii::app()->request->getParam('title', false);
		$criteria = new CDbCriteria();
		$criteria->order = 'id desc';
		if ($title) {
			$criteria->compare('app_name', $title, true);
		}
		$dataProvider = new CActiveDataProvider('DreamAdPackage');
		$dataProvider->setCriteria($criteria);
		$this->render('admin', array(
			'title' => $title,
			'dataProvider' => $dataProvider,
		));
	}

	public function loadModel($id) {
		$model = DreamAdPackage::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'dream-ad-package-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function parseApk($apkFile) {
		if (!file_exists($apkFile)) {
			return FALSE;
		}
		$commond = 'aapt d badging \'' . str_replace("'", "\\\'", $apkFile) . '\'';
		$descriptorspec = array(
			0 => array(
				"pipe",
				"r"
			),
			1 => array(
				"pipe",
				"w"
			),
			2 => array(
				"file",
				"/tmp/ad_apk_error.txt",
				"a"
			)
		);
		$output = '';
		$process = proc_open($commond, $descriptorspec, $pipes, NULL, NULL);
		if (is_resource($process)) {
			fwrite($pipes [0], '');
			fclose($pipes [0]);
			$output = stream_get_contents($pipes [1]);
			fclose($pipes [1]);
			$return_value = proc_close($process);
		}
		if (empty($output)) {
			return FALSE;
		} else {
			preg_match("/package: name=['\"](.+?)['\"]/s", $output, $packageMatches);
			preg_match("/versionCode=['\"](.+?)['\"]/s", $output, $versionCodeMatches);
			preg_match("/versionName=['\"](.+?)['\"]/s", $output, $versionNameMatches);
			return array(
				'package_name' => $packageMatches [1],
				'version_code' => $versionCodeMatches [1],
				'version_name' => $versionNameMatches [1]
			);
		}
	}

	public function saveIcon($model, $icon) {
		$icon_uploadFile = Yii::getPathOfAlias('application') . "/../../data/icon/";
		if (!is_dir($icon_uploadFile)) {
			mkdir($icon_uploadFile, 0777, true);
		}
		$icon_name = $icon->getName();
		$icon_extensions = explode('.', $icon_name);
		$icon_extension = $icon_extensions[1];
		$icon_uploadFileLocation = $icon_uploadFile . $model->package_name . '.' . $icon_extension;
		if ($icon->saveAs($icon_uploadFileLocation, true)) {
			$model->icon_url = '/data/icon/' . $model->package_name . '.' . $icon_extension;
		}
		return $model;
	}

	public function saveImage($model, $image) {
		$image_uploadFile = Yii::getPathOfAlias('application') . "/../../data/img/";
		if (!is_dir($image_uploadFile)) {
			mkdir($image_uploadFile, 0777, true);
		}
		$image_name = $image->getName();
		$image_extensions = explode('.', $image_name);
		$image_extension = $image_extensions[1];
		$image_uploadFileLocation = $image_uploadFile . $model->package_name . '.' . $image_extension;
		if ($image->saveAs($image_uploadFileLocation, true)) {
			$model->image_url = '/data/img/' . $model->package_name . '.' . $image_extension;
		}
		return $model;
	}

	public function saveFile($model, $file) {
		$file_uploadFile = Yii::getPathOfAlias('application') . '/../../data/apk/';
		if (!is_dir($file_uploadFile)) {
			mkdir($file_uploadFile, 0777, true);
		}
		$file_name = $file->getName();
		$old_download = $model->download_url;
		$model->download_url = '/data/apk/' . $file_name;
		$file_uploadFileLocation = $file_uploadFile . $file_name;
		if ($file->saveAs($file_uploadFileLocation, true)) {
			if (strpos($old_download, '://')) {
				$old_download_paths = explode('/', $old_download);
				$old_download_path = $old_download_paths[3];
				if (file_exists($old_download_path)) {
					var_dump($old_download_path);
					unlink($file_uploadFile . $old_download_path);
				}
			}
			$model->file_size = $file->getSize();
			$apkFile = $this->parseApk($file_uploadFileLocation);
			$model->version_code = $apkFile['version_code'];
			$model->version_name = $apkFile['version_name'];
			$model->package_name = $apkFile['package_name'];
		}
		return $model;
	}
}
