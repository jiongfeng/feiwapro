<?php
/**
 * 前台control父类
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 */
defined('ByFeiWa') or exit('Access Invalid!');

/********************************** 前台control父类 **********************************************/

class BaseControl {
	public function __construct(){
		Language::read('common');
	}
}
