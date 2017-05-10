<?php
/**
 * 消费记录
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');

class consumeControl extends BaseMemberControl {
    public function __construct() {
        parent::__construct();
    }
    
    public function indexFeiwa() {
        $model_consume = Model('consume');
        $consume_list = $model_consume->getConsumeList(array('member_id' => $_SESSION['member_id']), '*', 20);
        Tpl::output('show_page', $model_consume->showpage());
        Tpl::output('consume_list', $consume_list);
        Tpl::output('consume_type', $this->type);
        $this->profile_menu('consume', 'consume');
        Tpl::showpage('consume.list');
    }
    
    /**
     * 用户中心右边，小导航
     *
     * @param string    $menu_type  导航类型
     * @param string    $menu_key   当前导航的menu_key
     * @return
     */
    private function profile_menu($menu_type,$menu_key='') {
        $menu_array = array();
        switch ($menu_type) {
            case 'consume':
                $menu_array = array(
                1=>array('menu_key'=>'consume','menu_name'=>'消费记录',   'menu_url'=>'index.php?app=consume'));
                break;
        }
        Tpl::output('member_menu',$menu_array);
        Tpl::output('menu_key',$menu_key);
    }
}
