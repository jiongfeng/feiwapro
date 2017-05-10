<?php
/**
 *
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029 欢迎加入feiwa.org
 */
define('APP_ID','chain');
define('BASE_PATH',str_replace('\\','/',dirname(__FILE__)));

require __DIR__ . '/../feiwa.php';

define('APP_SITE_URL', CHAIN_SITE_URL);
define('CHAIN_TEMPLATES_URL', CHAIN_SITE_URL.'/templates/'.TPL_CHAIN_NAME);
define('BASE_CHAIN_TEMPLATES_URL', dirname(__FILE__).'/templates/'.TPL_CHAIN_NAME);
define('CHAIN_RESOURCE_SITE_URL',CHAIN_SITE_URL.'/resource');
define('TPL_NAME', TPL_CHAIN_NAME);
define('MALL_TEMPLATES_URL',MALL_SITE_URL.'/templates/'.TPL_NAME);
if (!@include(BASE_PATH.'/control/control.php')) exit('control.php isn\'t exists!');
Base::run();
