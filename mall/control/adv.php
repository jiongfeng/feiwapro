<?php
/**
 * 广告展示
 *
 *
 *
 * * @FeiWa (c) 2015-2018 FeiWa   (http://www.feiwa.org)
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 * @since      山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 */



defined('ByFeiWa') or exit('Access Invalid!');
class advControl {
    /**
     *
     * 广告展示
     */
    public function advshowFeiwa(){
        import('function.adv');
        $ap_id = intval($_GET['ap_id']);
        echo advshow($ap_id,'js');
    }
    /**
     * 异步调用广告
     *
     */
    public function get_adv_listFeiwa(){
        $ap_ids = $_GET['ap_ids'];
        $list = array();
        if (!empty($ap_ids) && is_array($ap_ids)) {
            import('function.adv');
            foreach ($ap_ids as $key => $value) {
                $ap_id = intval($value);//广告位编号
                $adv_info = advshow($ap_id,'array');
                if (!empty($adv_info) && is_array($adv_info)) {
                    $adv_info['adv_url'] = htmlspecialchars_decode($adv_info['adv_url']);
                    $list[$ap_id] = $adv_info;
                }
            }
        }
        echo $_GET['callback'].'('.json_encode($list).')';
        exit;
    }
}
