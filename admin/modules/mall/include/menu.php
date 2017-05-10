<?php
/**
 * 菜单
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 */
defined('ByFeiWa') or exit('Access Invalid!');

$_menu['mall'] = array(
        'name' => '商城',
        'child' => array(
                array(
                        'name' => '设置',
                        'child' => array(
                                'setting' => '商城设置',
                                'upload' => '图片设置',
                                'search' => '搜索设置',
                                'seo' => $lang['feiwa_seo_set'],
                                'message' => $lang['feiwa_message_set'],
                                'payment' => $lang['feiwa_pay_method'],
                                'express' => $lang['feiwa_admin_express_set'],
                                'waybill' => '运单模板',
                                'web_config' => '首页管理',
                                'web_channel' => '频道管理'
                        )),
                array(
                        'name' => $lang['feiwa_goods'],
                        'child'=>array(
                                'goods' => $lang['feiwa_goods_manage'],
                                'goods_class' => $lang['feiwa_class_manage'],
                                'brand' => $lang['feiwa_brand_manage'],
                                'type' => $lang['feiwa_type_manage'],
                                'spec' => $lang['feiwa_spec_manage'],
                                'goods_album' => $lang['feiwa_album_manage'],
                                'goods_recommend' => '商品推荐'
                        )),
                array(
                        'name' => $lang['feiwa_store'],
                        'child' => array(
                                'store' => $lang['feiwa_store_manage'],
                                'store_grade' => $lang['feiwa_store_grade'],
                                'store_class' => $lang['feiwa_store_class'],
                                'domain' => $lang['feiwa_domain_manage'],
                                'sns_strace' => $lang['feiwa_s_snstrace'],
                                'help_store' => '店铺帮助',
                                'store_joinin' => '商家入驻',
                                'ownmall' => '自营店铺'
                        )),
                array(
                        'name' => $lang['feiwa_member'],
                        'child' => array(
                                'member' => $lang['feiwa_member_manage'],
                                'member_exp' => '等级经验值',
                                'points' => $lang['feiwa_member_pointsmanage'],
                                'sns_sharesetting' => $lang['feiwa_binding_manage'],
                                'sns_malbum' => $lang['feiwa_member_album_manage'],
                                'snstrace' => $lang['feiwa_snstrace'],
                                'sns_member' => $lang['feiwa_member_tag'],
                                'predeposit' => $lang['feiwa_member_predepositmanage'],
                                'chat_log' => '聊天记录',
								'realname' => '会员认证'
                        )),
                array(
                        'name' => $lang['feiwa_trade'],
                        'child' => array(
                                'order' => $lang['feiwa_order_manage'],
                                'vr_order' => '虚拟订单',
                                'refund' => '退款管理',
                                'return' => '退货管理',
                                'vr_refund' => '虚拟订单退款',
                                'consulting' => $lang['feiwa_consult_manage'],
                                'inform' => $lang['feiwa_inform_config'],
                                'evaluate' => $lang['feiwa_goods_evaluate'],
                                'complain' => $lang['feiwa_complain_config']
                        )),
                array(
                        'name' => $lang['feiwa_operation'],
                        'child' => array(
                                'operating' => '运营设置',
                                'bill' => $lang['feiwa_bill_manage'],
                                'vr_bill' => '虚拟订单结算',
                                'mall_consult' => '平台客服',
                                'rechargecard' => '平台充值卡',
                                'delivery' => '物流自提服务站',
                                'contract' => '消费者保障服务'
                        )),
                array(
                        'name' => '促销',
                        'child' => array(
                                'operation' => '促销设定',
                                'groupbuy' => $lang['feiwa_groupbuy_manage'],
                                'vr_groupbuy' => '虚拟团购设置',
                                'promotion_cou' => '加价购',
                                'promotion_xianshi' => $lang['feiwa_promotion_xianshi'],
                                'promotion_mansong' => $lang['feiwa_promotion_mansong'],
                                'promotion_bundling' => $lang['feiwa_promotion_bundling'],
                                'promotion_booth' => '推荐展位',
                                'promotion_book' => '预售商品',
                                'promotion_fcode' => 'Ｆ码商品',
                                'promotion_combo' => '推荐组合',
                                'promotion_sole' => '手机专享',
                                'pointprod'=>$lang['feiwa_pointprod'],
                                'voucher' => $lang['feiwa_voucher_price_manage'],
                                'redpacket' => '平台红包',
                                'activity' => $lang['feiwa_activity_manage']
                        )),
                array(
                        'name' => $lang['feiwa_stat'],
                        'child' => array(
                                'stat_general' => $lang['feiwa_statgeneral'],
                                'stat_industry' => $lang['feiwa_statindustry'],
                                'stat_member' => $lang['feiwa_statmember'],
                                'stat_store' => $lang['feiwa_statstore'],
                                'stat_trade' => $lang['feiwa_stattrade'],
                                'stat_goods' => $lang['feiwa_statgoods'],
                                'stat_marketing' => $lang['feiwa_statmarketing'],
                                'stat_aftersale' => $lang['feiwa_stataftersale']
                        ))
));
