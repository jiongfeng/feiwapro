<?php
/**
 * 网银在线自动对账文件
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */
error_reporting(7);
$_GET['app']	= 'payment';
$_GET['feiwa']		= 'notify';
$_GET['payment_code'] = 'chinabank';

//赋值，方便后面合并使用支付宝验证方法
$_POST['out_trade_no'] = $_POST['v_oid'];
$_POST['extra_common_param'] = $_POST['remark1'];
$_POST['trade_no'] = $_POST['v_idx'];

require_once(dirname(__FILE__).'/../../../index.php');
?>