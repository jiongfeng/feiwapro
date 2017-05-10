<?php
/**
 * 会员中心——账户概览
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');

class memberControl extends BaseMemberControl{

    /**
     * 我的商城
     */
    public function homeFeiwa() {
        $model_consume = Model('consume');
        $consume_list = $model_consume->getConsumeList(array('member_id' => $_SESSION['member_id']), '*', 0, 10);
        Tpl::output('consume_list', $consume_list);
        Tpl::showpage('member_home');
    }
}
