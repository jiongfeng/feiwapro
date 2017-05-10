<?php
/**
 * 菜单
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 */
defined('ByFeiWa') or exit('Access Invalid!');
$_menu['shareshow'] = array (
        'name' => '分享秀',
        'child' => array(
                array(
                        'name' => $lang['feiwa_config'], 
                        'child' => array(
                                'manage' => $lang['feiwa_shareshow_manage'],
                                'comment' => $lang['feiwa_shareshow_comment_manage'],
                                'adv' => $lang['feiwa_shareshow_adv_manage']
                        )
                ),
                array(
                        'name' => '随心看', 
                        'child' => array(
                                'goods' => $lang['feiwa_shareshow_goods_manage'],
                                'goods_class' => $lang['feiwa_shareshow_goods_class']
                        )
                ),
                array(
                        'name' => '个人秀', 
                        'child' => array(
                                'personal' => $lang['feiwa_shareshow_personal_manage'],
                                'personal_class' => $lang['feiwa_shareshow_personal_class']
                        )
                        
                ),
                array(
                        'name' => '店铺街',
                        'child' => array(
                                'store' => $lang['feiwa_shareshow_store_manage']
                        )
                )
        )
);