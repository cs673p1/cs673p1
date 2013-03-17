<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Console Application',

    // preloading 'log' component
    'preload' => array('log'),

    // application components
    'components' => array(
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

        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
);
