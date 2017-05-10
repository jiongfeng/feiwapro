<?php
/**
 * 卖家账号日志
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');
class seller_logControl extends BaseSellerControl {
    public function __construct() {
        parent::__construct();
    }

    public function log_listFeiwa() {
        $model_seller_log = Model('seller_log');
        $condition = array();
        $condition['log_store_id'] = $_SESSION['store_id'];
        if(!empty($_GET['seller_name'])) {
            $condition['log_seller_name'] = array('like', '%'.$_GET['seller_name'].'%');
        }
        if(!empty($_GET['log_content'])) {
            $condition['log_content'] = array('like', '%'.$_GET['log_content'].'%');
        }
        $condition['log_time'] = array('time', array(strtotime($_GET['add_time_from']), strtotime($_GET['add_time_to'])));
        $log_list = $model_seller_log->getSellerLogList($condition, 10, 'log_id desc');
        Tpl::output('log_list', $log_list);
        Tpl::output('show_page', $model_seller_log->showpage(2));

        $this->profile_menu('log_list');
        Tpl::showpage('seller_log.list');
    }

    /**
     * 用户中心右边，小导航
     *
     * @param string    $menu_key   当前导航的menu_key
     * @return
     */
    private function profile_menu($menu_key = '') {
        $menu_array = array();
        $menu_array[] = array(
            'menu_key' => 'log_list',
            'menu_name' => '日志列表',
            'menu_url' => urlMall('seller_log', 'log_list')
        );
        Tpl::output('member_menu', $menu_array);
        Tpl::output('menu_key', $menu_key);
    }

}
