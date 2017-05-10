<?php
/**
 * 圈子板块初始化文件
 *
 * 圈子板块初始化文件，引用框架初始化文件
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
define('APP_ID','circle');
define('BASE_PATH',str_replace('\\','/',dirname(__FILE__)));

require __DIR__ . '/../feiwa.php';

define('APP_SITE_URL', CIRCLE_SITE_URL);
define('TPL_NAME', TPL_CIRCLE_NAME);
define('CIRCLE_TEMPLATES_URL', CIRCLE_SITE_URL.'/templates/'.TPL_NAME);
define('MALL_TEMPLATES_URL',MALL_SITE_URL.'/templates/'.TPL_NAME);
define('CIRCLE_RESOURCE_SITE_URL',CIRCLE_SITE_URL.'/resource');
require(BASE_PATH.'/framework/function/function.php');

require(BASE_PATH.'/control/control.php');
Base::run();
