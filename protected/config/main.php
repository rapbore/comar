<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Comercio Arica',
	'language'=>'es',

	// preloading 'log' component
	'preload'=>array('log','bootstrap','session',),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.giix-components.*', 
		'application.modules.rights.*',
		'application.modules.rights.components.*',
		'application.extensions.bootstrap.*',
	),

	'modules'=>array(
		'rights'=>array( 			
				'superuserName'=>'admin',
				'enableBizRuleData'=>true,
				'install'=>false,				
		),
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'comar.2012',
			'generatorPaths' =>  array(
					'ext.giix-core', // giix generators
			),
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'session' => array (
			'sessionName' =>'Session',
			'class'=> 'CDbHttpSession',			
			'autoCreateSessionTable'=> true,
			'connectionID' => 'db',
			'sessionTableName' => 'yiisession',
			'timeout' => 800,
		),
		'bootstrap'=>array(
				'class'=>'ext.bootstrap.components.Bootstrap', 
		),
	
		'user'=>array(
			'class'=>'RWebUser', 
			'allowAutoLogin'=>true,
		),
		
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'urlSuffix'=>'.html',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		'authManager'=>array(
			'class'=>'RDbAuthManager',		
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=comar',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'lapolla',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		
		'request' => array(
        'class' => 'application.components.HttpRequest',
			'enableCsrfValidation' => true,
			'enableCookieValidation'=>true,
			'noCsrfValidationRoutes'=>array(),
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
		'adminEmail'=>'contacto@raboit.com',
	),
);