<?php

class SiteController extends CController {

	public function actions() {
		return array(
			'captcha' => array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),
			'page' => array(
				'class' => 'CViewAction',
			),
		);
	}

	public function actionIndex() {
		echo '{"code":404}';
	}

	public function actionError() {
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest) {
				echo $error['message'];
			} else {
				$output['code'] = $error['code'];
				$output['message'] = $error['message'];
				echo json_encode($output);
				exit;
			}
		}
	}
}