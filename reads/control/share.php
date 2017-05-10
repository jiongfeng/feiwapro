<?php
/**
 * 資訊分享
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');
class shareControl extends READSControl{

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
        $share_type = $_GET['type'];
        if($share_id <= 0 || empty($share_type) || mb_strlen($_POST['commend_message']) > 140) {
            showDialog(Language::get('wrong_argument'),'reload','fail','');
        }

        if(!empty($_SESSION['member_id'])) {
            $model = Model('reads_'.$share_type);
            $model->modify(array($share_type.'_share_count'=>array('exp',$share_type.'_share_count+1')),array($share_type.'_id'=>$share_id));
            //分享内容
            if(isset($_POST['share_app_items'])) {
                $info['commend_message'] = $_POST['commend_message'];
                $info['share_title'] = $_POST['share_title'];
                $info['share_image'] = $_POST['share_image'];
                if(empty($info['commend_message'])) {
                    $info['commend_message'] = Language::get('share_text');
                }
                $info['url'] = READS_SITE_URL.DS."index.php?app={$_GET['type']}&feiwa={$_GET['type']}_detail&{$_GET['type']}_id=".$_POST['share_id'];
                self::share_app_publish($info);
            }
            showDialog(Language::get('feiwa_common_save_succ'),'','succ','');
        } else {
            showDialog(Language::get('no_login'),'reload','fail','');
        }
    }
}
