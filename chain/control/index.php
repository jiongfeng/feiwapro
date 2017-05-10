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

class indexControl extends BaseChainCenterControl{
    public function __construct(){
        parent::__construct();
        redirect('index.php?app=goods');
    }

}
