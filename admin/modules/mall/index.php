<?php
/**
 * 商城板块初始化文件
 *
 *
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 */

define('BASE_PATH',str_replace('\\','/',dirname(dirname(dirname(__FILE__)))));
define('MODULES_BASE_PATH',str_replace('\\','/',dirname(__FILE__)));
require __DIR__ . '/../../../feiwa.php';

define('TPL_NAME',TPL_ADMIN_NAME);
define('ADMIN_TEMPLATES_URL',ADMIN_SITE_URL.'/templates/'.TPL_NAME);
define('ADMIN_RESOURCE_URL',ADMIN_SITE_URL.'/resource');
define('MALL_TEMPLATES_URL',MALL_SITE_URL.'/templates/'.TPL_NAME);
define('BASE_TPL_PATH',MODULES_BASE_PATH.'/templates/'.TPL_NAME);
define('MODULE_NAME', 'mall');
if (!@include(BASE_PATH.'/control/control.php')) exit('control.php isn\'t exists!');
$system='mall';

Base::runadmin($system);

