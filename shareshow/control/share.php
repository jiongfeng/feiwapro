<?php
/**
 * 分享秀分享
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');
class shareControl extends ShareShowControl{

    public function __construct() {
        parent::__construct();
    }

    /**
     * 分享保存
     **/
    public function share_saveFeiwa() {

        $data = array();
        $data['result'] = 'true';
        $share_id = intval($_POST['share_id']);
        $share_type = self::get_channel_type($_GET['type']);
        if($share_id <= 0 || empty($share_type) || mb_strlen($_POST['commend_message']) > 140) {
            showDialog(Language::get('wrong_argument'),'reload','fail','');
        }

        if(!empty($_SESSION['member_id'])) {
            $model = Model("micro_{$_GET['type']}");
            //分享内容
            if(isset($_POST['share_app_items'])) {
                $condition = array();
                $condition[$share_type['type_key']] = $_POST['share_id'];
                if($_GET['type'] == 'store') {
                    $info = $model->getOneWithStoreInfo($condition);
                } else {
                    $info = $model->getOne($condition);
                }
                $info['commend_message'] = $_POST['commend_message'];
                if(empty($info['commend_message'])) {
                    $info['commend_message'] = Language::get('shareshow_share_default_message');
                }
                $info['type'] = $_GET['type'];
                $info['url'] = SHARESHOW_SITE_URL.DS."index.php?app={$_GET['type']}&feiwa=detail&{$_GET['type']}_id=".$_POST['share_id'];
                self::share_app_publish('share',$info);
            }
            showDialog(Language::get('feiwa_common_save_succ'),'','succ','');
        } else {
            showDialog(Language::get('no_login'),'reload','fail','');
        }
    }
}
