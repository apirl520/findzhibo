<?php

class DreamPushTaskController extends Controller {

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
		$model = new DreamPushTask;

		if (isset($_POST['DreamPushTask'])) {
			$model->attributes = $_POST['DreamPushTask'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id));
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id);


		if (isset($_POST['DreamPushTask'])) {
			$model->attributes = $_POST['DreamPushTask'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id));
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
		$type = Yii::app()->request->getParam('type', false);
		$title = Yii::app()->request->getParam('title', false);
		$criteria = new CDbCriteria();
		$criteria->with = 'task';
		$criteria->order = 't.id desc';
		if ($type) {
			$criteria->condition = 'push_type =:push_type';
			$criteria->params = array(':push_type' => $type);
		}
		if ($title) {
			$criteria->compare('task.app_name', $title, true);
		}
		$dataProvider = new CActiveDataProvider('DreamPushTask');
		$dataProvider->setCriteria($criteria);
		$this->render('admin', array(
			'type' => $type,
			'title' => $title,
			'dataProvider' => $dataProvider,
		));
	}

	public function loadModel($id) {
		$model = DreamPushTask::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'dream-push-task-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
