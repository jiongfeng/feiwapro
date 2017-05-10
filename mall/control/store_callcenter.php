<?php
/**
 * 客服中心
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');

class store_callcenterControl extends BaseSellerControl {
    public function __construct() {
        parent::__construct();
        Language::read('member_store_index');
    }
    public function indexFeiwa(){
        $model_store = Model('store');
        $store_info = $model_store->getStoreInfo(array('store_id' => $_SESSION['store_id']));
        Tpl::output('storeinfo', $store_info);
        $this->profile_menu('store_callcenter');
        $model_seller = Model('seller');
        $seller_list = $model_seller->getSellerList(array('store_id' => $store_info['store_id']), '', 'seller_id asc');//账号列表
        Tpl::output('seller_list', $seller_list);
        Tpl::showpage('store_callcenter');
    }
    /**
     * 保存
     */
    public function saveFeiwa(){
        if(chksubmit()){
            $update = array();
            $i=0;
            if(is_array($_POST['pre']) && !empty($_POST['pre'])){
                foreach($_POST['pre'] as $val){
                    if(empty($val['name']) || empty($val['type']) || empty($val['num'])) continue;
                    $update['store_presales'][$i]['name']   = $val['name'];
                    $update['store_presales'][$i]['type']   = intval($val['type']);
                    $update['store_presales'][$i]['num']    = $val['num'];
                    $i++;
                }
                $update['store_presales'] = serialize($update['store_presales']);
            }else{
                $update['store_presales'] = serialize(null);
            }

            $i=0;
            if(is_array($_POST['after']) && !empty($_POST['after'])){
                foreach($_POST['after'] as $val){
                    if(empty($val['name']) || empty($val['type']) || empty($val['num'])) continue;
                    $update['store_aftersales'][$i]['name'] = $val['name'];
                    $update['store_aftersales'][$i]['type'] = intval($val['type']);
                    $update['store_aftersales'][$i]['num']  = $val['num'];
                    $i++;
                }
                $update['store_aftersales'] = serialize($update['store_aftersales']);
            }else{
                $update['store_aftersales'] = serialize(null);
            }

            $update['store_workingtime'] = $_POST['working_time'];
            $where = array();
            $where['store_id']  = $_SESSION['store_id'];
            Model('store')->editStore($update,$where);
            showDialog(Language::get('feiwa_common_save_succ'), 'index.php?app=store_callcenter', 'succ');
        }
    }
    /**
     * 用户中心右边，小导航
     *
     * @param string    $menu_type  导航类型
     * @param string    $menu_key   当前导航的menu_key
     * @return
     */
    private function profile_menu($menu_key) {
        $menu_array = array(
            1=>array('menu_key'=>'store_callcenter','menu_name'=>Language::get('feiwa_member_path_store_callcenter'),'menu_url'=>'index.php?app=store_callcenter'),
        );
        Tpl::output('member_menu',$menu_array);
        Tpl::output('menu_key',$menu_key);
    }
}
