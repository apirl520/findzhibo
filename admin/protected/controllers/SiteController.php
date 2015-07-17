<?php

class SiteController extends Controller {

	public $layout = '//layouts/column';

	public function actionIndex() {
		if (Yii::app()->user->isGuest) {
			$this->redirect('site/login');
		} else {
			$average = 0;
			$today_total = 0;
			$user_data = array();
			$app_id = Yii::app()->request->getParam('app_id', false);
			$criteria = new CDbCriteria();
			if ($app_id) {
				$criteria->condition = 'app_id =:app_id';
				$criteria->params = array(':app_id' => $app_id);
			}
			$total = DreamDeviceUuid::model()->count($criteria);
			$criteria->select = 'count(*) as device_id,app_id,DATE(ctime) as ctime';
			$criteria->group = 'DATE(ctime)';
			$details = DreamDeviceUuid::model()->findAll($criteria);
			foreach ($details as $key => $detail) {
				$user_data[$key][] = strtotime($detail->ctime . 'UTC') * 1000;
				$user_data[$key][] = $detail->device_id;
				if (($key + 1) == count($details)) {
					$today_total = $detail->device_id;
				}
			}
			$criteria = new CDbCriteria();
			$criteria->order = 'id asc';
			$first_date = DreamDeviceUuid::model()->find($criteria);
			$criteria->order = 'id desc';
			$end_date = DreamDeviceUuid::model()->find($criteria);
			$day_range = round((strtotime($end_date->ctime) - strtotime($first_date->ctime)) / 86400);
			$average = round($total / $day_range);
			$this->render('index', array(
				'total' => $total,
				'app_id' => $app_id,
				'user_data' => $user_data,
				'average' => $average,
				'today_total' => $today_total,
			));
		}
	}


	public function actionLogin() {
		$this->layout = 'login';

		$model = new LoginForm;


		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			if ($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		$this->render('login', array('model' => $model));
	}

	public function actionLogout() {
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionError() {
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}