<?php

class SiteController extends Controller {

	public $layout = '//layouts/column';

	public function actionIndex() {
		if (Yii::app()->user->isGuest) {
			$this->redirect('site/login');
		} else {
			$average = 0;
			$today_total = 0;
			$date = date('Y-m-d H:i:s', strtotime('-1 week'));
			$user_data = array();
			$app_id = Yii::app()->request->getParam('app_id', false);
			$criteria = new CDbCriteria();
			if ($app_id) {
				$criteria->condition = 'app_id =:app_id and ctime >=:date';
				$criteria->params = array(':app_id' => $app_id, ':date' => $date . ' 00:00:00');
			} else {
				$criteria->condition = 'ctime >=:date';
				$criteria->params = array(':date' => $date . ' 00:00:00');
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
			$average = round($total / 7);
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