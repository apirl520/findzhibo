<?php
/**
 * Created by PhpStorm.
 * User: shilei
 * Date: 15/3/3
 * Time: 下午3:21
 */
return array(
	'' => 'site/index',
	'<_c:(image|file)>/<_a>/<id:\d+>' => '<_c>/<_a>',
	'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
	'<controller:\w+>/<id:\d+>' => '<controller>/view',
	'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
	'<controller:\w+>/<action:\w+>/<name:\d+>' => '<controller>/<action>',
);
?>