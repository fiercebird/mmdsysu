<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'中山大学教学设备管理平台',
	'homeUrl' => '?r=site/index',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
        
        //设置语言为中文
        'language'=>'zh_cn',
        
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('127.0.0.1','::1'),
			'ipFilters'=>array('*','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>false,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),*/
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
                //这里是永燊的数据库配置
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=mis',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'eissvbub',
			'charset' => 'utf8',
		),*/
		
                 //这里是梓滨的数据库配置
                 'db'=>array(
        			'connectionString' => 'mysql:host=localhost;dbname=mis',
        			'emulatePrepare' => true,
        			'username' => 'root',
        			'password' => 'dou',
        			'charset' => 'utf8',
        		),
                 
                //这里是文欢的数据库配置
				/*
                 'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=mis',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'newpassword',
			'charset' => 'utf8',
		),
        */
                
                //测试服务器数据库配置
                /*
                'db'=>array(
			'connectionString' => 'mysql:host=utips8008.mysql.rds.aliyuncs.com;dbname=test_zzb',
			'emulatePrepare' => true,
			'username' => 'zzb',
			'password' => 'doudou',
			'charset' => 'utf8',
		),
                 * 
                 */
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
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
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);