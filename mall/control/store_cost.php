<?php
/**
 * 商户消费日志
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');
class store_costControl extends BaseSellerControl {
    public function __construct() {
        parent::__construct();
    }

    public function cost_listFeiwa() {
        $model_store_cost = Model('store_cost');
        $condition = array();
        $condition['cost_store_id'] = $_SESSION['store_id'];
        if(!empty($_GET['cost_remark'])) {
            $condition['cost_remark'] = array('like', '%'.$_GET['cost_remark'].'%');
        }
        $condition['cost_time'] = array('time', array(strtotime($_GET['add_time_from']), strtotime($_GET['add_time_to'])));
        $cost_list = $model_store_cost->getStoreCostList($condition, 10, 'cost_id desc');
        Tpl::output('cost_list', $cost_list);
        Tpl::output('show_page', $model_store_cost->showpage(2));

        $this->profile_menu('cost_list');
        Tpl::showpage('store_cost.list');
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
            'menu_key' => 'cost_list',
            'menu_name' => '消费列表',
            'menu_url' => urlMall('store_cost', 'cost_list')
        );
        Tpl::output('member_menu', $menu_array);
        Tpl::output('menu_key', $menu_key);
    }

}
