<?php
/**
 * 店铺消息
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit ('Access Invalid!');
class store_msgControl extends BaseSellerControl {
    public function __construct() {
        parent::__construct();
    }

    public function indexFeiwa() {
        $this->msg_listFeiwa();
    }

    /**
     * 消息列表
     */
    public function msg_listFeiwa() {
        $where = array();
        $where['store_id'] = $_SESSION['store_id'];
        if (!$_SESSION['seller_is_admin']) {
            $where['smt_code'] = array('in', $_SESSION['seller_smt_limits']);
        }
        $model_storemsg = Model('store_msg');
        $msg_list = $model_storemsg->getStoreMsgList($where, '*', 10);

        // 整理数据
        if (!empty($msg_list)) {
            foreach ($msg_list as $key => $val) {
                $msg_list[$key]['sm_readids'] = explode(',', $val['sm_readids']);
            }
        }
        Tpl::output('msg_list', $msg_list);
        Tpl::output('show_page', $model_storemsg->showpage(2));

        $this->profile_menu('msg_list');
        Tpl::showpage('store_msg.list');
    }

    /**
     * 系统公告列表
     */
    public function sys_listFeiwa() {
        $model_message  = Model('article');
        $page   = new Page();
        $page->setEachNum(10);
        $page->setStyle('admin');
        $condition = array();
        $condition['ac_id'] = 1;
        $condition['article_position_in'] = ARTICLE_POSIT_ALL.','.ARTICLE_POSIT_SELLER;
        $message_array  = $model_message->getArticleList($condition,$page);
        Tpl::output('show_page',$page->show());
        Tpl::output('msg_list',$message_array);

        $this->profile_menu('sys_list');
        Tpl::showpage('store_msg_sys.list');
    }

    /**
     * 消息详细
     */
    public function msg_infoFeiwa() {
        $sm_id = intval($_GET['sm_id']);
        if ($sm_id <= 0) {
            showMessage(L('wrong_argument'), '', '', 'succ');
        }
        $model_storemsg = Model('store_msg');
        $where = array();
        $where['sm_id'] = $sm_id;
        if ($_SESSION['seller_smt_limits'] !== false) {
            $where['smt_code'] = array('in', $_SESSION['seller_smt_limits']);
        }
        $msg_info = $model_storemsg->getStoreMsgInfo($where);
        if (empty($msg_info)) {
            showMessage(L('wrong_argument'), '', '', 'succ');
        }
        Tpl::output('msg_list', $msg_info);

        // 验证时候已读
        $sm_readids = explode(',', $msg_info['sm_readids']);
        if (!in_array($_SESSION['seller_id'], $sm_readids)) {
            // 消息阅读表插入数据
            $condition = array();
            $condition['seller_id'] = $_SESSION['seller_id'];
            $condition['sm_id'] = $sm_id;
            Model('store_msg_read')->addStoreMsgRead($condition);

            $update = array();
            $sm_readids[] = $_SESSION['seller_id'];
            $update['sm_readids'] = implode(',', $sm_readids).',';
            $model_storemsg->editStoreMsg(array('sm_id' => $sm_id), $update);

            // 清除店铺消息数量缓存
            setNcCookie('storemsgnewnum'.$_SESSION['seller_id'],0,-3600);
        }

        Tpl::showpage('store_msg.info', 'null_layout');
    }

    /**
     * AJAX标记为已读
     */
    public function mark_as_readFeiwa() {
        $smids = $_GET['smids'];
        if (!preg_match('/^[\d,]+$/i', $smids)) {
            showDialog(L('para_error'), '', 'error');
        }

        $smids = explode(',', $smids);
        $model_storemsgread = Model('store_msg_read');
        $model_storemsg = Model('store_msg');
        foreach ($smids as $val) {
            $condition = array();
            $condition['seller_id'] = $_SESSION['seller_id'];
            $condition['sm_id'] = $val;
            $read_info = $model_storemsgread->getStoreMsgReadInfo($condition);
            if (empty($read_info)) {
                // 消息阅读表插入数据
                $model_storemsgread->addStoreMsgRead($condition);

                // 更新店铺消息表
                $storemsg_info = $model_storemsg->getStoreMsgInfo(array('sm_id' => $val));
                $sm_readids = explode(',', $storemsg_info['sm_readids']);
                $sm_readids[] = $_SESSION['seller_id'];
                $sm_readids = array_unique($sm_readids);
                $update = array();
                $update['sm_readids'] = implode(',', $sm_readids).',';
                $model_storemsg->editStoreMsg(array('sm_id' => $val), $update);
            }
        }

        // 清除店铺消息数量缓存
        setNcCookie('storemsgnewnum'.$_SESSION['seller_id'],0,-3600);

        showDialog(L('feiwa_common_op_succ'), 'reload', 'succ');
    }

    /**
     * AJAX删除消息
     */
    public function del_msgFeiwa() {
        // 验证参数
        $smids = $_GET['smids'];
        if (!preg_match('/^[\d,]+$/i', $smids)) {
            showDialog(L('para_error'), '', 'error');
        }
        $smid_array = explode(',', $smids);

        // 验证是否为管理员
        if (!$this->checkIsAdmin()) {
            showDialog(L('para_error'), '', 'error');
        }

        $where = array();
        $where['store_id'] = $_SESSION['store_id'];
        $where['sm_id'] = array('in', $smid_array);
        // 删除消息记录
        Model('store_msg')->delStoreMsg($where);
        // 删除阅读记录
        unset($where['store_id']);
        Model('store_msg_read')->delStoreMsgRead($where);
        // 清除店铺消息数量缓存
        setNcCookie('storemsgnewnum'.$_SESSION['seller_id'],0,-3600);
        showDialog(L('feiwa_common_op_succ'), 'reload', 'succ');
    }

    /**
     * 消息接收设置
     */
    public function msg_settingFeiwa() {
        // 验证是否为管理员
        if (!$this->checkIsAdmin()) {
            showDialog(L('para_error'), '', 'error');
        }

        // 店铺消息模板列表
        $smt_list = Model('store_msg_tpl')->getStoreMsgTplList(array(), 'smt_code,smt_name,smt_message_switch,smt_message_forced,smt_short_switch,smt_short_forced,smt_mail_switch,smt_mail_forced');

        // 店铺接收设置
        $setting_list = Model('store_msg_setting')->getStoreMsgSettingList(array('store_id' => $_SESSION['store_id']), '*', 'smt_code');

        if (!empty($smt_list)) {
            foreach ($smt_list as $key => $val) {
                // 站内信消息模板是否开启
                if ($val['smt_message_switch']) {
                    // 是否强制接收，强制接收必须开启
                    $smt_list[$key]['sms_message_switch'] = $val['smt_message_forced'] ? 1 : intval($setting_list[$val['smt_code']]['sms_message_switch']);

                    // 已开启接收模板
                    if ($smt_list[$key]['sms_message_switch']) {
                        $smt_list[$key]['is_opened'][] = '商家消息';
                    }
                }
                // 短消息模板是否开启
                if ($val['smt_short_switch']) {
                    // 是否强制接收，强制接收必须开启
                    $smt_list[$key]['sms_short_switch'] = $val['smt_short_forced'] ? 1 : intval($setting_list[$val['smt_code']]['sms_short_switch']);

                    // 已开启接收模板
                    if ($smt_list[$key]['sms_short_switch']) {
                        $smt_list[$key]['is_opened'][] = '手机短信';
                    }
                }
                // 邮件模板是否开启
                if ($val['smt_mail_switch']) {
                    // 是否强制接收，强制接收必须开启
                    $smt_list[$key]['sms_mail_switch'] = $val['smt_mail_forced'] ? 1 : intval($setting_list[$val['smt_code']]['sms_mail_switch']);

                    // 已开启接收模板
                    if ($smt_list[$key]['sms_mail_switch']) {
                        $smt_list[$key]['is_opened'][] = '邮件';
                    }
                }

                if (is_array($smt_list[$key]['is_opened'])) {
                    $smt_list[$key]['is_opened'] = implode('&nbsp;|&nbsp;&nbsp;', $smt_list[$key]['is_opened']);
                }
            }
        }
        Tpl::output('smt_list', $smt_list);

        $this->profile_menu('msg_setting');
        Tpl::showpage('store_msg.setting');
    }

    /**
     * 编辑店铺消息接收设置
     */
    public function edit_msg_settingFeiwa() {
        // 验证是否为管理员
        if (!$this->checkIsAdmin()) {
            showDialog(L('para_error'), '', 'error');
        }
        $code = trim($_GET['code']);
        if ($code == '') {
            return false;
        }
        // 店铺消息模板
        $smt_info = Model('store_msg_tpl')->getStoreMsgTplInfo(array('smt_code' => $code), 'smt_code,smt_name,smt_message_switch,smt_message_forced,smt_short_switch,smt_short_forced,smt_mail_switch,smt_mail_forced');
        if (empty($smt_info)) {
            return false;
        }

        // 店铺消息接收设置
        $setting_info = Model('store_msg_setting')->getStoreMsgSettingInfo(array('smt_code' => $code, 'store_id' => $_SESSION['store_id']));
        Tpl::output('smt_info', $smt_info);
        Tpl::output('smsetting_info', $setting_info);
        Tpl::showpage('store_msg.setting_edit','null_layout');
    }

    /**
     * 保存店铺接收设置
     */
    public function save_msg_settingFeiwa() {
        // 验证是否为管理员
        if (!$this->checkIsAdmin()) {
            showDialog(L('para_error'), '', 'error');
        }
        $code = trim($_POST['code']);
        if ($code == '') {
            showDialog(L('wrong_argument'), 'reload');
        }

        $obj_validate = new Validate();
        $obj_validate->validateparam = array(
                array("input"=>$_POST["short_number"], "require"=>"false" ,"validator"=>"mobile", "message"=>'请填写正确的手机号码'),
                array("input"=>$_POST["mail_number"], "require"=>"false" ,"validator"=>"email", "message"=>'请填写正确的邮箱'),
        );
        $error = $obj_validate->validate();
        if ($error != ''){
            showDialog($error, 'reload');
        }

        $smt_info = Model('store_msg_tpl')->getStoreMsgTplInfo(array('smt_code' => $code), 'smt_code,smt_name,smt_message_switch,smt_message_forced,smt_short_switch,smt_short_forced,smt_mail_switch,smt_mail_forced');

        // 保存
        $insert = array();
        $insert['smt_code'] = $smt_info['smt_code'];
        $insert['store_id'] = $_SESSION['store_id'];
        // 验证站内信是否开启
        if ($smt_info['smt_message_switch']) {
            $insert['sms_message_switch'] = $smt_info['smt_message_forced'] ? 1 : intval($_POST['message_forced']);
        } else {
            $insert['sms_message_switch'] = 0;
        }
        // 验证短消息是否开启
        if ($smt_info['smt_short_switch']) {
            $insert['sms_short_switch'] = $smt_info['smt_short_forced'] ? 1 : intval($_POST['short_forced']);
        } else {
            $insert['sms_short_switch'] = 0;
        }
        $insert['sms_short_number'] = $_POST['short_number'] ? $_POST['short_number'] : '';
        // 验证邮件是否开启
        if ($smt_info['smt_mail_switch']) {
            $insert['sms_mail_switch'] = $smt_info['smt_mail_forced'] ? 1 : intval($_POST['mail_forced']);
        }else {
            $insert['sms_mail_switch'] = 0;
        }
        $insert['sms_mail_number'] = $_POST['mail_number'] ? $_POST['mail_number'] : '';

        $result = Model('store_msg_setting')->addStoreMsgSetting($insert);
        if ($result) {
            showDialog(L('feiwa_common_op_succ'), 'reload', 'succ');
        } else {
            showDialog(L('feiwa_common_op_fail'), 'reload');
        }
    }

    private function checkIsAdmin() {
        return $_SESSION['seller_is_admin'] ? true : false;
    }

    /**
     * 用户中心右边，小导航
     *
     * @param string    $menu_key   当前导航的menu_key
     * @param array     $array      附加菜单
     * @return
     */
    private function profile_menu($menu_key='') {
        $menu_array = array();
        $menu_array = array(
            array('menu_key'=>'msg_list',   'menu_name'=>'消息列表',    'menu_url'=>urlMall('store_msg', 'index')),
            array('menu_key'=>'sys_list',   'menu_name'=>'系统公告',    'menu_url'=>urlMall('store_msg', 'sys_list')),
            array('menu_key'=>'msg_setting','menu_name'=>'消息接收设置',  'menu_url'=>urlMall('store_msg', 'msg_setting')),
        );
        if (!$this->checkIsAdmin()) {
            unset($menu_array[2]);
        }
        Tpl::output('member_menu',$menu_array);
        Tpl::output('menu_key',$menu_key);
    }
}
