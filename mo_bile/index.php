<?php
/**
 * 手机接口初始化文件
 *
 *
 * @Copyright (c) 2015-2018 Shandong Polang Network Technology Co., Ltd. (http://polang.net.cn)
 * @license    http://www.feiwa.org
 * @link       http://www.feiwa.org
 * @since      File available since Release v1.1
 */

define('APP_ID','mobile');
define('IGNORE_EXCEPTION', true);
define('BASE_PATH',str_replace('\\','/',dirname(__FILE__)));

require __DIR__ . '/../feiwa.php';
define('MOBILE_RESOURCE_SITE_URL',MOBILE_SITE_URL.DS.'resource');

if (!is_null($_GET['key']) && !is_string($_GET['key'])) {
    $_GET['key'] = null;
}
if (!is_null($_POST['key']) && !is_string($_POST['key'])) {
    $_POST['key'] = null;
}
if (!is_null($_REQUEST['key']) && !is_string($_REQUEST['key'])) {
    $_REQUEST['key'] = null;
}

//框架扩展
require(BASE_PATH.'/framework/function/function.php');
if (!@include(BASE_PATH.'/control/control.php')) exit('control.php isn\'t exists!');
Base::run();