<?php
defined('ByFeiWa') or exit('Access Invalid!');
/*
 * 配置文件
 */
$options = array();
$options['apikey'] = C('feiwa_sms_key'); //apikey
$options['signature'] =  C('feiwa_sms_signature'); //签名
return $options;
?>