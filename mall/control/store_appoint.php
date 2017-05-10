<?php
/**
 * 商家 预约/到货通知
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');

class store_appointControl extends BaseSellerControl {

    public function __construct() {
        parent::__construct();
    }

    /**
     * 买家我的订单，以总订单pay_sn来分组显示
     *
     */
    public function indexFeiwa() {
        $model_arrtivalnotice = Model('arrival_notice');
        $appoint_list = $model_arrtivalnotice->getArrivalNoticeList(array('store_id' => $_SESSION['store_id']), '*', '', '15');
        if (!empty($appoint_list)) {
            $memberid_array = array();
            foreach ($appoint_list as $val) {
                $memberid_array = $val['member_id'];
            }
            $member_list = Model('member')->getMemberList(array('member_id' => array('in', $memberid_array)), 'member_id,member_name');
            $member_list = array_under_reset($member_list, 'member_id');
            Tpl::output('member_list', $member_list);
        }
        Tpl::output('appoint_list', $appoint_list);
        Tpl::output('show_page', $model_arrtivalnotice->showpage());
        self::profile_menu('member_appoint');
        Tpl::showpage('store_appoint.list');
    }
    
    /**
     * 删除
     */
    public function del_appointFeiwa() {
        $id = intval($_GET['id']);
        $model_arrtivalnotice = Model('arrival_notice');
        $model_arrtivalnotice->delArrivalNotice(array('store_id' => $_SESSION['store_id'], 'an_id' => $id));
        showDialog('操作成功', 'reload', 'succ');
    }
    
    /**
     * 用户中心右边，小导航
     *
     * @param string    $menu_type  导航类型
     * @param string    $menu_key   当前导航的menu_key
     * @return
     */
    private function profile_menu($menu_key='') {
        $menu_array = array(
            array('menu_key'=>'member_appoint','menu_name'=>'预约/到货通知列表', 'menu_url'=>'index.php?app=store_appoint')
        );
        Tpl::output('member_menu',$menu_array);
        Tpl::output('menu_key',$menu_key);
    }
}
