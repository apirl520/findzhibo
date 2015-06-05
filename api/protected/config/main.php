<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'API for APPS in 91shoufu',
	'language' => 'zh_cn',
	// preloading 'log' component
	'preload' => array('log', 'bootstrap3'),
	// autoloading model and component classes
	'import' => require(dirname(__FILE__) . '/../../../common/import.php'),
	'modules' => array(
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => 'apirl',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters' => array('127.0.0.1', '::1'),
		),
	),
	// application components
	'components' => array(
		'user' => array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
			'autoRenewCookie' => true,
			'stateKeyPrefix' => 'igt_auth',
			'class' => 'UserAccess',
		),
		'session' => array(
			'cookieParams' => array('domain' => '.findzhibo.com', 'lifetime' => 0),
			'timeout' => 3600,
		),
		'bootstrap' => array(
			'class' => 'bootstrap3.components.Bootstrap3',
		),
		// uncomment the following to enable URLs in path-format
		'urlManager' => array(
			'urlFormat' => 'path',
			'rules' => array(
				'' => 'site/index',
				'test' => 'test/index',
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
			),
		),
		'db' => require(dirname(__FILE__) . '/../../../common/db.php'),
		'dream' => require(dirname(__FILE__) . '/../../../common/dreamDb.php'),
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
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => array(
		'open_status' => true,
		'host' => 'http://www.findzhibo.com'
	),
);