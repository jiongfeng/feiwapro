<?php
/**
 * 菜单
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 */
defined('ByFeiWa') or exit('Access Invalid!');
$_menu['mobile'] = array (
        'name'=>$lang['feiwa_mobile'],
        'child'=>array(
                array(
                        'name'=>'设置',
                        'child' => array(
						        'mb_setting' => '手机端设置',
                                'mb_special' => '模板设置',
                                'mb_category' => $lang['feiwa_mobile_catepic'],
                                'mb_app' => '应用安装',
                                'mb_feedback' => $lang['feiwa_mobile_feedback'],
                                'mb_payment' => '手机支付',
                                'mb_wx' => '微信二维码',
								'mb_connect' => '第三方登入',
                        )
                )
        )
);