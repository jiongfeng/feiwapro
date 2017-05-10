<?php
/**
 * APP会员
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');

class memberControl{

    public function __construct(){
        require_once(BASE_PATH.'/framework/function/client.php');
    }

    public function infoFeiwa(){
        if (!empty($_GET['uid'])){
            $member_info = feiwa_member_info($_GET['uid'],'uid');
        }elseif(!empty($_GET['user_name'])){
            $member_info = feiwa_member_info($_GET['user_name'],'user_name');
        }
        return $member_info;
    }
}
