<?php
/**
 * 财付通返回地址
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
error_reporting(7);
$_GET['app']	= 'payment';
$_GET['feiwa']		= 'return';
$_GET['payment_code'] = 'tenpay';

//赋值，方便后面合并使用支付宝验证方法
$_GET['out_trade_no'] = $_GET['sp_billno'];
$_GET['extra_common_param'] = $_GET['attach'];
$_GET['trade_no'] = $_GET['transaction_id'];

require_once(dirname(__FILE__).'/../../../index.php');
?>