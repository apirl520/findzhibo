<?php
/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/3/3
 * Time: 下午3:08
 */
Yii::setPathOfAlias('root', YII_PATH . '/../');
Yii::setPathOfAlias('data', Yii::getPathOfAlias('root') . '/data');
Yii::setPathOfAlias('models', Yii::getPathOfAlias('root') . '/models');
Yii::setPathOfAlias('common', Yii::getPathOfAlias('root') . '/common');
Yii::setPathOfAlias('bootstrap3', Yii::getPathOfAlias('common') . '/bootstrap3');
return array(
	'models.*',
	'common.*',
	'common.snoopy.*',
	'models.default.*',
	'application.models.*',
	'application.components.*',
);