<?php
/**
 * 菜单
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 */
defined('ByFeiWa') or exit('Access Invalid!');
$_menu['circle'] = array (
        'name' => $lang['feiwa_circle'],
        'child' => array (
                array (
                        'name' => $lang['feiwa_config'],
                        'child' => array(
                                'circle_setting' => $lang['feiwa_circle_setting'],
                                'circle_adv' => '首页幻灯'
                        )
                ),
                array (
                        'name' => '成员',
                        'child' => array(
                                'circle_member' => $lang['feiwa_circle_membermanage'],
                                'circle_memberlevel' => '成员头衔'
                        )
                ),
                array (
                        'name' => '圈子',
                        'child' => array(
                                'circle_manage' => $lang['feiwa_circle_manage'],
                                'circle_class' => $lang['feiwa_circle_classmanage'],
                                'circle_theme' => $lang['feiwa_circle_thememanage'],
                                'circle_inform' => '举报管理'
                        )
                )
        ) 
);