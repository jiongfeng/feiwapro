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

class joinin_againControl extends BaseDeliveryCenterControl{
    public function __construct(){
        parent::__construct();
    }
    /**
     * 编辑信息
     */
    public function indexFeiwa() {
        $model_dp = Model('delivery_point');
        $dpoint_info = $model_dp->getDeliveryPointFailInfo(array('dlyp_id' => $_SESSION['dlyp_id']));
        Tpl::output('dpoint_info', $dpoint_info);
        Tpl::showpage('joinin_again', 'login_layout');
    }
    /**
     * 保存申请
     */
    public function edit_deliveryFeiwa() {
        if (!chksubmit()) {
            showDialog(L('wrong_argument'));
        }
        $dlyp_id = $_POST['did'];
        if ($dlyp_id <= 0) {
            showDialog(L('feiwa_common_op_fail'));
        }
        $update = array();
        $update['dlyp_name']        = $_POST['dname'];
        $update['dlyp_passwd']      = md5($_POST['dpasswd']);
        $update['dlyp_truename']    = $_POST['dtruename'];
        $update['dlyp_mobile']      = $_POST['dmobile'];
        $update['dlyp_telephony']   = $_POST['dtelephony'];
        $update['dlyp_address_name']= $_POST['daddressname'];
        $update['dlyp_area_1']          = intval($_POST['area_id_1']);
        $update['dlyp_area_2']          = intval($_POST['area_id_2']);
        $update['dlyp_area_3']          = intval($_POST['area_id_3']);
        $update['dlyp_area_4']          = intval($_POST['area_id_4']);
        $update['dlyp_area']            = intval($_POST['area_id']);
        $update['dlyp_area_info']   = $_POST['region'];
        $update['dlyp_address']     = $_POST['daddress'];
        $update['dlyp_idcard']      = $_POST['didcard'];
        $update['dlyp_addtime']     = TIMESTAMP;
        $update['dlyp_state']       = 10;
        $update['dlyp_fail_reason'] = '';
        $upload = new UploadFile();
        $upload->set('default_dir',ATTACH_DELIVERY);
        $result = $upload->upfile('didcardimg');
        if(!$result){
            showDialog($upload->error);
        }
        $update['dlyp_idcard_image']    = $upload->file_name;
        $result = Model('delivery_point')->editDeliveryPoint($update, array('dlyp_id' => $dlyp_id));
        if ($result) {
            showDialog('操作成功，等待管理员审核', 'index.php?app=login', 'succ');
        } else {
            showDialog(L('feiwa_common_op_fail'));
        }
    }
    /**
     * ajax验证用户名是否存在
     */
    public function checkFeiwa() {
        $where = array();
        $dlyp_id = intval($_GET['did']);
        if ($dlyp_id <= 0) {
            echo 'false';die;
        }
        $where['dlyp_id'] = array('neq', $dlyp_id);
        if ($_GET['dname'] != '') {
            $where['dlyp_name'] = $_GET['dname'];
        }
        if ($_GET['didcard'] != '') {
            $where['dlyp_idcard'] = $_GET['didcard'];
        }
        if ($_GET['dmobile'] != '') {
            $where['dlyp_mobile'] = $_GET['dmobile'];
        }
        $dp_info = Model('delivery_point')->getDeliveryPointInfo($where);
        if (empty($dp_info)) {
            echo 'true';die;
        } else {
            echo 'false';die;
        }
    }
}
