<?php
/**
 * 控制台
 *
 *
 *
 *
 * @山东破浪网络科技有限公司提供技术支持 授权请购买FeiWa授权
 * @license    http://www.feiwa.org
 * @link       联系电话：0539-889333 客服QQ：2116198029
 */



defined('ByFeiWa') or exit('Access Invalid!');

class aboutusControl extends SystemControl{
    public function __construct(){
        parent::__construct();
        Language::read('dashboard');
    }

    public function indexFeiwa() {
        $this->aboutusFeiwa();
    }

    /**
     * 关于我们
     */
    public function aboutusFeiwa(){
        $version = C('version');
        $v_date = substr($version,0,4).".".substr($version,4,2);
        $s_date = substr(C('setup_date'),0,10);
        Tpl::output('v_date',$v_date);
        Tpl::output('s_date',$s_date);
        Tpl::showpage('aboutus', 'null_layout');
    }

}
