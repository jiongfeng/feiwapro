<?php
/**
 * 队列
 *
 *
 *
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 */
$_SERVER['argv'][1] = $_GET['app'];
@$_SERVER['argv'][2] = $_GET['feiwa'];

if (empty($_SERVER['argv'][1])) exit('Access Invalid!');

define('APP_ID','crontab');
define('BASE_PATH',str_replace('\\','/',dirname(__FILE__)));
define('TRANS_MASTER',true);
require __DIR__ . '/../feiwa.php';

if (PHP_SAPI == 'cli') {
     $_GET['app'] = $_SERVER['argv'][1];
     $_GET['feiwa'] = empty($_SERVER['argv'][2]) ? 'index' : $_SERVER['argv'][2];
}
if (!@include(BASE_PATH.'/control/control.php')) exit('control.php isn\'t exists!');
Base::run();
