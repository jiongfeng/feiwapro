<?php
/**
 * 微信支付通知地址
 *
 * 
 * @Copyright (c) 2015-2018 Shandong Polang Network Technology Co., Ltd. (http://polang.net.cn)
 * @license    http://www.feiwa.org
 * @link       http://www.feiwa.org
 * @since      File available since Release v1.1
 */
$_GET['app']	= 'payment';
$_GET['feiwa']		= 'notify';
$_GET['payment_code'] = 'wxpay3';
require_once(dirname(__FILE__).'/../../../index.php');
