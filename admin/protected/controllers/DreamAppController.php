<?php

class DreamAppController extends Controller {

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
		$model = new DreamApp;


		if (isset($_POST['DreamApp'])) {
			$model->attributes = $_POST['DreamApp'];
			if ($model->app_id == -1 && $model->title) {
				$app_id = DreamAppBase::model()->setAppTitle($model->title);
				$model->app_id = $app_id;
			} else {
				$model->title = DreamAppBase::model()->getAppTitle($model->app_id);
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


		if (isset($_POST['DreamApp'])) {
			if ($model->app_id != $_POST['DreamApp']['app_id']) {
				$model->title = DreamAppBase::model()->getAppTitle($_POST['DreamApp']['app_id']);
			}
			$model->attributes = $_POST['DreamApp'];
			if ($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	public function actionDelete($id) {
		$this->loadModel($id)->delete();

		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionAdmin() {
		$title = Yii::app()->request->getParam('title', false);
		$criteria = new CDbCriteria();
		$criteria->order = 'id desc';
		if ($title) {
			$criteria->compare('title', $title, true);
		}
		$dataProvider = new CActiveDataProvider('DreamApp');
		$dataProvider->setCriteria($criteria);
		$this->render('admin', array(
			'title' => $title,
			'dataProvider' => $dataProvider,
		));
	}

	public function loadModel($id) {
		$model = DreamApp::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	public function getAppIds() {
		$criteria = new CDbCriteria();
		$criteria->order = 'id desc';
		return CHtml::listData(DreamAppBase::model()->findAll($criteria), 'id', 'title');
	}

	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'dream-app-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
