<?php

// uncomment the following to define a path alias
Yii::setPathOfAlias('bootstrap',dirname(__FILE__).'/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Home',

    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
    ),

    //set for bootstrap theme
    'theme'=>'bootstrap',
    'modules'=>array(
        // uncomment the following to enable the Gii tool
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'123',

            // If removed, Gii defaults to localhost only. Edit carefully to taste.

            'ipFilters'=>array('127.0.0.1','::1'),

            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
        ),
    ),

    // application components
    'components'=>array(
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),

        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
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
        ),
        */

        /*
        'db'=>array(
            'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
        ),
        */

        // uncomment the following to use a MySQL database
        'db'=>array(
            'connectionString' => 'mysql:host=us-cdbr-east-03.cleardb.com;dbname=heroku_8c20d29b464abbf',
            'emulatePrepare' => true,
            'username' => 'bd1706af4acf21',
            'password' => '8809959f',
            'charset' => 'utf8',
        ),

        //uncomment the following to use authmananger

        'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
            'assignmentTable'=>'AuthAssignment',
            'itemTable' => 'AuthItem',
            'itemChildTable' => 'AuthItemChild',
            'defaultRoles'=>array('authenticated', 'guest'),
        ),


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
    /*	'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
        ),
    */
);
