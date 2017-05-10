<?php
/**
 * 物流自提服务站首页
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');

class loginControl extends BaseAccountCenterControl{
    public function __construct(){
        parent::__construct();
    }
    /**
     * 登录
     */
    public function indexFeiwa() {
        if ($_SESSION['delivery_login'] == 1) {
            @header('location: index.php?app=d_center');die;
        }
        if (chksubmit()) {
            $where = array();
            $where['dlyp_name'] = $_POST['dname'];
            $where['dlyp_passwd'] = md5($_POST['dpasswd']);
            $dp_info = Model('delivery_point')->getDeliveryPointInfo($where);
            if (!empty($dp_info)) {
                $_SESSION['delivery_login'] = 1;
                $_SESSION['dlyp_id'] = $dp_info['dlyp_id'];
                $_SESSION['dlyp_name'] = $dp_info['dlyp_name'];
                showDialog('登录成功', 'index.php?app=d_center', 'succ');
            } else {
                showDialog('登录失败');
            }
        }
        Tpl::showpage('login');
    }
    /**
     * 登出
     */
    public function logoutFeiwa() {
        unset($_SESSION['delivery_login']);
        unset($_SESSION['dlyp_id']);
        unset($_SESSION['dlyp_name']);
        showDialog('退出成功', 'reload', 'succ');
    }
}
