<?php
/**
 * 菜单
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 */
defined('ByFeiWa') or exit('Access Invalid!');
$_menu['reads'] = array (
        'name' => $lang['feiwa_reads'],
        'child' => array(
                array(
                        'name' => $lang['feiwa_config'],
                        'child' => array(
                                'reads_manage' => $lang['feiwa_reads_manage'],
                                'reads_index' => $lang['feiwa_reads_index_manage'],
                                'reads_navigation' => $lang['feiwa_reads_navigation_manage'],
                                'reads_tag' => $lang['feiwa_reads_tag_manage'],
                                'reads_comment' => $lang['feiwa_reads_comment_manage']
                        )
                ),
                array(
                        'name' => '专题',
                        'child' => array(
                                'reads_special' => $lang['feiwa_reads_special_manage']
                        )
                ),
                array(
                        'name' => '文章',
                        'child' => array(
                                'reads_article_class' => '文章分类',
                                'reads_article' => '文章管理'
                        )
                ),
                array(
                        'name' => '画报',
                        'child' => array(
                                'reads_picture_class' => '画报分类',
                                'reads_picture' => '画报管理'
                        )
                )
));