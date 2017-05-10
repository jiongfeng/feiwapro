<?php
/**
 * 商城板块初始化文件
 *
 * 商城板块初始化文件，引用框架初始化文件
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
define('APP_ID','reads');
define('BASE_PATH',str_replace('\\','/',dirname(__FILE__)));
require __DIR__ . '/../feiwa.php';

if (!@include(BASE_PATH.'/config/config.ini.php')){
	@header("Location: install/index.php");die;
}

define('APP_SITE_URL', READS_SITE_URL);
define('TPL_NAME',TPL_READS_NAME);
define('BASE_TPL_PATH',BASE_PATH.'/templates/'.TPL_NAME);

define('READS_RESOURCE_SITE_URL',READS_SITE_URL.'/resource');
define('READS_TEMPLATES_URL',READS_SITE_URL.'/templates/'.TPL_NAME);
define('MALL_TEMPLATES_URL',MALL_SITE_URL.'/templates/'.TPL_NAME);
define('READS_BASE_TPL_PATH',dirname(__FILE__).'/templates/'.TPL_NAME);
define('READS_SEO_KEYWORD',$config['seo_keywords']);
define('READS_SEO_DESCRIPTION',$config['seo_description']);
//reads框架扩展
require(BASE_PATH.'/framework/function/function.php');
if (!@include(BASE_PATH.'/control/control.php')) exit('control.php isn\'t exists!');

Base::run();
