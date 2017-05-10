<?php
/**
 * The AJAX call member information
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */

class member_cardControl extends ShareShowControl{
    public function mcard_infoFeiwa(){
        $uid    = intval($_GET['uid']);
        if($uid <= 0) {
            echo 'false';exit;
        }
        $model_micro_member_info = Model('micro_member_info');
        $micro_member_info = $model_micro_member_info->getOneById($uid);
        if(empty($micro_member_info)){
            echo 'false';exit;
        }
        echo json_encode($micro_member_info);exit;
    }
}
