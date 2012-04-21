<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

define('ADMIN_USER','iikocyan');

require_once($yii);
require_once(dirname(__FILE__).'/protected/components/WebApplication.php');
$app=Yii::createApplication('WebApplication', $config);
$app->timer->init();
$app->mode='admin';
$app->run();
