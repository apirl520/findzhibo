<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => '今天看什么',
	'language' => 'zh_cn',
	// preloading 'log' component
	'preload' => array('log'),
	// autoloading model and component classes
	'import' => require(dirname(__FILE__) . '/../../../common/import.php'),
	'modules' => array(
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => 'opda',
			'ipFilters' => array('127.0.0.1', '::1'),
			'generatorPaths' => array(
				'bootstrap.gii', // since 0.9.1
			),
		),
	),
	// application components
	'components' => array(
		'clientScript' => array(
			//css js zip
			'class' => 'common.minify.EClientScript',
			'combineScriptFiles' => !YII_DEBUG,
			'combineCssFiles' => !YII_DEBUG,
			'scriptMap' => array(
				'jquery-ui.css' => false,
			),
		),
		'user' => array(
			// enable cookie-based authentication
			'class' => 'UserAccess',
			'allowAutoLogin' => true,
			'autoRenewCookie' => true,
			'identityCookie' => array('domain' => '.gameliveshow.com'),
			'stateKeyPrefix' => 'gameliveshow_auth',
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'rules' => require(dirname(__FILE__) . '/url.php'),
		),
		*/
		'db' => require(dirname(__FILE__).'/../../../common/db.php'),
		'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => 'site/error',
		),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
				// uncomment the following to show log messages on web pages
				array(
					'class'=>'CWebLogRoute',
				),
			),
		),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => require(dirname(__FILE__).'/params.php'),
);