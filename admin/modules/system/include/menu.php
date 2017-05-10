<?php
/**
 * 菜单
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 */
defined('ByFeiWa') or exit('Access Invalid!');
$_menu['system'] = array (
        'name' => '平台',
        'child' => array (
                array(
                        'name' => $lang['feiwa_config'],
                        'child' => array(
                                'setting' => $lang['feiwa_web_set'],
                                'upload' => $lang['feiwa_upload_set'],
                                'message' => '邮件设置',
                                'taobao_api' => '淘宝接口',
                                'admin' => '权限设置',
                                'admin_log' => $lang['feiwa_admin_log'],
                                'area' => '地区设置',
                                'cache' => $lang['feiwa_admin_clear_cache'],
								
                        )
                ),
                array(
                        'name' => $lang['feiwa_member'],
                        'child' => array(
                                
                                'account' => $lang['feiwa_web_account_syn']
                        )
                ),
                array(
                        'name' => $lang['feiwa_website'],
                        'child' => array(
                                'article_class' => $lang['feiwa_article_class'],
                                'article' => $lang['feiwa_article_manage'],
                                'document' => $lang['feiwa_document'],
                                'navigation' => $lang['feiwa_navigation'],
                                'adv' => $lang['feiwa_adv_manage'],
                                'rec_position' => $lang['feiwa_admin_res_position'],
                        )
                ),
        ) 
);
