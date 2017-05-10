<?php
/**
 * 菜单
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 */
defined('ByFeiWa') or exit('Access Invalid!');
$_menu['feiwa'] = array (
        'name' => '运营',
        'child' => array(
                 array(
                        'name' => '运营应用',
                        'child' => array(
								'link' => '友情连接',
								'feiwa' => '运营控件',
								'goods' => '商品组件',
								'db' => '数据库管理',
								'store' => '店铺组件',
								'member'=>'会员组件',
								'link_feiwa'=>'在线更新',
                        )
                ),
//              array(
//                      'name' => '一元夺宝',
//                      'child' => array(
//								'setting' => '夺宝设置',
//								'yydb'=>'夺宝列表',
//								'yydb_class'=>'夺宝分类',
//                      )
//              ),
//              array(
//                      'name' => '跨境电商',
//                      'child' => array(
//                              'cb_manage' => '跨境设置',
//                              'cb_index' => '跨境首页',
//                              'cb_navigation' => '跨境分类',
//                              'cb_tag' => '跨境店铺',
//                              'cb_comment' => '跨境商品',
//                              'cb_comment' => '跨境品牌'
//                      )
//              ),
//              array(
//                      'name' => '微信运营',
//                      'child' => array(
//                              'reads_special' => $lang['feiwa_reads_special_manage']
//                      )
//              ),
));